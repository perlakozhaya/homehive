<?php $pageTitle = "Edit Profile"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include("../templates/dashboard-head.php") ?>
<body>
    <div class="body-wrapper">
    <?php if(isset($_SESSION["user"])) { ?>
        <div class="dashboard-wrapper">
            <?php include("sidebar.php"); ?>
            
            <main class="dashboard-main boxed p-50" id="dashboard-main">
                <section class="boxed p-50 large-spacing">
                    <h2>Edit Profile</h2>
                    <form class="web-form" action="viewProfile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name<span class="req-symbol">*</label>
                            <input type="text" name="name" id="name" required value="<?php echo $_SESSION['user']['name']; ?>">
                            <div class="error-message"><?= $name_error; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address<span class="req-symbol">*</label>
                            <input type="email" name="email" id="email" required value=<?php echo $_SESSION["user"]["email"]; ?>>
                            <div class="error-message"><?= $email_error; ?></div>
                        </div>
                        <fieldset>
                            <legend><h4>Password Change</h4></legend>
                            <div class="form-group">
                                <label for="old_pass">Current Password</label>
                                <input type="password" name="old_pass" id="old_pass">
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
                        <div class="error-message"><?= $error; ?></div>
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

<?php
    $user_id = $_SESSION['user']['user_id'];

    if(isset($_POST['name']) && $_POST['name'] != "") {
        if($_POST['name'] != $_SESSION['user']['name']) {
            $name = cleanInput($_POST['name']);
            $query = "UPDATE user
            SET name = '$name'
            WHERE user_id = $user_id";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                echo "Failed to update in database";
            }
        }
    }
    else {
        $name_error = "This is a required field";
    }

    if(isset($_POST['email']) && $_POST['email'] != "") {
        if($_POST['email'] != $_SESSION['user']['email']) {
            if(checkEmail($_POST['email']) && !checkEmailExistance($_POST['email'])) {
                $email = strtolower(cleanInput($_POST['email']));
                $query = "UPDATE user
                SET email = '$email'
                WHERE user_id = $user_id";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    echo "Failed to update in database";
                }
            }
            else {
                $email_error = "Email already exists or is invalid";
            }
        }
    }
    else {
        $email_error = "This is a required field";
    }
?>