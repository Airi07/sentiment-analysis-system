<?php
function logActivity(mysqli $conn, ?int $account_id, string $action): void {
  $ip = $_SERVER["REMOTE_ADDR"] ?? null;

  $stmt = $conn->prepare("
    INSERT INTO activity_logs (account_id, action, ip_address)
    VALUES (?, ?, ?)
  ");
  $stmt->bind_param("iss", $account_id, $action, $ip);
  $stmt->execute();
}
