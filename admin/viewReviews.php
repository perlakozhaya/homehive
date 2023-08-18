<?php $pageTitle = "My Reviews"; ?>
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
                    <h2>Reviews</h2>
                    <?php
                    $html = "";
                    $userId = $_SESSION["user"]["user_id"];
                    $reviewTable = getReviews($userId);
                    if($reviewTable === false) {
                        $html .= "<p>You didn't add any reviews yet.</p>";
                    }
                    else {
                        $groupedReviews = array();
                        foreach ($reviewTable as $review) {
                            $propertyId = $review["property_id"];
                            if (!isset($groupedReviews[$propertyId])) {
                                $groupedReviews[$propertyId] = array(
                                    "property_id" => $propertyId,
                                    "title" => $review["title"],
                                    "ratings" => array(),
                                    "comments" => array()
                                );
                            }
                            $groupedReviews[$propertyId]["ratings"][] = $review["rating"];
                            $groupedReviews[$propertyId]["comments"][] = $review["comment"];
                        }

                        $html .= "<table class='table-display'>";
                        $html .= "<thead>
                                    <tr>
                                        <th>P.N.</th>
                                        <th>Title</th>
                                        <th>Ratings</th>
                                        <th>Comments</th>
                                        <th><i class='fa fa-pen'></i></th>
                                        <th><i class='fa fa-delete-left'></i></th>
                                    </tr>
                                </thead>";
                        $html .= "<tbody>";

                        foreach ($groupedReviews as $propertyReview) {
                            $html .= "<tr>";
                            $html .= "<td>" . $propertyReview["property_id"] . "</td>";
                            $html .= "<td>" . $propertyReview["title"] . "</td>";
                            
                            $ratings = implode(", ", $propertyReview["ratings"]);
                            $html .= "<td>" . $ratings . "</td>";
                            
                            $comments = implode("<br>", $propertyReview["comments"]);
                            $html .= "<td>" . $comments . "</td>";
                            
                            $html .= "<td><a href='viewTenants.php?action=edit'>Edit</a></td>";
                            $html .= "<td><a href='viewTenants.php?action=delete'>Delete</a></td>";
                            $html .= "</tr>";
                        }

                        $html .= "</tbody>";
                        $html .= "</table>";
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
