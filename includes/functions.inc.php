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

function capitalizeString($input) {
    $firstChar = strtoupper($input[0]);
    $myString = strtolower(substr($input, 1));
    return $firstChar . $myString;
}

function setUniqueSlug($slug) {
    global $connection;
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
        $counter++;
    }
}

function send_email_admin($name, $email, $message) {
    global $config;
    $to = "info@homehive.com";
    $from = $email;
    $subject = "New Contact Form Submission";
    $body = "<p>Hello, " . $config['SITE_TITLE'] . "</p>";
    $body .= "<p>You have received a new message from $name</p>";
    $body .= "<p>$message</p>";

    return mail($to, $subject, $body, "from: $from");
}

function send_email_visitor($name, $email) {
    $to = $email;
    $from = "info@homehive.com";
    $subject = "Your message has been received";
    $body = "<p>Dear $name, </p>";
    $body .= "<p>Your message has been received</p>";
    $body .= "<p>Have a nice day!</p>";

    return mail($to, $subject, $body, "from: $from");
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
    $query = "SELECT M.file_name, M.description, P.title, P.slug, P.price_per_night, PT.description as property_type, A.country, A.state, A.city, R.rating
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
                $image_url = "/homehive/assets/img/" . ($filename ? "uploads/$filename" : "custom-image-placeholder.jpg");

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
                    <a class='p-button' href='//localhost/homehive/property/" . $rowProperties[$i]['slug'] . "'>View Details</a>
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
    $query = "SELECT P.property_id
    FROM property_type PT INNER JOIN property P ON PT.property_type_id = P.property_type_id
    WHERE PT.description = '$category'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) <= 0) {
        return false;
    }

    $propertyIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $propertyIds[] = $row['property_id'];
    }
    return $propertyIds;
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

function get_property_details($slug) {
    global $connection;
    $query = "SELECT P.*, A.*, PT.description as type, U.name as host, U.email, U.phone, M.file_name, M.description as alt
    FROM property P
    INNER JOIN address A ON P.address_id = A.address_id
    INNER JOIN property_type PT ON P.property_type_id = PT.property_type_id
    INNER JOIN user U ON P.user_id = U.user_id
    LEFT JOIN media M ON P.media_id = M.media_id
    WHERE P.slug = '$slug'";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        return false;
    }
    $row = mysqli_fetch_assoc($result);
    $details = array (
    "property_id" => $row["property_id"],
    "title" => $row["title"],
    "num_bedrooms" => $row["num_bedrooms"],
    "num_bathrooms" => $row["num_bathrooms"],
    "size" => $row["size"],
    "max_occupancy" => $row["max_occupancy"],
    "price_per_night" => $row["price_per_night"],
    "description" => $row["description"],
    "listed_on" => $row["listed_on"],
    "status" => $row["status"],
    "country" => $row["country"],
    "state" => $row["state"],
    "city" => $row["city"],
    "street" => $row["street"],
    "type" => $row["type"],
    "host" => $row["host"],
    "email" => $row["email"],
    "phone" => $row["phone"],
    "file_name" => $row["file_name"],
    "alt" => $row["alt"],
    "favorites" => array()
    );

    if(isset($_SESSION["user"])){
        $query = "select property_id from favorites where user_id = '".$_SESSION["user"]["user_id"]."'";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($result)){
            array_push($details["favorites"], $row["property_id"]);
        }
    }

    return $details;
}

function get_property_amenities($slug) {
    global $connection;
    $query = "SELECT Am.description as amenity
    FROM amenity Am
    INNER JOIN property_amenity PA ON Am.amenity_id = PA.amenity_id
    INNER JOIN property P ON P.property_id = PA.property_id
    WHERE P.slug = '$slug'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) === 0) {
        return false;
    }
    while($row = mysqli_fetch_row($result)) {
        $amenities[] = $row[0];
    }
    return $amenities;
}

function get_property_reviews($slug) {
    global $connection;
    $query = "SELECT R.rating, R.comment, R.user_id, U.name, U.email, UM.file_name
    FROM review R
    INNER JOIN user U ON R.user_id = U.user_id
    INNER JOIN (SELECT RA.property_id, RA.rent_agreement_id
                FROM rent_agreement RA 
                INNER JOIN property P ON RA.property_id = P.property_id
                WHERE P.slug = '$slug') AS rent ON rent.rent_agreement_id = R.rent_agreement_id
	LEFT JOIN media UM ON U.media_id = UM.media_id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) === 0) {
        return false;
    }
    while($row = mysqli_fetch_assoc($result)) {
        $reviews[] = $row;
    }
    return $reviews;
}

function show_reviews($user_id) {
    global $connection;
    $query = "SELECT R.review_id, R.rating, R.comment, RA.rent_agreement_id, P.title, P.slug
    FROM review R
    RIGHT JOIN rent_agreement RA ON R.rent_agreement_id = RA.rent_agreement_id
    INNER JOIN property P ON RA.property_id = P.property_id
    WHERE RA.user_id = $user_id 
    AND	RA.status = 'completed'";

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 0) {
        return false;
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $review[] = $row;
        }
    }
    return $review;
}

function show_listed_properties($userId){
    global $connection;
    $query = "SELECT property_id 
    FROM property 
    WHERE user_id = $userId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    while ($row = mysqli_fetch_assoc($result)){
        $propertyIds[] = $row['property_id'];
    }
    return $propertyIds;
}

function show_rented_properties($userId){
    global $connection;
    $query = "SELECT RA.*, R1.file_name, P.title, P.slug
    FROM rent_agreement RA
    INNER JOIN property P ON RA.property_id = P.property_id
    LEFT JOIN 
        (SELECT M.file_name, P.property_id
        FROM media M 
        INNER JOIN property P ON P.media_id = M.media_id) AS R1 ON RA.property_id = R1.property_id
    WHERE RA.user_id = $userId";

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 0){
        return false;
    } 
    while ($row = mysqli_fetch_assoc($result)){
        $rent_agreement[] = $row;
    }
    return $rent_agreement;
}

function getTenantIds($userId) {
    global $connection;
    $query = "SELECT RA.user_id as tenant_id
    FROM rent_agreement RA INNER JOIN property P ON RA.property_id = P.property_id
    WHERE P.user_id = '$userId'";

    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 0) {
        return false;
    }
    else {
        while($row = mysqli_fetch_assoc($result)) {
            $tenantIds[] = $row["tenant_id"];
        }
    }
    return $tenantIds;
}

function getSavedProperties($userId) {
    global $connection;
    $query = "SELECT property_id
    FROM property
    WHERE property_id IN (SELECT property_id FROM favorites WHERE user_id = '$userId')";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    else {
        while ($row = mysqli_fetch_assoc($result)) {
            $propertyIds[] = $row['property_id'];
        }
    }
    return $propertyIds;
}

function deleteProperty($propertyId) {
    global $connection;
    $query = "UPDATE property
    SET status = '-1'
    WHERE property_id = $propertyId";
    return $result = mysqli_query($connection, $query);
}

function display_review($user_id, $property_id) {
    global $connection;
    $query = "SELECT R.review_id, R.rating, R.comment, RA.rent_agreement_id
    FROM review R
    RIGHT JOIN rent_agreement RA ON R.rent_agreement_id = RA.rent_agreement_id
    WHERE RA.user_id = $user_id 
    AND RA.property_id = $property_id 
    AND RA.status = 'completed'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) === 0) {
        return false; // user is not a tenant in this property, or status not completed
    }
    return $row = mysqli_fetch_assoc($result); // returns an array consisting of the review table's columns
}
?>