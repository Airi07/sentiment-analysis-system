<?php
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../config/base.php";
requireUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sentify.AI — Chart</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/CSS/dashboarduser.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <a class="brand" href="<?= BASE_URL ?>/PHP/user/dashboard.php"><span class="neon">Sentify</span><span class="dot">.AI</span></a>
    <nav>
      <a href="<?= BASE_URL ?>/index.php">Home</a>
      <a href="<?= BASE_URL ?>/PHP/user/dashboard.php" class="active">Chart</a>
      <a href="<?= BASE_URL ?>/PHP/user/about.php">About</a>
      <a href="<?= BASE_URL ?>/PHP/logout.php" class="logout">Logout</a>
    </nav>
  </div>
</header>

<main class="chart-main">
  <section class="search-hero">
    <div class="search-container">
      <div class="search-content">
        <h1 class="title">Search App Reviews</h1>
        <p class="subtitle">Type an app name (e.g., <strong>Facebook</strong>) and click Search to analyze sentiment.</p>

        <div class="search-wrapper">
          <div class="search-bar">
            <svg class="search-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
            <input id="app-search" type="text" placeholder="Search application (e.g. Instagram)" />
            <button id="search-btn" class="btn primary">Search</button>
          </div>

          <div id="search-status" class="search-status"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="dashboard-grid">
    <!-- Chart Card -->
    <div class="panel-card chart-card">
      <div class="panel-head">
        <div class="head-left">
          <h2 class="panel-title">Sentiment Analysis</h2>
          <p class="panel-desc">Distribution of sentiment scores</p>
        </div>
        <div id="total-badge" class="badge"></div>
      </div>

      <div class="chart-wrap">
        <canvas id="sentChart"></canvas>
      </div>
    </div>

    <!-- Reviews Card -->
    <div class="panel-card reviews-card">
      <div class="panel-head">
        <div class="head-left">
          <h2 class="panel-title">Sample Reviews</h2>
          <p class="panel-desc" id="sample-hint">Random samples from dataset</p>
        </div>
      </div>

      <div id="sample-list" class="sample-list">
        <div class="placeholder-state">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-1.3-1.54L6.5 17h11l-3.54-4.71z"/>
          </svg>
          <p>Search an app to load sample reviews</p>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  window.__BASE_URL__ = "<?= BASE_URL ?>";
</script>
<script src="<?= BASE_URL ?>/Javascript/dashboarduser.js"></script>
</body>
</html>