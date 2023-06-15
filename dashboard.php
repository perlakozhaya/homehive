<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <title>Dashboard | HomeHive</title>
</head>

<body>
    <div class="dashboard-header multi-column">
        <div class="column-1">
            <h3>Welcome, <?php echo 'user' #$_SESSION['name'] ?>!</h3>
        </div>
        <div class="column-2 align-right">
            <a href="index.php" class="button">Logout</a>
        </div>
    </div>
</body>

</html>