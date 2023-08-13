<?php
require_once "includes/functions.inc.php";

if (isset($_POST['email']) && $_POST['email'] != '' && 
	isset($_POST['password']) && $_POST['password'] != '' 
) {
	require_once "includes/db.inc.php";
	$query = "SELECT * FROM user 
	WHERE email = '" . $_POST['email'] . "' AND password = '" . MD5($_POST['password']) . "'";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) > 0) {
		$_SESSION["user"] = mysqli_fetch_array($result);

		if(isset($_POST["remember-me"])) {
			$remember_token = getRandomtoken();
			$query = "UPDATE user
			SET remember_token = '$remember_token'
			WHERE user_id = '" . $_SESSION["user"]["user_id"] . "'";
			mysqli_query($connection, $query);
			setcookie("login_token", $remember_token, time() + 3600, "/");
		}
		
        header("location:index.php");
		exit;
	}
	else {
		$loginFailed = true;
	}
}
?>