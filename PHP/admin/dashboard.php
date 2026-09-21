<?php
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../config/base.php";
require_once __DIR__ . "/../config/db.php";
requireAdmin();

$users = $conn->query("SELECT COUNT(*) AS c FROM accounts")->fetch_assoc()["c"] ?? 0;
$logs  = $conn->query("SELECT COUNT(*) AS c FROM activity_logs")->fetch_assoc()["c"] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Dashboard — Sentify.AI</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/CSS/admin-dashboard.css" />
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
      <a href="<?= BASE_URL ?>/PHP/admin/dashboard.php" class="active">Admin</a>
      <a href="<?= BASE_URL ?>/PHP/admin/logs.php">Logs</a>
      <a href="<?= BASE_URL ?>/PHP/logout.php" class="logout">Logout</a>
    </nav>
  </div>
</header>

<main class="admin-main">
  <section class="admin-hero">
    <div class="hero-content">
      <div>
        <h1 class="admin-title">Admin Dashboard</h1>
        <p class="admin-greeting">Welcome back, <strong><?= htmlspecialchars($_SESSION["username"] ?? "Admin") ?></strong></p>
      </div>
      <div class="admin-badge">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
        </svg>
        <span>Administrator</span>
      </div>
    </div>
  </section>

  <section class="stats-grid">
    <div class="stat-card users-card">
      <div class="stat-header">
        <h3 class="stat-title">Total Users</h3>
        <div class="stat-icon users-icon">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm8 0c1.66 0 2.99-1.34 2.99-3S25.66 5 24 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
          </svg>
        </div>
      </div>
      <div class="stat-value"><?= (int)$users ?></div>
      <p class="stat-description">Active accounts in the system</p>
    </div>

    <div class="stat-card logs-card">
      <div class="stat-header">
        <h3 class="stat-title">Total Logs</h3>
        <div class="stat-icon logs-icon">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 16H5V4h14v14zm-5.04-6.71l-2.75 3.54-1.3-1.54L6.5 17h11l-3.54-4.71z"/>
          </svg>
        </div>
      </div>
      <div class="stat-value"><?= (int)$logs ?></div>
      <p class="stat-description">Activity log entries recorded</p>
    </div>
  </section>

  <section class="admin-actions">
    <div class="actions-header">
      <h2 class="actions-title">Quick Actions</h2>
      <p class="actions-description">Navigate to key admin areas</p>
    </div>
    
    <div class="actions-grid">
      <a class="action-btn primary-btn" href="<?= BASE_URL ?>/PHP/admin/logs.php">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 16H5V4h14v14zM7 10h10v2H7z"/>
        </svg>
        <div class="btn-content">
          <span class="btn-title">View Logs</span>
          <span class="btn-desc">Monitor system activity</span>
        </div>
      </a>

      <a class="action-btn secondary-btn" href="<?= BASE_URL ?>/PHP/user/dashboard.php">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 13h2v8H3zm4-8h2v16H7zm4-2h2v18h-2zm4-2h2v20h-2zm4 4h2v16h-2z"/>
        </svg>
        <div class="btn-content">
          <span class="btn-title">User Dashboard</span>
          <span class="btn-desc">Access user analytics</span>
        </div>
      </a>
    </div>
  </section>
</main>

</body>
</html>

