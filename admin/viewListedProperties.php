<?php
    $pageTitle = "My Listed Properties"; 
    include("../templates/dashboard-head.php");
    if(!isset($_SESSION["user"])) header("location: /homehive/index.php");
    $userId = $_SESSION["user"]["user_id"];
    $action = isset($_GET["action"])?$_GET["action"]:"view";
?>
<body>
    <div class="body-wrapper">
        <div class="dashboard-wrapper">
            <?php include("sidebar.php"); ?>
            <main class="dashboard-main boxed p-50" id="dashboard-main">
                <!-- View Section -->
                <?php
                if($action == "view") { // Here we should display all the user's properties 
                ?>
                <section class="boxed p-50 large-spacing">
                    <h2>My Listed Properties</h2>
                    <?php
                    $propertyIds = show_listed_properties($userId);
                    if($propertyIds === false) {
                        echo "<p>You have not listed any property yet! <a href='host.php'>Become a Host</a></p>";
                    }
                    else {
                    ?>
                        <table class="table-display">
                            <thead>
                                <tr>
                                    <th>P.N.</th>
                                    <th><i class="fa fa-image"></i></th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th><i class="fa fa-pen"></i></th>
                                    <th><i class="fa fa-delete-left"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT M.file_name, P.property_id, P.title, P.price_per_night, P.status, P.listed_on, P.slug, PT.description as property_type, A.country, A.state, A.city
                                FROM property P
                                INNER JOIN property_type PT ON P.property_type_id = PT.property_type_id
                                INNER JOIN address A ON P.address_id = A.address_id
                                LEFT JOIN media M ON M.media_id = P.media_id
                                WHERE P.property_id IN (" . implode(",", $propertyIds) . ")
                                AND P.status != '-1'";

                                $result = mysqli_query($connection, $query);
                                
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?=$row["property_id"]?></td>
                                    <td>
                                        <?php
                                        $file_name = $row["file_name"];
                                        $image_src = ($file_name ? "/homehive/assets/img/uploads/$file_name" : "/homehive/assets/img/custom-image-placeholder.jpg");
                                        echo 
                                        "<div class='table-cell p-image-container'>
                                            <img src=$image_src alt='Property Image'>
                                        </div>";
                                        ?>
                                    </td>
                                    <td><?=$row["title"]?></td>
                                    <td>
                                        <?php
                                        $state = $row["state"];
                                        $address = $row["country"] . ($state ? ", $state" : "") . ", " . $row["city"];    
                                        echo $address;
                                        ?>
                                    </td>
                                    <td><?=$row["property_type"]?></td>
                                    <td><?=$row["price_per_night"]?></td>
                                    <td><?=$row["status"]?></td>
                                    <td><?=$row["listed_on"]?></td>
                                    <td>
                                        <?php 
                                        echo "<a href='//localhost/homehive/property/" . $row["slug"] . "' target='_blank'>View</a>";
                                        ?>
                                    </td>
                                    <td><a href="viewListedProperties.php?action=edit&property_id=<?=$row["property_id"]?>">Edit</a></td>
                                    <td><a href="viewListedProperties.php?action=delete&property_id=<?=$row["property_id"]?>">Delete</a></td>
                                </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="viewListedProperties.php?action=add">
                            <i class="fa fa-plus" style="color: var(--color-primary);"></i>
                            <span>Add</span>
                        </a>
                    <?php
                        }
                    ?>
                </section>
                <?php
                }
                else if($action == "edit" || $action == "add") { // we are checking if the action is add or edit, so we need to display the form  
                    // Creating all needed fields in variables
                    $title = "";           
                    $slug = "";           
                    $type = "";   
                    $country = "";        
                    $state = "";        
                    $city = "";        
                    $street = "";        
                    $postal_code = "";        
                    $description = "";    
                    $file_name = "";    
                    
                    if($action == "edit" && isset($_GET["property_id"])) { // if the action = edit and isset property id, so the user is editing a property
                        $property_id = intval($_GET["property_id"]);
                        // below we are checking if isset the fields, so the user has edited the property and submitted the form 
                        if(isset($_POST["title"]) && !empty($_POST["title"]) &&
                        isset($_POST["slug"]) && !empty($_POST["slug"]) &&
                        isset($_POST["type"]) && !empty($_POST["type"]) &&
                        isset($_POST["country"]) && !empty($_POST["country"]) &&
                        isset($_POST["state"]) && !empty($_POST["state"]) &&
                        isset($_POST["city"]) && !empty($_POST["city"]) &&
                        isset($_POST["street"]) && !empty($_POST["street"]) &&
                        isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) &&
                        isset($_POST["description"]) && !empty($_POST["description"])
                        ) {
                            $slug = cleanInput($_POST["slug"]);
                            $slug = strtolower(str_replace(' ', '-', $slug));
                            $slug = setUniqueSlug($slug);

                            $title = cleanInput($_POST["title"]);
                            $type = cleanInput($_POST["type"]);
                            $country = cleanInput($_POST["country"]);
                            $state = cleanInput($_POST["state"]);
                            $city = cleanInput($_POST["city"]);
                            $street = cleanInput($_POST["street"]);
                            $postal_code = cleanInput($_POST["postal_code"]);
                            $description = cleanInput($_POST["description"]);
                            // $file_name + media gallery

                            $query =  "UPDATE property SET 
                            title = '$title',
                            slug = '$slug',
                            type = '$type',
                            country = '$country',
                            state = '$state',
                            city = '$city',
                            street = '$street',
                            postal_code = '$postal_code',
                            description = '$description'
                            WHERE property_id = '$property_id'";

                            $result = mysqli_query($connection, $query);

                            if($result) {
                                header("location:/homehive/admin/viewListedProperties.php?action=view");
                                exit;
                            }
                            echo "<p>Failed to update property! Try again later.</p>";
                        }
                        // If the above is not true, so bi koun awal marra el user fet 3al edit, so we need to get the property info from DB and display them in the form so the user can update them
                        $query = "SELECT P.title, P.slug, P.description, PT.description as type, A.country, A.state, A.city, A.street, A.postal_code
                        FROM property P 
                        INNER JOIN property_type PT ON P.property_type_id = PT.property_type_id
                        INNER JOIN address A ON P.address_id = A.address_id
                        WHERE P.property_id = $property_id";

                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);

                        $title = $row["title"];           
                        $slug = $row["slug"];             
                        $description = $row["description"];  
                        $type = $row["type"];    
                        $country = $row["country"];        
                        $state = $row["state"];        
                        $city = $row["city"];        
                        $street = $row["street"];        
                        $postal_code = $row["postal_code"];        
                    }
                    else if( // if the action is add and isset the fields, so the user added new property details and submitted the form
                        $action == "add" &&
                        isset($_POST["title"]) && !empty($_POST["title"]) && 
                        isset($_POST["slug"]) && !empty($_POST["slug"]) &&
                        isset($_POST["type"]) && !empty($_POST["type"]) &&
                        isset($_POST["country"]) && !empty($_POST["country"]) &&
                        isset($_POST["state"]) && !empty($_POST["state"]) &&
                        isset($_POST["city"]) && !empty($_POST["city"]) &&
                        isset($_POST["street"]) && !empty($_POST["street"]) &&
                        isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) &&
                        isset($_POST["description"]) && !empty($_POST["description"])
                    ) {
                        $slug = cleanInput($_POST["slug"]);
                        $slug = strtolower(str_replace(' ', '-', $slug));
                        $slug = setUniqueSlug($slug);

                        $title = cleanInput($_POST["title"]);
                        $type = cleanInput($_POST["type"]);
                        $country = cleanInput($_POST["country"]);
                        $state = cleanInput($_POST["state"]);
                        $city = cleanInput($_POST["city"]);
                        $street = cleanInput($_POST["street"]);
                        $postal_code = cleanInput($_POST["postal_code"]);
                        $description = cleanInput($_POST["description"]);
                       
                        // $query = "INSERT INTO property () VALUES ('$title')" ...
                        $result = mysqli_query($connection, $query);

                        if($result) {
                            header("location:/homehive/admin/viewListedProperties.php?action=view");
                            exit;
                        }
                        echo "<p>Failed to add new property! Try again later.</p>";
                    }
                ?>
                <!-- Add Section -->
                <section class="boxed large-spacing p-50">
                    <h2 class="align-center">Become a Host</h2>
                    <form class="web-form" action="/homehive/admin/viewListedProperties.php?action=<?=$action?>" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend><h3>Property Information:</h3></legend>
                                <div class="form-group">
                                    <label for="title">Title<span class="req-symbol">*</span></label>
                                    <input type="text" id="title" name="title" value="<?=$title?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug<span class="req-symbol">*</span>
                                        <span class="fa-stack tooltip" title="A slug is a hyphen separated identifier at the end part of a URL (sample-title). It defaults to the property title.">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-question fa-stack-1x --color-white"></i>
                                        </span>
                                    </label>
                                    <input type="text" id="slug" name="slug" value="<?=$slug?>" required>
                                </div>
                                <div>
                                    <p>Type<span class="req-symbol">*</span></p>
                                    <?php 
                                    $categories = getCategories();
                                    for($i = 0; $i < count($categories); $i++) {
                                        $types[] = $categories[$i]['type'];
                                    }

                                    $html = "";
                                    foreach($types as $category) {
                                        $checked = ($category == $type ? "checked" : "");
                                        $html .= "<div>";
                                        $html .= "<input type='radio' id='" . strtolower($category) . "' name='property' value='$category' $checked>";
                                        $html .= "<label for='" . strtolower($category) . "'>" . $category . "</label>";
                                        $html .= "</div>";
                                    }
                                    echo $html;
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country<span class="req-symbol">*</span></label>
                                    <input type="text" id="country" name="country"  value="<?=$country?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" value="<?=$state?>">
                                </div>
                                <div class="form-group">
                                    <label for="city">City<span class="req-symbol">*</span></label>
                                    <input type="text" id="city" name="city" value="<?=$city?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="street">Street<span class="req-symbol">*</span></label>
                                    <input type="text" id="street" name="street" value="<?=$street?>" required>
                                </div>  
                                <div class="form-group">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="text" id="postal_code" name="postal_code" value="<?=$postal_code?>">
                                </div>
                        </fieldset>
                        
                        <fieldset>
                            <legend><h3>Additional Details:</h3></legend>
                                <div class="form-group">
                                    <label for="description">Description: </label>
                                    <input type="text" id="description" name="description" value="<?=$description?>">
                                </div>
                                <div class="form-group file">
                                    <label for="image">Main Image</label>
                                    <input type="file" id="image" name="image">
                                </div>
                                <div class="form-group file">
                                    <label for="gallery">Image Gallery</label>
                                    <input type="file" id="gallery" name="gallery[]" multiple>
                                </div>
                        </fieldset>                        
                        <div>
                            <button class="btn" type="submit">Submit</button>
                            &nbsp;
                            <button class="btn" type="button" onclick="window.location.href='/homehive/admin/viewListedProperties.php'">Cancel</button>
                        </div>
                    </form>
                </section>
                <?php
                }
                else if($action == "delete" && isset($_GET["property_id"])) {
                    $property_id = intval($_GET["property_id"]);
                    // you can create a function to delete a property - never delete, update status to -1 or 0 (we call it soft delete in order not to lose data)
                    if(deleteProperty($property_id)) {
                        echo "<p>Property was successfully deleted.</p>";
                    }
                    else {
                        echo "<p>Failed to delete property! Try Again Later.</p>";
                    }
                }
                ?>
            </main>
        </div>
    </div>

    <!-- JS Script -->
    <script src="/homehive/assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            openNav();
        });
    </script>
</body>
</html>