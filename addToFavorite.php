<?php require_once("includes/functions.inc.php"); ?>
<?php require_once("includes/db.inc.php"); ?>

<?php
if(isset($_SESSION["user"]) && isset($_GET["property_id"]) && isset($_GET["action"])){
    $propertyId = intval($_GET["property_id"]);
    $action = $_GET["action"];
    $userId = $_SESSION["user"]["user_id"];
    if($action == "add"){
        $query = "INSERT INTO favorites (user_id, property_id) VALUES ('$userId', '$propertyId')";
    }
    else{
        $query = "DELETE FROM favorites where user_id = '$userId' and property_id = '$propertyId'";        
    }
    mysqli_query($connection, $query);    
    header("location:".$_SERVER['HTTP_REFERER'] ."");
}
?>