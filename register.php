<?php require_once 'includes/register.inc.php'?>
<?php require_once 'includes/functions.inc.php'?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EAA534">
    <meta name="description" content="Website for listing and renting properties">
    <link rel="icon" href="assets/favicons/favicon.ico">
        
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/favicons/site.webmanifest">

    <link href="./assets/css/styles.css" rel="stylesheet">
        
    <link href="./assets/font-awesome/css/all.css" rel="stylesheet">

    <title>Register | Homehive</title>
</head>

<body>
    <section class="form-container">
        <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <h3>Register Now</h3>
            <div class="form-control">
                <input type="text" name="name" id="name" required placeholder="Enter your name">
                <input type="email" name="email" id="email" required placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                <input type="password" name="confirm-password" id="confirm-password" required placeholder="Confirm your password" oninput="validatePassword()">
            </div>
            <div id="error-message"></div>
            <button type="submit" name="submit" class="button disable-element" id="register-button" disabled>Register Now</button>
            <div><?php echo $error ?></div>
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </section>

    <script src="assets/js/main.js"></script>
</body>

</html>