<?php
if (isset($_POST["rating"]) && isset($_POST["comment"])) {
    // handle adding new review
    if ($review["rating"] === NULL) {
        $comment = cleanInput($_POST["review"]);
        $rent_agreement_id = $review["rent_agreement_id"];
        if (is_numeric($_POST["rating"]) && 
            $_POST["rating"] >= 1 && 
            $_POST["rating"] <= 5) 
        {
            $rating = cleanInput($_POST["rating"]);
        }
        $query = "INSERT INTO review(user_id, rent_agreement_id, rating, comment)
        VALUES($user_id, $rent_agreement_id, '$rating', '$comment')";
        if (!mysqli_query($connection, $query)) {
            $message .= "<p>Failed to add a review! Try again later.</p>";
        }
        else {
            $message .= "<p>Success! Thank you for your feedback.</p>";
        }
        header("location:/homehive/property/$slug");
    } 
    // handle editing existing review
    else {
        $comment = cleanInput($_POST["review"]);
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
            header("location:/homehive/property/$slug");
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
            header("location:/homehive/property/$slug");
        }
        else {
            $message .= "<p>Please make sure you've entered valid data then try again.</p>";
            header("location:/homehive/property/$slug");
        }
    }
}
?>