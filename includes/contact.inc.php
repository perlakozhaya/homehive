<?php require_once("functions.inc.php"); ?>
<?php
$submissionMessage = "";
if (isset($_POST['name']) && $_POST['name'] != '' && 
isset($_POST['email']) && $_POST['email'] != '' && 
isset($_POST['message']) && $_POST['message'] != '' 
) { 
    $name = cleanInput($_POST['name']);
    $email = checkEmail($_POST['email']);
    $message = cleanInput($_POST['message']);

    if(send_email_admin($name, $email, $message) && send_email_visitor($name, $email)) {
        $submissionMessage .= "Thank you for contacting us. Your message has been sent successfully.";
    }
    else {
        $submissionMessage .= "Sorry, there was an issue sending your message. Please try again later.";
    }
}
$_SESSION['submissionMessage'] = $submissionMessage; // use SESSION to clear the message after it has been displayed upon refresh
header("Location: ../contact.php");
exit;
?>