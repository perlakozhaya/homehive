<?php
session_start();
function cleanInput($input) {
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = trim($input);
        return $input;
}

function getRandomToken() {
    return hash('sha256', time() * rand() * 3228432);
}

function checkEmail($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $email;
}

function checkPhoneNumber($phone) {
    if(strlen($phone) < 9) {
        for ($i = 0; $i < strlen($phone); $i++) {
            $char = $phone[$i];
    
            if ($char < '0' || $char > '9') {
                return false;
            }
        }
        return true;
    }
}

function validatePhoneNumber($phone) {
    $pattern = '/^[0-9]+$/'; 
    return preg_match($pattern, $phone); 
    // preg_match() is a built-in php function that takes two arguments (1. a regex pattern, 2. string to check) 
}

function checkPasswordMismatch($password, $confirmPassword) {
    if ($password === $confirmPassword) {
        return true;
    } 
    else {
        return false;
    }
}

function checkEmailExistance($email){
    global $connection;
    $query = "SELECT user_id FROM user WHERE `email` = '$email'";
    $result = mysqli_query($connection, $query);
    return mysqli_num_rows($result) > 0;
}
?>
