<?php $pageTitle = "Property Rental & Listing | HomeHive"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <div class="dashboard-header multi-column">
        <div class="column-1">
            <h3>Welcome, <?php echo 'user' #$_SESSION['name'] ?>!</h3>
        </div>
        <div class="column-2 align-right">
            <a href="index.php" class="button">Logout</a>
        </div>
    </div>
</html>