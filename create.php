<?php
// landing-page.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Professional Plumbing Services in New York - 24/7 Emergency Plumber, Repairs, Installations. Call now for quick service!">
  <meta name="keywords" content="Plumbing New York, Emergency Plumber NYC, Plumbing Services, Pipe Repair, Drain Cleaning">
  <title>Plumbing Services in New York | 24/7 Emergency Plumber</title>

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
    body { background: #f9f9f9; color: #333; }
    header { background: #0077b6; color: #fff; padding: 20px; text-align: center; }
    header h1 { font-size: 2.5rem; }
    header p { font-size: 1.2rem; margin-top: 5px; }
    nav { margin-top: 10px; }
    nav a { color: #fff; margin: 0 10px; text-decoration: none; font-weight: bold; }
    .hero { background: url('plumbing-bg.jpg') center/cover no-repeat; height: 400px; display: flex; align-items: center; justify-content: center; color: white; text-align: center; }
    .hero h2 { font-size: 2.5rem; background: rgba(0,0,0,0.5); padding: 10px; border-radius: 10px; }
    .container { width: 90%; max-width: 1100px; margin: 40px auto; }
    .services { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
    .service-card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; }
    .service-card h3 { margin-bottom: 10px; color: #0077b6; }
    .cta { text-align: center; margin: 40px 0; }
    .cta button { padding: 15px 25px; background: #0077b6; color: #fff; border: none; border-radius: 5px; font-size: 1.1rem; cursor: pointer; }
    .cta button:hover { background: #005f87; }
    footer { background: #333; color: #fff; text-align: center; padding: 20px; margin-top: 30px; }
    footer p { margin: 5px 0; }
  </style>
</head>
<body>

  <header>
    <h1>Plumbing Services in New York</h1>
    <p>Reliable • Affordable • Available 24/7</p>
    <nav>
      <a href="#services">Services</a>
      <a href="#contact">Contact</a>
    </nav>
  </header>

  <section class="hero">
    <h2>24/7 Emergency Plumbing Solutions in NYC</h2>
  </section>

  <div class="container">
    <section id="services">
      <h2 style="text-align:center; margin-bottom:20px;">Our Services</h2>
      <div class="services">
        <div class="service-card">
          <h3>Emergency Repairs</h3>
          <p>Fast response for leaks, burst pipes, and urgent plumbing issues.</p>
        </div>
        <div class="service-card">
          <h3>Drain Cleaning</h3>
          <p>Clogged drains cleared quickly with modern tools.</p>
        </div>
        <div class="service-card">
          <h3>Water Heater Installation</h3>
          <p>Professional water heater installation & repair.</p>
        </div>
        <div class="service-card">
          <h3>Bathroom & Kitchen Plumbing</h3>
          <p>Expert installations & renovations for your home.</p>
        </div>
      </div>
    </section>

    <section id="contact" class="cta">
      <h2>Need a Plumber Now?</h2>
      <p>Call us 24/7 for fast and reliable service.</p>
      <a href="tel:+11234567890"><button>📞 Call (123) 456-7890</button></a>
    </section>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Plumbing Services New York. All Rights Reserved.</p>
    <p>Email: info@nyplumber.com | Phone: (123) 456-7890</p>
  </footer>

</body>
</html>
