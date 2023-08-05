<?php require_once "includes/db.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>
<?php $pageTitle = "Property Rental & Listing | HomeHive"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <!-- Header Hero -->
        <section class="hero full-width centered">
            <div class="flow boxed">
                <h1>Find your perfect match with our rental properties</h1>
                <p>From Economy to Luxury. Find Your Ideal Rental House and Rent the Life You Want to Live</p>
                <form method="get" action="search.php">
                    <div class="form-group">
                        <input type="search" placeholder="Locate available properties in your area" name="area">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit"><i class="fa-solid fa-search"></i></button>
                    </div>
                </form>
            </div>
        </section>

    <!-- Explore Properties by Type -->
        <section class="p-50 boxed flow">
            <h2>Explore Properties by Type</h2>
                <?php
                $html = "";
                $category = getPropertyTypes();
                for ($i = 0; $i < min(4, count($category)); $i++) {
                    $html .= 
                    "<div class='boxed'>
                        <div class='cat-wrapper'>
                            <div class='cat-item'>
                                <a href='//localhost/homehive/category.php/?type=" . strtolower($category[$i]['type']) ."'>
                                    <img src='./assets/img/" . $category[$i]['file_name'] . "' alt='" . $category[$i]['alt'] . "'>
                                    <h3>" . $category[$i]['type'] ."</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    ";
                }
                echo $html;
                ?>
            <div class="align-center"><a href="//localhost/homehive/category.php" class="button">Show More</a></div> 
        </section>
        
        <!-- Footer -->
        <section class="af-block boxed p-50">
            <a href="#">
                <div class="af-card">
                    <img src="//localhost/homehive/assets/img/top-of-a-building-with-blue-sky (500x500).jpg" alt="Top of a building with blue sky">
                    <h3>Rent a Property</h3>
                </div>
            </a>
            <a href="#">
                <div class="af-card">
                    <img src="//localhost/homehive/assets/img/man-in-a-suit-holding-a-toy-house (500x500).jpg" alt="Man in a suit holding a toy house">
                    <h3>Become a Host</h3>
                </div>
            </a>
        </section>

    <?php include('templates/footer.php'); ?>
</html>