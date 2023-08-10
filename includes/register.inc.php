<?php
require_once "includes/functions.inc.php";
require_once "includes/db.inc.php";
$error = "";
if (
    isset($_POST['name']) && $_POST['name'] != '' && 
    isset($_POST['email']) && $_POST['email'] != '' && 
    isset($_POST['password']) && $_POST['password'] != '' && 
    isset($_POST['confirm-password']) && $_POST['confirm-password'] != ''
) {
    $name = cleanInput($_POST['name']);

    // check phone & email validation + check for matching passwords
    if (validatePhoneNumber($_POST['phone']) &&
    checkEmail($_POST['email']) && 
    checkPasswordMismatch(($_POST['password']), ($_POST['confirm-password']))) {
        
        $email = strtolower(cleanInput($_POST['email']));
        $phone = cleanInput($_POST['phone']);
        $password = cleanInput($_POST['password']);

        // Convert the password to its MD5 hash before using it in the SQL query
        $password = MD5($password);

        // check if email exists in db
        if(!checkEmailExistance($email)) {
            $query = "INSERT INTO user (name, email, phone, password)
            VALUES ('$name', '$email', '$phone', '$password')";

            mysqli_query($connection, $query);

            header("location:login.php");
        }
        else {
            $error = "Email already exists";
        }

    }
    else {
        $error = "Some information are not valid";
    }
}
?>
