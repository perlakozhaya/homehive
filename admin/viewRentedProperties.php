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
                    $user_id =  $_SESSION["user"]["user_id"];
                    $rent_agreement = show_rented_properties($user_id);
                    if($rent_agreement === false) {
                        echo "<p>You have not rented any property yet! <a href='host.php'>Rent a Property Now</a></p>";
                    }
                    else {
                    ?>
                        <table class="table-display">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-image"></i></th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Due</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($rent_agreement as $row) {
                            ?>
                                <tr>
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
                                    <td><?=$row["start_date"]?></td>
                                    <td><?=$row["end_date"]?></td>
                                    <td><?=$row["total_amount"]?></td>
                                    <td><?=$row["amount_paid"]?></td>
                                    <td><?=$row["amount_due"]?></td>
                                    <td><?=capitalizeString($row["status"])?></td>
                                    <td><?="<a href='//localhost/homehive/property/" . $row["slug"] . "'>View</a>";?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </section>
            </main>
        </div>
    <?php 
    } 
    else {
        header("location: /homehive/index.php");
        exit;
    }
    ?>
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