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

    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <div class="body-wrapper">
        <header class="h-block hf-block">
            <a href="//localhost/homehive">
                <img class="logo" src="//localhost/homehive/assets/img/logo.svg" alt="HomeHive Logo" width="120" height="auto">
            </a>

            <label for="nav-toggle" class="hamburger-icon"><i class="fa-solid fa-bars"></i></label>
            <input type="checkbox" class="nav-toggle" id="nav-toggle">

            <nav class="nav">
                <ul>
                    <li><a href="//localhost/homehive" class="nav-link">Home</a></li>
                    <li><a href="//localhost/homehive/types.php" class="nav-link">Types</a></li>
                    <li><a href="//localhost/homehive/contact.php" class="nav-link">Contact</a></li>
                    <?php
                    if(isset($_SESSION["user"])) { 
                    ?>
                        <li><a href="//localhost/homehive/admin/dashboard.php" class="nav-link">My Account</a></li>
                    <?php 
                    } 
                    else { 
                    ?>
                        <li><a href="login.php" class="nav-link">Log In</a></li>
                    <?php 
                    } 
                    ?>
                </ul>
            </nav>
        </header>
        <main>