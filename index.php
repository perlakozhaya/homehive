<?php require_once "includes/db.inc.php"; ?>
<?php $pageTitle = "Property Rental & Listing | HomeHive"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <!-- Header Hero -->
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

    <!-- Explore Properties by Type -->
    <section class="column-container white-space section-1">
        <h2>Explore Properties by Type</h2>
            <div class="multi-column">
                <div class="column-1">
                    <div class="image-container">
                        <img src="//localhost/homehive/assets/img/house-thumb.jpg" alt="House">
                        <div class="overlay">
                            <a href="//localhost/homehive/house.php" class="button white">Show More</a>
                        </div>
                    </div>
                    <h3>House</h3>
                </div>
                <div class="column-2">
                    <div class="image-container">
                        <img src="//localhost/homehive/assets/img/bungalow-thumb.jpg" alt="Bungalow">
                        <div class="overlay">
                            <a href="//localhost/homehive/bungalow.php" class="button white">Show More</a>
                        </div>
                    </div>
                    <h3>Bungalow</h3>
                </div>
                <div class="column-3">
                    <div class="image-container">
                        <img src="//localhost/homehive/assets/img/apartment-thumb.jpg" alt="Apartment">
                        <div class="overlay">
                            <a href="//localhost/homehive/apartment.php" class="button white">Show More</a>
                        </div>
                    </div>
                    <h3>Apartment</h3>
                </div>
                <div class="column-4">
                    <div class="image-container">
                        <img src="//localhost/homehive/assets/img/studio-thumb.jpg" alt="Studio">
                        <div class="overlay">
                            <a href="//localhost/homehive/studio.php" class="button white">Show More</a>
                        </div>
                    </div>
                    <h3>Studio</h3>
                </div>
            </div>
        <div class="align-center"><a href="#" class="button">View All</a></div> 
    </section>

    <!-- Footer -->
    <div class="column-container multi-column above-footer white-space">
        <a href="#">
            <div class="column-1">
                <div class="af-img-container">
                    <img src="//localhost/homehive/assets/img/top-of-a-building-with-blue-sky (500x500).jpg" alt="Top of a building with blue sky">
                    <h3 class="white align-center">Rent a Property</h3>
                    <span class="image-overlay"></span>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="column-2">
                <div class="af-img-container">
                    <img src="//localhost/homehive/assets/img/man-in-a-suit-holding-a-toy-house (500x500).jpg" alt="Man in a suit holding a toy house">
                    <h3 class="white align-center">Become a Host</h3>
                    <span class="image-overlay"></span>
                </div>
            </div>
        </a>
    </div>

    <?php include('templates/footer.php'); ?>
</html>