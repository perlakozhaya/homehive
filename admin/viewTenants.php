<?php $pageTitle = "My Tenants"; ?>
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
                    <h2>My Tenants</h2>
                    <?php
                    $html = "";
                    $userId = $_SESSION["user"]["user_id"];
                    $tenantIds = getTenantIds($userId);
                    if($tenantIds === false) {
                        $html .= 
                        "<p>No active tenants found for your listed properties.</p>";
                    }
                    else {
                    ?>
                        <table class="table-display">
                            <thead>
                                <tr>
                                    <th>T.N.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>P.N.</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT u.user_id as tenant_id, u.name, u.email, u.phone, p.property_id, r.total_amount, r.amount_paid, r.amount_due
                                FROM rent_agreement r
                                INNER JOIN user u ON r.user_id = u.user_id
                                INNER JOIN property p ON r.property_id = p.property_id
                                WHERE r.user_id IN (" . implode(",", $tenantIds) . ")";
                    
                                $result = mysqli_query($connection, $query);
                                
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?=$row["tenant_id"]?></td>
                                    <td><?=$row["name"]?></td>
                                    <td><?=$row["email"]?></td>
                                    <td>
                                        <?php
                                        $phone = $row["phone"];
                                        echo ($phone ? $phone : "-" );
                                        ?>
                                    </td>
                                    <td><?=$row["property_id"]?></td>
                                    <td><?=$row["total_amount"]?></td>
                                    <td><?=$row["amount_paid"]?></td>
                                    <td><?=$row["amount_due"]?></td>
                                </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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