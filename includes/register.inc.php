<?php
require_once "includes/functions.inc.php";
$error = "";
if (
    isset($_POST['name']) && $_POST['name'] != '' && 
    isset($_POST['email']) && $_POST['email'] != '' && 
    isset($_POST['password']) && $_POST['password'] != '' && 
    isset($_POST['confirm-password']) && $_POST['confirm-password'] != ''
) {
    require_once "includes/db.inc.php";
    $user["name"] = cleanInput($_POST['name']);
    $user["email"] = cleanInput($_POST['email']);
    $user["phone"] = cleanInput($_POST['phone']);
    $user["password"] = cleanInput($_POST['password']);
    $user["confirm-password"] = cleanInput($_POST['confirm-password']);

    // check phone & email validation + check for matching passwords
    if (checkPhoneNumber($_POST['phone']) && 
        checkEmail($_POST['email']) && 
        checkPasswordMismatch(($_POST['password']), ($_POST['confirm-password']))) {
        
        $user["email"] = checkEmail(strtolower($_POST['email']));
        $user["phone"] = $_POST['phone'];
        $user["password"] = $_POST['password'];
    
        // check if email exists in db
        if(!checkEmailExistance($user["email"])) {
            $query = "INSERT INTO user (name, email, phone, password)
            VALUES ('{$user["name"]}', '{$user["email"]}', '{$user["phone"]}', '{$user["password"]}')";

            mysqli_query($connection, $query);

            header("location:login.php");
        }
        else {
            $error = "Email already exists";
        }

    }
    else {
        $error = "Some information are incorrect";
    }
}
?>
