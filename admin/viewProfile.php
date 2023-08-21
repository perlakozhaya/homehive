<?php require_once("../includes/functions.inc.php"); ?>
<?php require_once("../includes/db.inc.php"); ?>
<?php $pageTitle = "Edit Profile"; ?>
<?php if(isset($_SESSION["user"])) { 
    $user_id = $_SESSION['user']['user_id'];
    $error = "";
    ?>
<?php
var_dump($_POST);
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email'])){
        $name = cleanInput($_POST['name']);
        $email = cleanInput($_POST['email']);
        $phone = cleanInput($_POST['phone']);
        
        $query = "UPDATE user
        SET name = '$name', email = '$email', phone = '$phone'
        WHERE user_id = $user_id";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            echo "Failed to update in database";
        }

        $_SESSION["user"]["name"] = $name;
        $_SESSION["user"]["email"] = $email;
        $_SESSION["user"]["phone"] = $phone;

        if (isset($_POST['old_pass']) && !empty($_POST['old_pass']) &&
            isset($_POST['new_pass']) && !empty($_POST['new_pass']) &&
            isset($_POST['confirm_pass']) && !empty($_POST['confirm_pass'])) 
        {
            $old_pass = cleanInput($_POST['old_pass']);
            $new_pass = cleanInput($_POST['new_pass']);
            $confirm_pass = cleanInput($_POST['confirm_pass']);

            $query = "SELECT password
            FROM user
            WHERE user_id = $user_id";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashed_old_pass = $row['password'];
               
                if ($hashed_old_pass === MD5($old_pass)) {
                    $new_hashed_pass = MD5($new_pass);
                    $query = "UPDATE user
                    SET password = '$new_hashed_pass'
                    WHERE user_id = '$user_id'";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        echo "Failed to update in database";
                    }
                }
            }
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EAA534">
    <meta name="description" content="Website for listing and renting properties">

    <!-- Display Site Icon -->
    <link rel="icon" href="/homehive/assets/favicons/favicon.ico">
        
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

    <title><?php echo $pageTitle . " | " . $config['SITE_TITLE']; ?></title>
</head>
<body>
    <div class="body-wrapper">
        <div class="dashboard-wrapper">
            <?php include("sidebar.php"); ?>
            
            <main class="dashboard-main boxed p-50" id="dashboard-main">
                <section class="boxed p-50 large-spacing">
                    <h2>Edit Profile</h2>
                    
                    <form class="web-form" action="viewProfile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name<span class="req-symbol">*</label>
                            <input type="text" name="name" id="name" required value="<?php echo $_SESSION['user']['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address<span class="req-symbol">*</label>
                            <input type="email" name="email" id="email" required value=<?php echo $_SESSION["user"]["email"]; ?>>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" value=<?php echo $_SESSION["user"]["phone"]; ?>>
                        </div>
                        <fieldset>
                            <legend><h4>Password Change</h4></legend>
                            <div class="form-group">
                                <label for="old_pass">Current Password</label>
                                <input type="password" name="old_pass" id="old_pass" value="lI3@!&uTZC9%@Z">
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="new_pass" id="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" name="confirm_pass" id="confirm-password">
                                <div id="error-message" class="error-message"></div>
                            </div>
                        </fieldset>
                        <div class="error-message"><?=$error;?></div>
                        <div>
                            <button type="submit" name="submit" class="btn" id="submit-button">Save Changes</button>
                        </div>
                    </form>
                    
                </section>
            </main>
        </div>
    <?php } 
    else {
        header("location: /homehive/index.php");
        exit;
    } ?>
    </div>

    <!-- JS Script -->
    <script src="/homehive/assets/js/main.js"></script>
    <script>
        document.getElementById('confirm-password').addEventListener('input', validatePassword);
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            openNav();
        });
    </script>
</body>
</html>