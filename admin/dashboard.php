<?php require_once("../includes/functions.inc.php"); ?>
<?php require_once("../includes/db.inc.php"); ?>
<?php $pageTitle = "Dashboard | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/header.php'); ?>

    <?php if(isset($_SESSION["user"])) { ?>
        <p>Welcome, <?php echo $_SESSION["user"]["name"]; ?>! Do you wish to logout? <a href="../logout.php">Log out</a></p>
    <?php } 
    else {
        header("location: /homehive/index.php");
        exit;
    } ?>

    <?php include('../templates/footer.php'); ?>
</html>