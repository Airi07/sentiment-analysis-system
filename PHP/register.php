<?php
session_start();
require_once __DIR__ . "/config/base.php";
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/includes/log_activity.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST["username"] ?? "");
  $email    = trim($_POST["email"] ?? "");
  $password = $_POST["password"] ?? "";

  if ($username === "" || $email === "" || $password === "") {
    $error = "All fields are required.";
  } else {
    $check = $conn->prepare("SELECT account_id FROM accounts WHERE email=? LIMIT 1");
    $check->bind_param("s", $email);
    $check->execute();
    $exists = $check->get_result()->num_rows > 0;

    if ($exists) {
      $error = "Email already registered.";
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO accounts (username, email, password, role, status) VALUES (?, ?, ?, 'user', 'active')");
      $stmt->bind_param("sss", $username, $email, $hash);

      if ($stmt->execute()) {
        logActivity($conn, (int)$stmt->insert_id, "Registered account");
        header("Location: " . BASE_URL . "/PHP/login.php");
        exit();
      } else {
        $error = "Registration failed.";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register — Sentify.AI</title>
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
      <a href="<?= BASE_URL ?>/PHP/login.php">Chart</a>
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
          <span>Create Account</span>
        </div>
        <h1 class="auth-title">Join Sentify.AI</h1>
        <p class="auth-description">Create an account to access sentiment charts and search by application name.</p>
        
        <div class="features-list">
          <div class="feature">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <span>Instant sentiment analysis</span>
          </div>
          <div class="feature">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <span>Search unlimited apps</span>
          </div>
          <div class="feature">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            <span>Access detailed insights</span>
          </div>
        </div>
      </div>

      <div class="auth-right">
        <div class="form-header">
          <h2 class="form-title">Register</h2>
          <p class="form-subtitle">It only takes a minute.</p>
        </div>

        <?php if ($error): ?>
          <div class="alert alert-error">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/PHP/register.php" method="POST" class="login-form">
          <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input 
              id="username"
              class="form-input" 
              type="text" 
              name="username" 
              placeholder="Choose a username"
              required 
            />
          </div>

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

          <button class="btn primary btn-full" type="submit">Create Account</button>

          <p class="form-footer">
            Already have an account? <a href="<?= BASE_URL ?>/PHP/login.php" class="link">Sign in</a>
          </p>
        </form>
      </div>
    </section>
  </div>
</main>

</body>
</html>