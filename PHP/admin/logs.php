<?php
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../config/base.php";
require_once __DIR__ . "/../config/db.php";
requireAdmin();

$res = $conn->query("
  SELECT l.log_id, l.account_id, a.username, l.action, l.ip_address, l.created_at
  FROM activity_logs l
  LEFT JOIN accounts a ON a.account_id = l.account_id
  ORDER BY l.created_at DESC
  LIMIT 300
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>System Logs — Sentify.AI</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/CSS/admin-logs.css" />
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
      <a href="<?= BASE_URL ?>/PHP/admin/dashboard.php">Admin</a>
      <a href="<?= BASE_URL ?>/PHP/admin/logs.php" class="active">Logs</a>
      <a href="<?= BASE_URL ?>/PHP/logout.php" class="logout">Logout</a>
    </nav>
  </div>
</header>

<main class="admin-main">
  <section class="logs-header">
    <div>
      <h1 class="logs-title">System Activity Logs</h1>
      <p class="logs-description">Monitor all system activities and user interactions</p>
    </div>
    <div class="logs-meta">
      <div class="meta-item">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5-7h-3V6h3v6z"/>
        </svg>
        <span>Last 300 entries</span>
      </div>
    </div>
  </section>

  <section class="logs-container">
    <div class="table-card">
      <div class="table-wrap">
        <table class="logs-table">
          <thead>
            <tr>
              <th>
                <div class="th-content">
                  <span>ID</span>
                </div>
              </th>
              <th>
                <div class="th-content">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                  </svg>
                  <span>User</span>
                </div>
              </th>
              <th>
                <div class="th-content">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                  </svg>
                  <span>Action</span>
                </div>
              </th>
              <th>
                <div class="th-content">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                  </svg>
                  <span>IP Address</span>
                </div>
              </th>
              <th>
                <div class="th-content">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11z"/>
                  </svg>
                  <span>Timestamp</span>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $res->fetch_assoc()): ?>
              <tr class="log-row">
                <td class="cell-id"><?= (int)$row["log_id"] ?></td>
                <td class="cell-user">
                  <div class="user-badge">
                    <div class="user-avatar">
                      <?php
                        $username = htmlspecialchars($row["username"] ?? ("#" . $row["account_id"]));
                        echo strtoupper(substr($username, 0, 1));
                      ?>
                    </div>
                    <span><?= $username ?></span>
                  </div>
                </td>
                <td class="cell-action">
                  <span class="action-badge" data-action="<?= htmlspecialchars($row["action"]) ?>">
                    <?= htmlspecialchars($row["action"]) ?>
                  </span>
                </td>
                <td class="cell-ip">
                  <code><?= htmlspecialchars($row["ip_address"] ?? "—") ?></code>
                </td>
                <td class="cell-time">
                  <span class="time-badge" data-time="<?= htmlspecialchars($row["created_at"]) ?>">
                    <?= htmlspecialchars($row["created_at"]) ?>
                  </span>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

<script>
function getActionClass(action) {
  const lower = action.toLowerCase();
  if (lower.includes('login') || lower.includes('registered')) return 'action-success';
  if (lower.includes('failed') || lower.includes('blocked')) return 'action-error';
  return 'action-info';
}

function formatDateTime(datetime) {
  try {
    const date = new Date(datetime);
    const today = new Date();
    const yesterday = new Date(today);
    yesterday.setDate(yesterday.getDate() - 1);
    
    const isToday = date.toDateString() === today.toDateString();
    const isYesterday = date.toDateString() === yesterday.toDateString();
    
    const time = date.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    
    if (isToday) {
      return 'Today ' + time;
    } else if (isYesterday) {
      return 'Yesterday ' + time;
    } else {
      const dateStr = date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
      return dateStr + ' ' + time;
    }
  } catch (e) {
    return datetime;
  }
}

// Apply action classes and format timestamps on load
document.addEventListener('DOMContentLoaded', function() {
  // Format action badges with proper classes
  document.querySelectorAll('.action-badge').forEach(el => {
    const action = el.getAttribute('data-action');
    const actionClass = getActionClass(action);
    el.className = 'action-badge ' + actionClass;
  });
  
  // Format timestamps
  document.querySelectorAll('.time-badge').forEach(el => {
    const originalTime = el.getAttribute('data-time');
    el.textContent = formatDateTime(originalTime);
  });
});
</script>

</body>
</html>