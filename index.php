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
    <section class="p-100 boxed large-spacing align-center">
        <h2>Explore Properties by Type</h2>
        <?php
        $category = getCategories();
        shuffle($category);
        $html = "<div class='archive-columns flex'>";
        for ($i = 0; $i < min(4, count($category)); $i++) {
            $html .= 
            "<div class='archive-item'>
                <a href='//localhost/homehive/category/" . strtolower($category[$i]['type']) ."'>
                    <img src='./assets/img/" . $category[$i]['file_name'] . "' alt='" . $category[$i]['alt'] . "'>
                    <h3>" . $category[$i]['type'] ."</h3>
                </a>
            </div>";
        }
        $html .= "</div>";
        echo $html;
        ?>
        <div><a href="//localhost/homehive/types.php" class="btn">Show More</a></div> 
    </section>

    <!-- Newly Listed -->
    <?php $propertyIds = get_latest_properties(); ?>
    <section class="boxed properties-info">
        <h2 class="align-center">Newly Listed</h2>
        <?php
        echo displayProperty($propertyIds);
        ?>
    </section>

    <!-- Popular Rentals -->
    <?php $propertyIds = get_popular_properties(); ?>
    <section class="boxed properties-info">
        <h2 class="align-center">Popular Rentals</h2>
        <?php
        echo displayProperty($propertyIds);
        ?>
    </section>
        
    <!-- Above Footer -->
    <section class="af-block boxed p-100 flex">
        <div class="af-card">
            <a href="//localhost/homehive/properties.php">
                <img src="//localhost/homehive/assets/img/top-of-a-building-with-blue-sky (500x500).jpg" alt="Top of a building with blue sky">
                <h3 class="--color-white">Rent a Property</h3>
                <div class="overlay"></div>
            </a>
        </div>

        <div class="af-card">
        <?php 
        if(isset($_SESSION['user'])) { ?>
            <a href="//localhost/homehive/admin/host.php?action=add">
        <?php
        }
        else { ?>
            <a href="//localhost/homehive/login.php">
        <?php
        } ?>
                <img src="//localhost/homehive/assets/img/man-in-a-suit-holding-a-toy-house (500x500).jpg" alt="Man in a suit holding a toy house">
                <h3 class="--color-white">Become a Host</h3>
                <div class="overlay"></div>
            </a>
        </div>
    </section>

    <?php include('templates/footer.php'); ?>
</html>