<?php
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../config/base.php";
require_once __DIR__ . "/../config/db.php";
requireUser();

header("Content-Type: application/json; charset=utf-8");

$app = trim($_GET["app"] ?? "");
if ($app === "") {
  echo json_encode(["ok" => false, "message" => "Missing app parameter"]);
  exit();
}

$appLike = "%" . $app . "%";

$countStmt = $conn->prepare("
  SELECT predicted_sentiment, COUNT(*) AS c
  FROM app_review_predictions
  WHERE app LIKE ?
  GROUP BY predicted_sentiment
");
$countStmt->bind_param("s", $appLike);
$countStmt->execute();
$countRes = $countStmt->get_result();

$counts = ["positive" => 0, "neutral" => 0, "negative" => 0];
$total = 0;

while ($row = $countRes->fetch_assoc()) {
  $s = strtolower($row["predicted_sentiment"]);
  $c = (int)$row["c"];
  if (isset($counts[$s])) {
    $counts[$s] = $c;
    $total += $c;
  }
}

$sampleStmt = $conn->prepare("
  SELECT predicted_sentiment, content
  FROM app_review_predictions
  WHERE app LIKE ?
  ORDER BY RAND()
  LIMIT 12
");
$sampleStmt->bind_param("s", $appLike);
$sampleStmt->execute();
$sampleRes = $sampleStmt->get_result();

$samples = [];
while ($row = $sampleRes->fetch_assoc()) {
  $samples[] = [
    "sentiment" => strtolower($row["predicted_sentiment"]),
    "text" => $row["content"]
  ];
}

echo json_encode([
  "ok" => true,
  "appQuery" => $app,
  "total" => $total,
  "counts" => $counts,
  "samples" => $samples
]);
