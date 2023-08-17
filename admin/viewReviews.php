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
                    print_r($reviewTable);
                    if($reviewTable === false) {
                        $html .= 
                        "<p>You didn't add any reviews yet.</p>";
                    }
                    else {
                    ?>
                        <table class="table-display">
                            <thead>
                                <tr>
                                    <th>P.N.</th>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th><i class="fa fa-pen"></i></th>
                                    <th><i class="fa fa-delete-left"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i = 0; $i < count($reviewTable); $i++) {
                                ?>
                                    <tr>
                                        <td><?=$reviewTable[$i]["property_id"]?></td>
                                        <td><?=$reviewTable[$i]["title"]?></td>
                                        <td><?=$reviewTable[$i]["rating"]?></td>
                                        <td><?=$reviewTable[$i]["comment"]?></td>
                                        <td><a href="viewTenants.php?action=edit">Edit</a></td>
                                        <td><a href="viewTenants.php?action=delete">Delete</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="viewTenants.php?action=add">
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