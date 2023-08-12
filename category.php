<?php require_once("includes/db.inc.php"); ?>
<?php require_once("includes/functions.inc.php"); ?>
<?php 
$type = capitalizeString($_GET['type']);
$pageTitle = $type . "s | " . $config['SITE_TITLE']; 
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("templates/header.php"); ?>

    <?php $propertyIds = get_property_id_by_type($type); ?>
    
        <?php 
        if($propertyIds === false) {
            echo 
            "<div class='large-spacing boxed p-200 centered-content'>
                <h1>No property was found.</h1>
                <a href='//localhost/homehive/types.php' class='btn'>Search Types</a>
            </div>";
        }
        echo "<section class='boxed p-100'>" . displayProperty($propertyIds) . "</section>";
        ?>

    <?php include("templates/footer.php"); ?>
</html>