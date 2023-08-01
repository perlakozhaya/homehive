<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EAA534">
    <meta name="description" content="Website for listing and renting properties">

    <!-- Display Site Icon -->
    <link rel="icon" href="assets/favicons/favicon.ico">
        
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/favicons/site.webmanifest">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="./assets/font-awesome/css/all.css" rel="stylesheet">

    <!-- My CSS -->
    <link href="./assets/css/styles.css" rel="stylesheet">
        
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <header class="main-header multi-column">
        <div class="column-1">
            <a href="//localhost/homehive">
                <img src="//localhost/homehive/assets/img/logo.svg" alt="HomeHive Logo" width="120" height="auto">
            </a>
        </div>
            
        <nav class="column-2 navbar">
            <a href="//localhost/homehive" class="nav-link"><i class="fa-solid fa-house"></i></a>
            <div class="dropdown">
                <button class="dropdown-button nav-link">Types<i class="fa-solid fa-chevron-down dropdown-arrow"></i></button>
                <div class="dropdown-menu">
                    <a href="#">House</a>
                    <a href="#">Bungalow</a>
                    <a href="#">Apartment</a>
                    <a href="#">Studio</a>
                </div>
            </div> 
            <a href="//localhost/homehive/contact.php" class="nav-link">Contact</a> 
        </nav>

        <div class="column-3 align-right">
            <a href="login.php" class="button">Sign in</a>
        </div>
    </header>