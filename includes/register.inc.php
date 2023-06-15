<?php
require_once "includes/functions.inc.php";
$error = "";
if (
    isset($_POST['name']) && $_POST['name'] != '' && 
    isset($_POST['email']) && $_POST['email'] != '' && 
    isset($_POST['password']) && $_POST['password'] != '' && 
    isset($_POST['confirm-password']) && $_POST['confirm-password'] != ''
) {
    // require_once "includes/db.inc.php";
    // $user["name"] = cleanInput($_POST['name']);
	// $user["email"] = cleanInput($_POST['email']);
	// $user["username"] = cleanInput(strtolower($_POST['username']));
	// $user["password"] = cleanInput($_POST['password']);

    if ($_POST['password'] === $_POST['confirm-password']) {
        $error = "Registration successful!";
    } 
    else {
        $error = "Error: Passwords do not match!";
    }
}
?>



