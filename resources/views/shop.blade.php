<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="Emerge Ventures - Coming Soon">
  <meta name="author" content="ashishmaraviya">

  <!-- site Favicon -->
  <link rel="icon" href="assets/img/favicon/favicon.png" sizes="32x32">

  <!-- css Icon Font -->
  <link rel="stylesheet" href="assets/css/vendor/msicons.min.css">

  <!-- css All Plugins Files -->
  <link rel="stylesheet" href="assets/css/plugins/animate.css">
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Main Style -->
  <link rel="stylesheet" href="assets/css/demo-1.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/css/newsletter.css" />
  <link rel="stylesheet" href="assets/css/performance.css" />

  <style>
    .coming-soon-section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: url('assets/img/bg/62.jpg');
      background-size: cover;
      background-position: center;
      color: white;
    }

    .countdown-timer {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin: 2rem 0;
    }

    .countdown-item {
      text-align: center;
      background: rgba(255, 255, 255, 0.1);
      padding: 1rem 2rem;
      border-radius: 10px;
      backdrop-filter: blur(5px);
    }

    .countdown-number {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .countdown-label {
      font-size: 0.9rem;
      text-transform: uppercase;
    }

    .coming-soon-content {
      text-align: center;
      max-width: 600px;
      margin: 0 auto;
      padding: 2rem;
    }

    .coming-soon-title {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      font-weight: 600;
    }

    .coming-soon-description {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    .social-links {
      margin-top: 2rem;
    }

    .social-links a {
      color: white;
      font-size: 1.5rem;
      margin: 0 10px;
      transition: opacity 0.3s;
    }

    .social-links a:hover {
      opacity: 0.7;
    }

    .newsletter-form {
      max-width: 400px;
      margin: 2rem auto;
    }

    .newsletter-form input {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      padding: 0.8rem;
      border-radius: 5px;
      margin-bottom: 1rem;
    }

    .newsletter-form input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .newsletter-form button {
      background: #28a745;
      border: none;
      color: white;
      padding: 0.8rem 2rem;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .newsletter-form button:hover {
      background: #218838;
    }
  </style>

  <title>Coming Soon - Emerge Ventures</title>
</head>

<body>
  <section class="coming-soon-section">
    <div class="container">
      <div class="coming-soon-content">
        <!-- <img src="assets/img/logo/logov.png" alt="Emerge Ventures Logo" style="width: 200px; margin-bottom: 2rem;"> -->
        
        <h1 class="coming-soon-title">Coming Soon</h1>
        <p class="coming-soon-description">
          We're working on something exciting! Our new platform for innovative enterprise and digital skills training
          will be launching soon.
        </p>

        <div class="countdown-timer">
          <div class="countdown-item">
            <div class="countdown-number" id="days">00</div>
            <div class="countdown-label">Days</div>
          </div>
          <div class="countdown-item">
            <div class="countdown-number" id="hours">00</div>
            <div class="countdown-label">Hours</div>
          </div>
          <div class="countdown-item">
            <div class="countdown-number" id="minutes">00</div>
            <div class="countdown-label">Minutes</div>
          </div>
          <div class="countdown-item">
            <div class="countdown-number" id="seconds">00</div>
            <div class="countdown-label">Seconds</div>
          </div>
        </div>
<!-- 
        <div class="newsletter-form">
          <form>
            <input type="email" placeholder="Enter your email address" class="form-control mb-3">
            <button type="submit" class="btn btn-success w-100">Notify Me</button>
          </form>
        </div> -->

        <!-- <div class="social-links">
          <a href="#"><i class="msicon msi-facebook-square"></i></a>
          <a href="#"><i class="msicon msi-twitter-square"></i></a>
          <a href="#"><i class="msicon msi-instagram"></i></a>
          <a href="#"><i class="msicon msi-linkedin-square"></i></a>
        </div> -->
      </div>
    </div>
  </section>

  <script>
    // Set the launch date (adjust as needed)
    const launchDate = new Date('January 1, 2026 00:00:00').getTime();

    // Update countdown every second
    const countdown = setInterval(function() {
      const now = new Date().getTime();
      const distance = launchDate - now;

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById('days').innerHTML = days.toString().padStart(2, '0');
      document.getElementById('hours').innerHTML = hours.toString().padStart(2, '0');
      document.getElementById('minutes').innerHTML = minutes.toString().padStart(2, '0');
      document.getElementById('seconds').innerHTML = seconds.toString().padStart(2, '0');

      if (distance < 0) {
        clearInterval(countdown);
        document.getElementById('countdown').innerHTML = 'LAUNCHED!';
      }
    }, 1000);
  </script>

  <!-- Plugins JS -->
  <script src="assets/js/plugins/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
  <script src="assets/js/lazy-loading.js"></script>
  <script src="assets/js/performance-optimizer.js"></script>
</body>

</html>
