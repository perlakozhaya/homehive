<?php require_once("../includes/functions.inc.php"); ?>
<?php require_once("../includes/db.inc.php"); ?>
<?php $pageTitle = "My Properties | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/header.php');?>

    <section class="boxed p-50 large-spacing">
        <h2>My Listed Properties</h2>
        <?php
        $html = "";
        if(isset($_SESSION["user"])) {
            $userId =  $_SESSION["user"]["user_id"];
            $propertyIds = show_listed_properties($userId);
            if($propertyIds === false) {
                $html .= 
                "<p>You have not listed any property yet! <a href='host.php'>Become a Host</a></p>";
            }
            else {
                $html .= "<div>" . displayProperty($propertyIds) . "</div>";
            }
        }
        else {
            header("location: /homehive/login.php");
        }
        echo $html;
        ?>
    </section>

    <section class="boxed p-50 large-spacing">
        <h2>My Rented Properties</h2>
        <?php
        $html = "";
        if(isset($_SESSION["user"])) {
            $userId =  $_SESSION["user"]["user_id"];
            $propertyIds = show_rented_properties($userId);
            if($propertyIds === false) {
                $html .= 
                "<p>You have not rented any property yet! <a href='../properties.php'>Rent a Property Now</a></p>";
            }
            else {
                $html .= "<div>" . displayProperty($propertyIds) . "</div>";
            }
        }
        else {
            header("location: /homehive/login.php");
        }
        echo $html;
        ?>
    </section>

    <?php include('../templates/footer.php');?>
</html>