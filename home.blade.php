<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Velocity Motors | First Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #ffffff;
      color: #1e1e2f;
    }
    /* Shared Navbar */
    .navbar {
      background: #ffffff;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .nav-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 18px 32px;
      max-width: 1400px;
      margin: 0 auto;
      flex-wrap: wrap;
    }
    .logo {
      font-size: 1.8rem;
      font-weight: 800;
      background: linear-gradient(135deg, #c31432, #240b36);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }
    .nav-links {
      display: flex;
      gap: 24px;
      list-style: none;
      flex-wrap: wrap;
    }
    .nav-links a {
      text-decoration: none;
      font-weight: 600;
      color: #2c2c3a;
      transition: 0.2s;
    }
    .nav-links a:hover {
      color: #c31432;
    }
    @media (max-width: 780px) {
      .nav-wrapper { flex-direction: column; gap: 12px; }
      .nav-links { justify-content: center; }
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
      padding: 120px 20px;
    }
    .hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 20px;
    }
    .hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 32px;
    }
    .btn-primary, .btn-outline {
      display: inline-block;
      padding: 12px 28px;
      border-radius: 40px;
      text-decoration: none;
      font-weight: 700;
      transition: 0.25s;
    }
    .btn-primary {
      background: #c31432;
      color: white;
    }
    .btn-primary:hover {
      background: #a00f2a;
      transform: translateY(-2px);
    }
    .btn-outline {
      background: transparent;
      border: 2px solid white;
      color: white;
      margin-left: 12px;
    }
    .btn-outline:hover {
      background: white;
      color: #c31432;
    }

    /* Overview Cards */
    .section-title {
      text-align: center;
      font-size: 2rem;
      margin: 60px 0 40px;
      color: #1e1e2f;
    }
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 32px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px 60px;
    }
    .card {
      background: #f9f9ff;
      border-radius: 28px;
      padding: 28px;
      text-align: center;
      transition: 0.2s;
      box-shadow: 0 5px 12px rgba(0,0,0,0.05);
    }
    .card i {
      font-size: 2.5rem;
      color: #c31432;
      margin-bottom: 20px;
    }
    .card h3 {
      margin-bottom: 12px;
    }
    .card a {
      display: inline-block;
      margin-top: 20px;
      color: #c31432;
      font-weight: 600;
      text-decoration: none;
    }
    footer {
      background: #0f0f17;
      color: #aaa;
      text-align: center;
      padding: 32px;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="nav-wrapper">
      <div class="logo"><i class="fas fa-car"></i> VELOCITY</div>
      <ul class="nav-links">
        <li><a href={{ route('home') }}>Home</a></li>
        <li><a href={{ route('fea') }}>Features</a></li>
        <li><a href={{ route('fs') }}>Flagship</a></li>
        <li><a href={{ route('mod') }}>Models</a></li>
        <li><a href={{ route('rev') }}>Reviews</a></li>
        <li><a href={{ route('price') }}>Pricing</a></li>
        <li><a href={{ route('td') }}> BookTest Drive</a></li>
      </ul>
    </div>
  </div>

  <section class="hero">
    <h1>Ignite the Road</h1>
    <p>Experience unparalleled innovation, timeless design, and next‑generation electric performance.</p>
    <a href={{ route('fs') }} class="btn-primary">Discover Flagship</a>
    <a href={{ route('mod') }} class="btn-outline">View All Models</a>
  </section>

  <h2 class="section-title">Explore Velocity World</h2>
  <div class="cards-grid">
    <div class="card">
      <i class="fas fa-microchip"></i>
      <h3>Innovative Tech</h3>
      <p>AI cockpit, autonomous driving, over‑the‑air updates.</p>
      <a href={{ route('tec') }}>Learn more →</a>
    </div>
    <div class="card">
      <i class="fas fa-car-side"></i>
      <h3>Flagship GT</h3>
      <p>The ultimate electric performance – 670 HP, 380 mi range.</p>
      <a href={{ route('fgt') }}>Explore →</a>
    </div>
    <div class="card">
      <i class="fas fa-star"></i>
      <h3>Customer Reviews</h3>
      <p>Real stories from our drivers.</p>
      <a href="reviews.html">Read reviews →</a>
    </div>
    <div class="card">
      <i class="fas fa-chart-line"></i>
      <h3>Our Stats</h3>
      <p>Years in business, awards, global sales.</p>
      <a href={{ route('stat') }}>View stats →</a>
    </div>
  </div>

  <footer>
    <p>© 2025 Velocity Motors — Drive Beyond Boundaries. All images for demo.</p>
  </footer>
</body>
</html>