<?php require_once "includes/db.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>
<?php $pageTitle = "Property Rental & Listing | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <!-- Header Hero -->
    <section class="hero-bg p-200">
        <div class="def-spacing boxed centered-content">
            <h1 class="--color-white">Find your perfect match with our rental properties</h1>
            <p class="--color-white">From Economy to Luxury. Find Your Ideal Rental House and Rent the Life You Want to Live</p>
            <form class="search-form" method="get" action="properties.php">
                <div class="form-group">
                    <input list="cities" name="city" id="city" placeholder="Locate properties in your area" autocomplete="off">
                    <datalist id="cities">
                        <?php $cities = getCities(); ?>
                        <script>
                            var city_list = <?php echo json_encode($cities); ?>;
                            var city_datalist = document.getElementById("cities");
                            var city_options = "";
                            for (var i = 0; i < city_list.length; i++) {
                                city_options += "<option value='" + city_list[i] + "'>" + city_list[i] + "</option>";
                            }
                            city_datalist.innerHTML = city_options;
                            </script>
                    </datalist>
                    <button type="submit" name="submit" class="search-button"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
        </div>
    </section>

    <!-- Explore Properties by Type -->
    <section class="p-50 boxed large-spacing align-center">
        <h2>Explore Properties by Type</h2>
        <?php
        $category = getCategories();
        shuffle($category);
        $html = "<div class='archive-columns flex'>";
        for ($i = 0; $i < min(4, count($category)); $i++) {
            $html .= 
            "<div class='archive-wrapper'>
                <div class='archive-item'>
                    <a href='//localhost/homehive/category/" . strtolower($category[$i]['type']) ."'>
                        <img src='./assets/img/" . $category[$i]['file_name'] . "' alt='" . $category[$i]['alt'] . "'>
                        <h3>" . $category[$i]['type'] ."</h3>
                    </a>
                </div>
            </div>";
        }
        $html .= "</div>";
        echo $html;
        ?>
        <div><a href="//localhost/homehive/types.php" class="btn">Show More</a></div> 
    </section>
        
    <!-- Above Footer -->
    <section class="af-block boxed p-50 flex align-center">
        <a href="//localhost/homehive/properties.php">
            <div class="af-card">
                <img src="//localhost/homehive/assets/img/top-of-a-building-with-blue-sky (500x500).jpg" alt="Top of a building with blue sky">
                <h3>Rent a Property</h3>
            </div>
        </a>
        <?php 
        if(isset($_SESSION['user'])) { ?>
            <a href="//localhost/homehive/admin/host.php">
        <?php
        }
        else { ?>
            <a href="//localhost/homehive/login.php">
        <?php
        } ?>
             <div class="af-card">
                <img src="//localhost/homehive/assets/img/man-in-a-suit-holding-a-toy-house (500x500).jpg" alt="Man in a suit holding a toy house">
                <h3> Become a Host</h3>
            </div>
    </section>

    <?php include('templates/footer.php'); ?>
</html>