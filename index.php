<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="assets/favicons/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#EAA534">
  <meta name="description" content="Web app for listing and renting properties">
    
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="assets/favicons/site.webmanifest">

  <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
  
  <link href="assets/font-awesome/css/all.css" rel="stylesheet">

  <title>Property Rental & Listing | HomeHive</title>
</head>

<body>
  <header class="main-header multi-column">
    <div class="logo column-1">
      <a href="//localhost/property-rental-listing">
        <img src="//localhost/property-rental-listing/assets/img/logo.svg" alt="HomeHive Logo" width="130" height="48">
      </a>
    </div>

    <nav class="navbar column-2">
      <a href="//localhost/property-rental-listing" class="nav-link">Home</a>
      <div class="dropdown">
        <button class="dropdown-button nav-link">Types 
          <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
        </button>
        <div class="dropdown-menu">
          <a href="#">House</a>
          <a href="#">Bungalow</a>
          <a href="#">Apartment</a>
          <a href="#">Studio</a>
        </div>
      </div> 
      <a href="//localhost/property-rental-listing/contact.php" class="nav-link">Contact</a> 
    </nav>

    <div class="column-3 header-button">
      <a href="login.php" class="button">Sign in</a>
    </div>
  </header>

  <section class="hero-section">
    <div class="column-container">
      <h1 class="white">Find your perfect match with our rental properties</h1>
      <br>
      <p class="white">From Economy to Luxury. Find Your Ideal Rental House and Rent the Life You Want to Live</p>
      <form method="get" action="">
        <div class="multi-column" id="search-bar">
          <div class="column-1">
            <input type="search" placeholder="Locate available properties in your area">
          </div>
          <div class="column-2">
            <button type="submit" class="rotate-btn">
              <i class="fa-solid fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <i class="fa-solid fa-chevron-left"></i>
  <i class="fa-solid fa-chevron-right"></i>

  <footer>

  </footer>
</body>
</html>