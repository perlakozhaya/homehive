<?php $pageTitle = "Rented Properties"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include("../templates/dashboard-head.php") ?>
<body>
    <div class="body-wrapper">
    <?php if(isset($_SESSION["user"])) { ?>
        <div class="dashboard-wrapper">
            <?php include("sidebar.php"); ?>
            
            <main class="dashboard-main boxed p-50" id="dashboard-main">
                <section class="boxed p-50 large-spacing">
                    <h2>My Rented Properties</h2>
                    <?php
                    $html = "";
                    $userId =  $_SESSION["user"]["user_id"];
                    $propertyIds = show_rented_properties($userId);
                    if($propertyIds === false) {
                        $html .= 
                        "<p>You have not rented any property yet! <a href='host.php'>Rent a Property Now</a></p>";
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
                                WHERE P.property_id IN (" . implode(",", $propertyIds) . ")";

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
                                    <td><a href="viewListedProperties.php?action=edit">Edit</a></td>
                                    <td><a href="viewListedProperties.php?action=delete">Delete</a></td>
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
                    echo $html;
                    ?>
                </section>
            </main>
        </div>
    <?php } 
    else {
        header("location: /homehive/index.php");
        exit;
    } ?>
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