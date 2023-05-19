<?php require_once "includes/db.php"; ?>

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
        <?php include('header.php'); ?>
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

        <section class="column-container">
            <div class="multi-column white-space">
            <div class="column-1">
                <div class="image-container">
                <img src="//localhost/homehive/assets/img/house-thumb.jpg" alt="Image 1" class="image" width="150" height="150px">
                <div class="overlay">
                    <h2 class="header">House</h2>
                </div>
                </div>
            </div>
            
            <div class="column-2">
                <div class="image-container">
                <img src="//localhost/homehive/assets/img/apartment-thumb.jpg" alt="Image 2" class="image" width="150" height="150px">
                <div class="overlay">
                    <h2 class="header">Apartment</h2>
                </div>
                </div>
            </div>
            
            <div class="column-3">
                <div class="image-container">
                <img src="//localhost/homehive/assets/img/bungalow-thumb.jpg" alt="Image 3" class="image" width="150px" height="150px">
                <div class="overlay">
                    <h2 class="header">Bungalow</h2>
                </div>
                </div>
            </div>
            
            <div class="column-4">
                <div class="image-container">
                <img src="//localhost/homehive/assets/img/studio-thumb.jpg" alt="Image 4" class="image" width="150" height="150px">
                <div class="overlay">
                    <h2 class="header">Studio</h2>
                </div>
                </div>
            </div>
            </div>
        </section>

        <footer>
            <?php include('footer.php'); ?>
        </footer>
    </body>
</html>