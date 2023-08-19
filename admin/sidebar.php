<aside class="sidebar --color-white" id="sidebar">
    <div class="side-header def-spacing">
        <?php 
        $query = "SELECT M.file_name
        FROM media M INNER JOIN user U ON M.media_id = U.media_id
        WHERE user_id = '" . $_SESSION["user"]["user_id"] . "'";
        $result = mysqli_query($connection, $query);

        $profile_image = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)) {
            $image_src = "../assets/img/uploads/" . $profile_image["file_name"];
        }
        else {
            $image_src = "../assets/img/user-profile-placeholder.png";
        }
        ?>
        <div class="p-image-container">
            <img src=<?= $image_src ?> alt="User Profile Picture"> 
        </div>
        <p>Hello, <?php echo $_SESSION["user"]["name"]; ?></p>
    </div>
    <nav class="side-nav">
        <a href="javascript:void(0)" class="close-btn" onclick="closeNav()"><i class="fa fa-close"></i></a>
        <a href="viewListedProperties.php" class="flex fixed-content">
            <i class="fa fa-th-list"></i>
            <p>Listed Properties</p>
        </a>    
        <a href="viewTenants.php" class="flex fixed-content">
            <i class="fa fa-users"></i>
            <p>All Tenants</p>
        </a>    
        <a href="viewRentedProperties.php" class="flex fixed-content">
            <i class="fa fa-th-list"></i>
            <p>Rented Properties</p>
        </a>
        <a href="viewFavorites.php" class="flex fixed-content">
            <i class="fa fa-heart"></i>
            <p>Favorites</p>
        </a>
        <a href="viewReviews.php" class="flex fixed-content">
            <i class="fa fa-star"></i>
            <p>My Reviews</p>
        </a>
        <a href="viewProfile.php" class="flex fixed-content">
            <i class="fa fa-user"></i>
            <p>Profile</p>
        </a>
        <a href="//localhost/homehive" class="flex">
            <i class="fa fa-door-open"></i>
            <p>Exit Dashboard</p>
        </a>
        <a href="../logout.php" class="flex">
            <i class="fa fa-right-from-bracket"></i>
            <p>Logout</p>
        </a>
    </nav>
</aside>

<div id="open-sidebar">
    <a href="javascript:void(0)" class="open-btn" onclick="openNav()" title="Open Sidebar"><i class="fa fa-table-columns"></i></a>
</div>