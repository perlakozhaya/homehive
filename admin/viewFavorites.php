<?php $pageTitle = "My Saved Properties"; ?>
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
                    <h2>Favorites</h2>
                    <?php
                    $html = "";
                    $userId = $_SESSION["user"]["user_id"];
                    $propertyIds = getSavedProperties($userId);
                    if($propertyIds === false) {
                        $html .= 
                        "<p>No saved properties were found! <a href='../properties.php'>Browse Properties</a></p>";
                    }
                    else {
                    ?>
                        <table class="table-display">
                            <thead>
                                <tr>
                                    <th>P.N.</th>
                                    <th>Title</th>
                                    <th><i class="fa fa-pen"></i></th>
                                    <th><i class="fa fa-delete-left"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT property_id, title
                                FROM property
                                WHERE property_id IN (" . implode(",", $propertyIds) . ")";
                    
                                $result = mysqli_query($connection, $query);
                                
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?=$row["property_id"]?></td>
                                    <td><?=$row["title"]?></td>
                                    <td><a href="viewTenants.php?action=edit">Edit</a></td>
                                    <td><a href="viewTenants.php?action=delete">Delete</a></td>
                                </tr>
                                    <?php
                                    }
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