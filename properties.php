<?php require_once "includes/db.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>
<?php $pageTitle = "All Properties | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <?php
    $html = "";
    if(isset($_GET['city'])) {
        $propertyIds = get_property_id_by_address($_GET['city']);

        if ($propertyIds === false) {
            $html .= 
            "<div class='def-spacing boxed p-200 centered-content'>
                <h1>No property was found.</h1>
                <form class='search-form' method='get' action='properties.php'>
                    <div class='form-group'>
                        <input type='search' placeholder='Try searching again...' name='city'>
                        <button type='submit' name='submit' class='search-button'><i class='fa-solid fa-search'></i></button>
                    </div>
                </form>
                <a href='//localhost/homehive' class='btn'>Back to Home</a>
            </div>";
            echo $html;
        }
        else {
            echo displayProperty($propertyIds);
        }
    }
    else {
        $propertyIds = getPropertyIds();
        echo displayProperty($propertyIds);
    }
    ?>
    <?php include('templates/footer.php'); ?>
