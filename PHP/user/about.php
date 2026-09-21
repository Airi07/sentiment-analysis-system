<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . "/../config/base.php";
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sentify.AI — About</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>/CSS/about.css">
  <script src="/_sdk/element_sdk.js"></script>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
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
   <div class="nav-inner"><a class="brand" href="<?= BASE_URL ?>/index.php"> <span class="neon">Sentify</span><span class="dot">.AI</span> </a>
    <nav><a href="<?= BASE_URL ?>/index.php">Home</a> <a href="<?= BASE_URL ?>/PHP/login.php">Chart</a> <a href="<?= BASE_URL ?>/PHP/user/about.php" class="active">About</a> <!--?php if (!empty($_SESSION["account_id"])): ?--> <a href="<?= BASE_URL ?>/PHP/logout.php" class="logout">Logout</a> <!--?php else: ?--> <a href="<?= BASE_URL ?>/PHP/login.php" class="login-btn">Login</a> <!--?php endif; ?-->
    </nav>
   </div>
  </header>
  <main class="about-main">
   <section class="about-hero">
    <div class="hero-content">
     <h1 id="page-title" class="page-title">About Sentify.AI</h1>
     <p id="page-subtitle" class="page-subtitle">Sentify.AI helps developers and product teams understand customer sentiment by analyzing app and platform reviews automatically.</p>
    </div>
   </section>
   <section class="features-section">
    <div class="features-grid">
     <div class="feature-item">
      <div class="feature-icon">
       <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
       </svg>
      </div>
      <h3>Fast Analysis</h3>
      <p>Get sentiment insights instantly from hundreds of reviews</p>
     </div>
     <div class="feature-item">
      <div class="feature-icon">
       <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
       </svg>
      </div>
      <h3>AI-Powered</h3>
      <p>Advanced machine learning for accurate sentiment detection</p>
     </div>
     <div class="feature-item">
      <div class="feature-icon">
       <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
       </svg>
      </div>
      <h3>Actionable Insights</h3>
      <p>Transform feedback into decisions that matter</p>
     </div>
    </div>
   </section>
   <section class="team-cards-section">
    <div class="cards-container">
     <div class="card mission-card">
      <div class="card-header">
       <div class="card-icon mission-icon">
        <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" />
        </svg>
       </div>
       <h3 id="mission-title">Mission</h3>
      </div>
      <p id="mission-text">Deliver fast, actionable insights from user feedback to improve product decisions.</p>
     </div>
     <div class="card vision-card">
      <div class="card-header">
       <div class="card-icon vision-icon">
        <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
        </svg>
       </div>
       <h3 id="vision-title">Vision</h3>
      </div>
      <p id="vision-text">Make customer voice accessible and useful to every product team.</p>
     </div>
    </div>
   </section>
   <section class="cta-section">
    <h2>Ready to Understand Your Users?</h2>
    <p>Start analyzing reviews with AI-powered sentiment analysis today.</p><a href="<?= BASE_URL ?>/PHP/login.php" class="cta-button">Get Started Now</a>
   </section>
  </main>
  <footer class="site-footer">
   <div class="foot-inner">
    <div class="footer-content">
     <p>© 2025 Sentify.AI. All rights reserved.</p>
     <div class="footer-links"><a href="<?= BASE_URL ?>/index.php">Home</a> <a href="<?= BASE_URL ?>/PHP/user/about.php">About</a> <a href="<?= BASE_URL ?>/PHP/login.php">Login</a>
     </div>
    </div>
   </div>
  </footer>
  <script>
  const defaultConfig = {
    page_title: "About Sentify.AI",
    page_subtitle: "Sentify.AI helps developers and product teams understand customer sentiment by analyzing app and platform reviews automatically.",
    mission_title: "Mission",
    mission_text: "Deliver fast, actionable insights from user feedback to improve product decisions.",
    vision_title: "Vision",
    vision_text: "Make customer voice accessible and useful to every product team."
  };

  async function onConfigChange(config) {
    document.getElementById('page-title').textContent = config.page_title || defaultConfig.page_title;
    document.getElementById('page-subtitle').textContent = config.page_subtitle || defaultConfig.page_subtitle;
    document.getElementById('mission-title').textContent = config.mission_title || defaultConfig.mission_title;
    document.getElementById('mission-text').textContent = config.mission_text || defaultConfig.mission_text;
    document.getElementById('vision-title').textContent = config.vision_title || defaultConfig.vision_title;
    document.getElementById('vision-text').textContent = config.vision_text || defaultConfig.vision_text;
  }

  function mapToCapabilities(config) {
    return {
      recolorables: [],
      borderables: [],
      fontEditable: undefined,
      fontSizeable: undefined
    };
  }

  function mapToEditPanelValues(config) {
    return new Map([
      ["page_title", config.page_title || defaultConfig.page_title],
      ["page_subtitle", config.page_subtitle || defaultConfig.page_subtitle],
      ["mission_title", config.mission_title || defaultConfig.mission_title],
      ["mission_text", config.mission_text || defaultConfig.mission_text],
      ["vision_title", config.vision_title || defaultConfig.vision_title],
      ["vision_text", config.vision_text || defaultConfig.vision_text]
    ]);
  }

  if (window.elementSdk) {
    window.elementSdk.init({
      defaultConfig,
      onConfigChange,
      mapToCapabilities,
      mapToEditPanelValues
    });
  }
</script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9c62aa39c2b013d8',t:'MTc2OTc5Mzg4OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>