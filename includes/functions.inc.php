<?php
session_start();
function cleanInput($input) {
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = trim($input);
        return $input;
}

function checkEmail($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $email;
}

function validatePhoneNumber($phone) {
    $phone = str_replace(' ', '', $phone);
    $pattern = '/^[0-9]+$/'; 
    return preg_match($pattern, $phone); 
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

function getRandomToken() {
    return hash('sha256', time() * rand() * 3228432);
}

function slug($title) {
    global $connection;
    $slug = strtolower(str_replace(' ', '-', $title));
    $originalSlug = $slug;
    $counter = 1;
    while (true) {
        $query = "SELECT slug
        FROM property
        WHERE slug = '$slug'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) === 0) {
            return $slug;
        }
        $slug = $originalSlug . '-' . $counter;
        // $slug .= '-' . uniqid();
        $counter++;
    }
}

function getPropertyIds() {
    global $connection;
    $query = "SELECT property_id
    FROM property";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $propertyIds[] = $row['property_id'];
    }
    return $propertyIds;
}

function getCategories() {
    global $connection;
    $query = "SELECT M.file_name, M.description as alt, PT.description as type
    FROM media M INNER JOIN property_type PT ON M.media_id = PT.featured_image";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        return false;
    }

    $category = array();
    while($row = mysqli_fetch_assoc($result)) {
        // $category[] = array(
        //     'file_name' => $row['file_name'],
        //     'type' => $row['type'],
        //     'alt' => $row['alt]
        // );
        $category[] = $row;
    }
    return $category;
}

function getCities() {
    global $connection;
    $query = "SELECT DISTINCT A.city 
    FROM address A 
    INNER JOIN property P ON A.address_id = P.address_id;";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        return false;
    }
    while($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row['city']; 
    }
    return $cities;
}

function displayProperty($propertyIds) {
    global $connection;
    $html = "";
    $query = "SELECT M.file_name, M.description, P.title, P.price_per_night, PT.description as property_type, A.country, A.state, A.city, R.rating
    FROM property P
    INNER JOIN property_type PT ON P.property_type_id = PT.property_type_id
    INNER JOIN address A ON P.address_id = A.address_id
    LEFT JOIN media M ON M.media_id = P.media_id
    LEFT JOIN (SELECT RA.property_id, AVG(R.rating) as rating FROM review R INNER JOIN rent_agreement RA ON R.rent_agreement_id = RA.rent_agreement_id GROUP BY RA.property_id) R ON P.property_id = R.property_id
    WHERE P.property_id IN (" . implode(",", $propertyIds) . ")";

    $result = mysqli_query($connection, $query);
    $properties = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $properties[] = $row;
    }
    
    $propertiesPerRow = 4;
    $totalproperties = count($properties);

    if (count($propertyIds) !== $propertiesPerRow) {
        $remainingItems = $propertiesPerRow - ($totalproperties % $propertiesPerRow);
    
        for ($k = 0; $k < $remainingItems; $k++) {
            $properties[] = null; // Add null values for empty columns
        }
    }

    foreach (array_chunk($properties, $propertiesPerRow) as $rowProperties) {
        $html .= "<div class='all-columns archive-columns flex'>";

        for($i = 0; $i < count($rowProperties); $i++) {
            if ($rowProperties[$i] === null) {
                $html .= "<div></div>";
            } 
            else {
                $filename = $rowProperties[$i]['file_name'];
                $image_url = "./assets/img/" . ($filename ? "uploads/$filename" : "custom-image-placeholder.jpg");

                $alt = $rowProperties[$i]['description'];
                $image_alt = ($alt ? $alt : "Custom image placeholder of a house with trees");

                $state = $rowProperties[$i]['state'];
                $address = $rowProperties[$i]['country'] . ($state ? ", $state" : "") . ", " . $rowProperties[$i]['city'];
            
                $rating = $rowProperties[$i]['rating'];
                $rating = $rating ? round($rating) : 0;
                $starRating = "";

                $type = $rowProperties[$i]['property_type'];

                $title = $rowProperties[$i]['title'];

                $price = $rowProperties[$i]['price_per_night'] . " USD / night";

                for ($j = 1; $j <= 5; $j++) {
                    $starClass = ($j <= $rating) ? "filled" : "empty";
                    $starRating .= "<span class='$starClass'>&#9733;</span>";
                }
                
                $html .= 
                "<div class='p-archive def-spacing'>
                    <div class='p-image-container'>
                        <img src='$image_url' alt='$image_alt'>
                    </div>
                    <div class='p-content-container'>
                        <p class='p-category'>" . $type . "</p>
                        <p class='p-address'>" . $address . "</p>
                        <h3 class='p-title'>" . $title . "</h3>
                        <div class='p-rating'>" . $starRating . "</div>
                        <p class='p-price'>" . $price . "</p>
                    </div>
                    <a class='p-button' href='//localhost/homehive/property/" . slug($title) . "'>View Details</a>
                </div>";
            }
        }
        $html .= "</div>";
    }
    return $html;
}

function get_property_id_by_address($location) {
    global $connection;
    $query = "SELECT property_id
    FROM property
    WHERE address_id IN (SELECT address_id FROM address WHERE city = '$location');";
    $result = mysqli_query($connection, $query);

    // Handle the database query error
    if (!$result) {
        die("Error retrieving data:" . mysqli_error());
    }
    // Handle the case when no property was found in $location
    if (mysqli_num_rows($result) <= 0) {
        return false;
    }
    // else store the obtained property ids
    $propertyIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $propertyIds[] = $row['property_id'];
    }
    return $propertyIds;
}

function get_property_id_by_type($category) {
    global $connection;
    $query = "SELECT property_id
    FROM property_type
    WHERE description = '$category'";
    $result = mysqli_query($connection, $query);

    // Handle the database query error
    if (!$result) {
        return array('propertyIds' => false, 'display' => "Error retrieving data.");
    }
    // Handle the case when no property was found in $location
    if (mysqli_num_rows($result) <= 0) {
        return array('propertyIds' => false, 'display' => "No property was found.");
    }
    // else store the obtained property ids
    $propertyIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $propertyIds[] = $row['property_id'];
    }
    return array('propertyIds' => $propertyIds, 'display' => "");
}

function get_latest_properties($limit = 4) {
    global $connection;
    $query = "SELECT property_id
    FROM property
    ORDER BY listed_on DESC 
    LIMIT $limit";
    $result = mysqli_query($connection,$query);

    if(!$result){
        return false;
    }

    $propertyIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $propertyIds[] = $row['property_id'];
    }
    return $propertyIds;
}

function get_popular_properties($limit = 4) {
    global $connection;
    $query = "SELECT RA.property_id, AVG(R.rating) AS avg_rating
    FROM rent_agreement RA
    INNER JOIN review R ON RA.rent_agreement_id = R.rent_agreement_id
    GROUP BY RA.property_id
    ORDER BY avg_rating DESC
    LIMIT $limit";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        return false;
    }

    $propertyIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $propertyIds[] = $row['property_id'];
    }
    return $propertyIds;
}

function sendContactEmail($name, $email, $message) {
    $to = '';
    $subject = 'New Contact Form Submission';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $messageBody = "<html><body>";
    $messageBody .= "<h2>New Contact Form Submission</h2>";
    $messageBody .= "<p><strong>Name:</strong> $name</p>";
    $messageBody .= "<p><strong>Email:</strong> $email</p>";
    $messageBody .= "<p><strong>Message:</strong> $message</p>";
    $messageBody .= "</body></html>";

    return mail($to, $subject, $messageBody, $headers);
}
?>