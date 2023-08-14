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
    <link href="/homehive/assets/css/styles.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="/homehive/assets/font-awesome/css/all.css" rel="stylesheet">

    <title>Dashboard | <?= $config['SITE_TITLE'] ?></title>
</head>

<body>
    <div class="body-wrapper">
    <?php if(isset($_SESSION["user"])) { ?>
        <div class="dashboard-wrapper">
            <aside class="sidebar --color-white" id="sidebar">
                <div class="side-header def-spacing">
                    <?php 
                    $query = "SELECT M.file_name
                    FROM media M INNER JOIN user U ON M.media_id = U.media_id
                    WHERE user_id = '" . $_SESSION["user"]["user_id"] . "'";
                    $result = mysqli_query($connection, $query);

                    $profile_image = mysqli_fetch_assoc($result);
                    if(mysqli_num_rows($result)) {
                        $image_src = "../assets/img/uploads/" . $profile_image["file_name"];
                    }
                    else {
                        $image_src = "../assets/img/user-profile-placeholder.png";
                    }
                    ?>
                    <div class="p-image-container">
                        <img src=<?= $image_src ?> alt="User Profile Picture"> 
                    </div>
                    <p>Hello, <?php echo $_SESSION["user"]["name"]; ?></p>
                </div>
                <nav class="side-nav">
                    <a href="javascript:void(0)" class="close-btn" onclick="closeNav()"><i class="fa fa-close"></i></a>
                    <a href="dashboard.php" class="flex" data-content="dashboard.php">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                    <a href="#" class="flex" data-content="viewListedProperties.php">
                        <i class="fa fa-th-list"></i>
                        <p>Listed Properties</p>
                    </a>    
                    <a href="#" class="flex">
                        <i class="fa fa-users"></i>
                        <p>All Tenants</p>
                    </a>    
                    <a href="#" class="flex" data-content="viewRentedProperties.php">
                        <i class="fa fa-th-list"></i>
                        <p>Rented Properties</p>
                    </a>
                    <a href="#" class="flex">
                        <i class="fa fa-heart"></i>
                        <p>Favorites</p>
                    </a>
                    <a href="#" class="flex">
                        <i class="fa fa-star"></i>
                        <p>My Reviews</p>
                    </a>
                    <a href="#" class="flex">
                        <i class="fa fa-user"></i>
                        <p>Profile</p>
                    </a>
                    <a href="//localhost/homehive" class="flex">
                        <i class="fa fa-door-open"></i>
                        <p>Exit Dashboard</p>
                    </a>
                    <a href="../logout.php" class="flex">
                        <i class="fa fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </nav>
            </aside>
            <div id="open-sidebar">
                <button class="open-btn" onclick="openNav()"><i class="fa fa-bars"></i></button>
            </div>
            
            <main class="dashboard-main boxed p-50" id="dashboard-content">
                <!-- displays the page content based on data-content of the anchor tag -->
            </main>
        </div>
    <?php } 
    else {
        header("location: /homehive/index.php");
        exit;
    } ?>
    </div>

    <!-- External JS Script -->
    <script src="/homehive/assets/js/main.js"></script>
</body>
</html>