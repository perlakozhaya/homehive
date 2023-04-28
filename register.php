<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="assets/css/styles.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <title>Log in to HomeHive</title>
</head>

<body>
    <section class="form-container">
        <form class="form-group" action="" method="post">
            <h3>Register Now</h3>
            <div class="form-control">
                <input type="text" name="name" required placeholder="Enter your name">
                <input type="email" name="email" required placeholder="Enter your email">
                <input type="password" name="password" required placeholder="Enter your password">
                <input type="password" name="password-confirm" required placeholder="Confirm your password">
                <select name="user-type">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <button type="submit" name="submit" class="button">Register Now</button>
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </section>
</body>

</html>