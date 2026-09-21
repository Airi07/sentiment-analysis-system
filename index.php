<?php
session_start();

if (!empty($_SESSION["role"])) {
  if ($_SESSION["role"] === "admin") {
    header("Location: /FYP_Project/PHP/admin/dashboard.php");
    exit();
  }
  if ($_SESSION["role"] === "user") {
    header("Location: /FYP_Project/PHP/user/dashboard.php");
    exit();
  }
}
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sentify.AI — Home</title>
  <link rel="stylesheet" href="CSS/home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="/_sdk/element_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body><!-- Background effects -->
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
   <div class="nav-inner"><a class="brand" href="index.php"><span class="neon">Sentify</span><span class="dot">.AI</span></a>
    <nav><a href="index.php" class="active">Home</a> <a href="PHP/login.php">Chart</a> <a href="PHP/user/about.php">About</a> <a href="PHP/login.php" class="login-btn">Login</a>
    </nav>
   </div>
  </header>
  <main>
   <section class="hero reveal">
    <div class="hero-left">
     <h1 class="hero-title">Analyze App Reviews with <span class="accent">AI</span></h1>
     <p class="hero-subtitle">Search an app name and generate sentiment distribution charts from your dataset.</p>
     <div class="hero-actions"><a class="btn primary" href="PHP/login.php">Open Dashboard</a> <a class="btn" href="PHP/register.php">Create Account</a>
     </div>
    </div>
    <div class="hero-visual">
     <div class="chart-container"><!-- Animated ring chart -->
      <div class="ring-chart">
       <div class="ring ring-1"></div>
       <div class="ring ring-2"></div>
       <div class="ring ring-3"></div>
      </div><!-- Center icon -->
      <div class="center-icon">
       <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
       </svg>
      </div><!-- Floating data points -->
      <div class="data-point data-point-1"></div>
      <div class="data-point data-point-2"></div>
      <div class="data-point data-point-3"></div>
      <div class="data-point data-point-4"></div><!-- Sentiment labels -->
      <div class="sentiment-label label-positive">
       Positive 67%
      </div>
      <div class="sentiment-label label-negative">
       Negative 12%
      </div>
      <div class="sentiment-label label-neutral">
       Neutral 21%
      </div>
     </div>
    </div>
   </section>
  </main>
  <script src="Javascript/main.js"></script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9c629fd564ab13d8',t:'MTc2OTc5MzQ2My4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>