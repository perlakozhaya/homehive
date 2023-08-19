<?php require_once "includes/functions.inc.php"; ?>
<?php require_once "includes/db.inc.php"; ?>
<?php
$slug = $_GET['slug'];
$details = get_property_details($slug);
$title = $details["title"];
?>
<?php $pageTitle = $title . " | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <?php
        $property_id = $details["property_id"];

        $filename = $details['file_name'];
        $img_src = "/homehive/assets/img/" . ($filename ? "uploads/$filename" : "custom-image-placeholder.jpg");

        $alt = $details['alt'];
        $img_alt = ($alt ? $alt : "Property Image");

        $state = $details['state'];
        $address = $details['country'] . ($state ? ", $state" : "") . ", " . $details['city'];
    
        $price = $details['price_per_night'] . " USD / night";
    ?>
    <?php
    if($details['status'] == 'Occupied') {
        echo 
        "<div class='info-bar align-center'>
            <h5>This property is currently occupied.</h5>
        </div>";
    }
    ?>
    <section class="boxed p-50 single-property">
        <div class="flex">
            <div class="p-image-container">
                <img src=<?=$img_src?> alt=<?=$img_alt?>/>
            </div>
            <div class="p-details def-spacing">
                <h2><?=$details['title']?></h2>
                <p>Listed on: <?=$details['listed_on']?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?=$address?></p>

                <h5>Description: </h5>
                <span><?=$details['description']?></span>
                
                <div class="p-info flex">
                    <ul class="p-list">
                        <li><i class="fas fa-building"></i> <?=$details['type']?></li>
                        <li><i class="fas fa-bed"></i> <?=$details['num_bedrooms']?></li>
                        <li><i class="fas fa-arrows-up-down-left-right"></i> <?=$details['size']?></li>
                        <li><i class="fas fa-users"></i> <?=$details['max_occupancy']?></li>
                    </ul>
    
                    <ul class="p-list">
                        <h5>Amenities</h5>
                        <?php
                        $amenities = get_property_amenities($slug);
                        foreach($amenities as $amenity) {
                            echo "<li>$amenity</li>";
                        }
                        ?>
                    </ul>
                </div>

                <p class='p-price'><?=$price?></p>
                <div>
                    <?php
                        $isfav = false;
                        foreach($details["favorites"] as $fav_property_id){
                            if($fav_property_id == $details["property_id"]){
                                $isfav = true;
                                break;
                            }
                        }
                        $action = $isfav?"remove":"add";
                        $faClass = $isfav?"fas":"far";
                    ?>
                    
                    <a href="/homehive/addToFavorite.php?property_id=<?=$details["property_id"]?>&action=<?=$action?>">
                        <i class="<?=$faClass?> fa-heart" id="save-button"></i>
                        <span id="save-message"><?=capitalizeString($action)?></span>
                    </a>
                </div>

                <div class="p-host">
                    <h5>Host</h5>
                    <p class="op-name"><?=$details['host']?></p>
                    <p class="op-email"><?=$details['email']?></p>
                    <p class="op-phone"><?=$details['phone']?></p>
                </div>
            </div>
        </div>
        <div class="reviews p-50 def-spacing">
            <?php
            $reviews = get_property_reviews($slug);
            if($reviews === false) {
                echo "<p>No reviews yet.</p>";
            }
            else {
                foreach($reviews as $review) {
                    $op_img = $review['file_name'];
                    $op_img = $op_img ? "../assets/img/uploads/$op_img" : "../assets/img/user-profile-placeholder.png";
            ?>
            <div class="flex review-item">
                <div class="op-info">
                    <div class="op-image p-image-container">
                        <img src="<?=$op_img?>" alt="<?=$review["name"]?>'s Profile">
                    </div>
                    <p class="op-name"><?=$review["name"]?></p>
                    <p class="op-email"><?=$review["email"]?></p>
                </div>
                <div class="op-review">
                    <?php
                    $rating = $review["rating"];
                    $star_rating = "";
                    for ($i = 1; $i <= 5; $i++) {
                        $star_class = ($i <= $rating) ? "filled" : "empty";
                        $star_rating .= "<span class='$star_class'>&#9733;</span>";
                    }
                    echo $star_rating;
                    ?>
                    <p><?=$review["comment"]?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <?php
            // add a review section
            if(isset($_SESSION["user"])) {
                $user_id = $_SESSION["user"]["user_id"];
                $review = display_review($user_id, $property_id);
                $message = "";

                // Check if the form has been submitted
                if (isset($_POST["rating"]) && isset($_POST["comment"])) {
                    // handle adding new review
                    if ($review["rating"] === NULL) {
                        $comment = cleanInput($_POST["comment"]);
                        $rent_agreement_id = $review["rent_agreement_id"];
                        if (is_numeric($_POST["rating"]) && 
                            $_POST["rating"] >= 1 && 
                            $_POST["rating"] <= 5) 
                        {
                            $rating = cleanInput($_POST["rating"]);
                            $query = "INSERT INTO review(user_id, rent_agreement_id, rating, comment)
                            VALUES($user_id, $rent_agreement_id, '$rating', '$comment')";
                            if (!mysqli_query($connection, $query)) {
                                $message .= "<p>Failed to add a review! Try again later.</p>";
                            }
                            else {
                                $message .= "<p>Success! Thank you for your feedback.</p>";
                            }
                        }
                        else {
                            $message .= "<p>Please make sure you've entered valid data then try again.</p>";
                        }
                    // handle editing existing review
                    } else {
                        $review_id = $review["review_id"];
                        $comment = cleanInput($_POST["comment"]);
                        // update
                        if (is_numeric($_POST["rating"]) && 
                            $_POST["rating"] >= 1 && 
                            $_POST["rating"] <= 5) 
                        {
                            $rating = cleanInput($_POST["rating"]);
                            $query = "UPDATE review
                            SET rating = '$rating', comment = '$comment'
                            WHERE review_id = $review_id AND user_id = $user_id;";
                            if (!mysqli_query($connection, $query)) {
                                $message .= "<p>Failed to update review! Try again later.</p>";
                            }
                            else {
                                $message .= "<p>Your review was successfully updated.</p>";
                            }
                        }
                        // delete
                        else if (is_numeric($_POST["rating"]) && $_POST["rating"] == 0) {
                            $rating = cleanInput($_POST["rating"]);
                            $query = "DELETE FROM review 
                            WHERE review_id = $review_id 
                            AND user_id = $user_id";
                            if (!mysqli_query($connection, $query)) {
                                $message .= "<p>Failed to remove review! Try again later.</p>";
                            }
                            else {
                                $message .= "<p>Your review was successfully deleted.</p>";
                            }
                        }
                        else {
                            $message .= "<p>Please make sure you've entered valid data then try again.</p>";
                        }
                    }
                }

                if ($review) {
                    if ($review["rating"] == NULL) {
                        echo
                        "<form class='web-form review-form' action='/homehive/property/$slug' method='POST'>
                            <div>
                                <label for='rating'>How much do you recommend this property?</label>
                                <input type='number' name='rating' id='rating' min='1' max='5'>
                            </div>
                            <div class='form-group'>
                                <label for='comment'>Add a Comment</label>
                                <input type='text' name='comment' id='comment'>
                            </div>
                            <div>
                                <input type='submit' name='submit' class='btn' value='Submit'>
                            </div>
                            <div>" . $message . "</div>
                        </form>";
                    }
                    else {
                        $label = "";
                        if($review["comment"]) {
                            $label = "Edit your comment";
                        }
                        else {
                            $comment = " ";
                            $label = "Add a comment";
                        }
                        echo 
                        "<form class='web-form review-form' action='/homehive/property/$slug' method='POST'>
                            <div>
                                <label for='rating'>How much do you recommend this property?</label>
                                <input type='number' name='rating' id='rating' min='0' max='5' value='" . $review["rating"] . "'>
                            </div>
                            <div class='form-group'>
                                <label for='comment'>$label</label>
                                <input type='text' name='comment' id='comment' value='" . $review["comment"] . "'>
                            </div>
                            <div>
                                <input type='submit' name='submit' class='btn' value='Save Changes'>
                            </div>
                            <div>" . $message . "</div>
                        </form>";
                    }
                }
                else {
                    echo '
                    <span>Unable to add a review
                        <span class="fa-stack tooltip" title="Only tenants can leave a review. If you are a tenant, you might haven\'t completed your stay yet.">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fas fa-question fa-stack-1x --color-white"></i>
                        </span>
                    </span>';
                }
            }
            ?>
        </div>
    </section>
    <?php include('templates/footer.php'); ?>
</html>