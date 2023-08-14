<?php require_once("../includes/functions.inc.php"); ?>
<?php require_once("../includes/db.inc.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EAA534">
    <meta name="description" content="Website for listing and renting properties">

    <!-- Display Site Icon -->
    <link rel="icon" href="assets/favicons/favicon.ico">
        
    <link rel="apple-touch-icon" sizes="180x180" href="/homehive/assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/homehive/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/homehive/assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="/homehive/assets/favicons/site.webmanifest">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    
    <!-- My CSS -->
    <link href="/homehive/assets/css/styles.css?v=1.0" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="/homehive/assets/font-awesome/css/all.css" rel="stylesheet">

    <title>Dashboard | <?= $config['SITE_TITLE'] ?></title>

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
</head>