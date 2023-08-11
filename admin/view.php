<?php require_once("../includes/functions.inc.php"); ?>
<?php require_once("../includes/db.inc.php"); ?>
<?php $pageTitle = "My Properties | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/header.php');?>

    <section class="boxed p-50 large-spacing">
        <h2 class="align-center">My Properties</h2>
        <?php
        $html = "";
        if(isset($_SESSION["user"])) {
            $userId =  $_SESSION["user"]["user_id"];
            $propertyIds = show_listed_properties($userId);

            $html .= "<div'>" . displayProperty($propertyIds) . "</div>";
        }
        echo $html;
        ?>
    </section>

    <?php include('../templates/footer.php');?>
</html>



