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
                    $userId = $_SESSION["user"]["user_id"];
                    $review = show_reviews($userId);
                    if($review === false) {
                        echo "<p>You didn't add any reviews yet.</p>";
                    }
                    else { ?>
                        <table class='table-display'>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th><i class='fa fa-pen'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i = 0; $i < count($review); $i++) {
                                $review_id = $review[$i]["review_id"];

                                $comment = $review[$i]["comment"];
                                $comment = $comment ? $comment : "-";
                                echo 
                                "<tr>
                                    <td>" . $review[$i]["title"] . "</td>
                                    <td>" . $review[$i]["rating"] . "</td>
                                    <td>" . $comment . "</td>
                                    <td><a href='//localhost/homehive/property/" . $review[$i]["slug"] . "'>Edit</a></td>
                                </tr>";
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
