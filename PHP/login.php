<?php
session_start();
require_once __DIR__ . "/config/base.php";
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/includes/log_activity.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email"] ?? "");
  $password = $_POST["password"] ?? "";

  $stmt = $conn->prepare("SELECT account_id, username, password, role, status FROM accounts WHERE email=? LIMIT 1");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $res = $stmt->get_result();

  if ($res->num_rows !== 1) {
    $error = "Invalid email or password.";
    logActivity($conn, null, "Failed login (email not found): $email");
  } else {
    $user = $res->fetch_assoc();

    if (($user["status"] ?? "active") !== "active") {
      $error = "Account inactive.";
      logActivity($conn, (int)$user["account_id"], "Blocked login (inactive)");
    } elseif (!password_verify($password, $user["password"])) {
      $error = "Invalid email or password.";
      logActivity($conn, (int)$user["account_id"], "Failed login (wrong password)");
    } else {
      $_SESSION["account_id"] = (int)$user["account_id"];
      $_SESSION["username"]   = $user["username"];
      $_SESSION["role"]       = $user["role"];

      logActivity($conn, (int)$user["account_id"], "Logged in");

      if ($user["role"] === "admin") {
        header("Location: " . BASE_URL . "/PHP/admin/dashboard.php");
      } else {
        header("Location: " . BASE_URL . "/PHP/user/dashboard.php");
      }
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login — Sentify.AI</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/CSS/login.css" />
</head>
<body>

<!-- Background effects -->
<div class="bg-mesh"></div>
<div class="grid-overlay"></div>
<div class="particles">
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
  <div class="particle"></div>
</div>

<header class="nav-glow">
  <div class="nav-inner">
    <a class="brand" href="<?= BASE_URL ?>/index.php"><span class="neon">Sentify</span><span class="dot">.AI</span></a>
    <nav>
      <a href="<?= BASE_URL ?>/index.php">Home</a>
      <a href="<?= BASE_URL ?>/PHP/login.php" class="active">Chart</a>
      <a href="<?= BASE_URL ?>/PHP/user/about.php">About</a>
    </nav>
  </div>
</header>

<main class="auth-wrap">
  <div class="auth-container">
    <section class="auth-card">
      <div class="auth-left">
        <div class="kicker">
          <span class="pill"></span>
          <span>Sentiment Dashboard</span>
        </div>
        <h1 class="auth-title">Log in to view charts</h1>
        <p class="auth-description">Search apps and generate sentiment distribution charts instantly.</p>
        
        <div class="features-list">
          <div class="feature">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <span>AI-powered analysis</span>
          </div>
          <div class="feature">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <span>Real-time sentiment tracking</span>
          </div>
          <div class="feature">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <span>Instant review insights</span>
          </div>
        </div>
      </div>

      <div class="auth-right">
        <div class="form-header">
          <h2 class="form-title">Login</h2>
          <p class="form-subtitle">Use your account to continue.</p>
        </div>

        <?php if ($error): ?>
          <div class="alert alert-error">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/PHP/login.php" method="POST" class="login-form">
          <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input 
              id="email"
              class="form-input" 
              type="email" 
              name="email" 
              placeholder="you@example.com"
              required 
            />
          </div>

          <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input 
              id="password"
              class="form-input" 
              type="password" 
              name="password" 
              placeholder="••••••••"
              required 
            />
          </div>

          <button class="btn primary btn-full" type="submit">Sign In</button>

          <p class="form-footer">
            Don't have an account? <a href="<?= BASE_URL ?>/PHP/register.php" class="link">Create one</a>
          </p>

          <div class="small-note">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
            </svg>
            Admin users will be redirected to Admin Dashboard automatically.
          </div>
        </form>
      </div>
    </section>
  </div>
</main>
</body>
</html>