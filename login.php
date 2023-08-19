<?php require_once "includes/functions.inc.php"; ?>
<?php require_once "includes/login.inc.php"; ?>
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

    <title>Login to <?php echo $config['SITE_TITLE']; ?></title>
</head>

<body>
    <section class="form-bg full-screen--centered">
        <div class="form-container def-spacing">
            <h3>Login Now</h3>
            <form class="web-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <input type="checkbox" name="remember-me" id="remember-me" value="Remember me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn">Login</button>
                </div>
            </form>
            <div class="login-error">
                <?php echo isset($loginFailed) && $loginFailed?"email and/or password not correct":""; ?>
            </div>
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </div>
    </section>
</body>

</html>