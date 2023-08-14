<?php require_once "includes/register.inc.php"; ?>
<?php require_once "includes/db.inc.php"; ?>
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

    <title>Register | <?php echo $config['SITE_TITLE']; ?></title>
</head>

<body>
    <section class="form-bg full-screen--centered">
        <div class="form-container def-spacing">
            <h3>Register Now</h3>
            <form class="web-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" required>
                    <div id="error-message"></div>
                </div>
                <div>
                    <button class="btn" type="submit" name="submit" id="register-button">Register</button>
                </div>
            </form>
            <div><?php echo $error ?></div>
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </div>
    </section>
    <script>
        document.getElementById('confirm-password').addEventListener('input', validatePassword);
    </script>
    <script src="assets/js/main.js"></script>
</body>

</html>