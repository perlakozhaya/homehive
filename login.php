<?php require_once "includes/login.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>

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

    <title>Login to Homehive</title>
</head>

<body>
    <section class="form-container">
        <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h3>Login Now</h3>
            <div class="form-control">
                <input type="text" name="email" required placeholder="Enter your email">
                <input type="password" name="password" required placeholder="Enter your password">
                <label for="remember-me">Remember me</label>
			<input type="checkbox" name="remember-me" id="remember-me" >
            </div>
            <button type="submit" name="submit" class="button">Login Now</button>
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
            <div class="login-error">
				<?php echo isset($loginFailed) && $loginFailed?"Login Failed":""; ?>
	        </div>
        </form>
    </section>

</body>

</html>