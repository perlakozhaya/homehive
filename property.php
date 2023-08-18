<?php require_once "includes/functions.inc.php"; ?>
<?php require_once "includes/db.inc.php"; ?>
<?php
$slug = $_GET['slug'];
$title = get_title_by_slug($slug);
?>
<?php $pageTitle = $title . " | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <section class="boxed p-50">
        <?php
        $details = get_property_details($slug);
        ?>
        <div class="p-media">
            <img src="" alt="" class="main-image">
            
            <img src="" alt="" class="main-image">
        </div>
    </section>

    <?php include('templates/footer.php'); ?>
</html>