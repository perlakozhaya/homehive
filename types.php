<?php require_once "includes/db.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>
<?php $pageTitle = "Property Types | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include ('templates/header.php'); ?>
    <section class="boxed">
        <?php
        $html = "";
        $category = getCategories();
        if($category === false) {
            $html .= "Failed to retrieve information from database.";
        }
        for($i = 0; $i < count($category); $i++) {
            $html .= 
            "<section class='boxed'>
                <div class='cat-wrapper'>
                    <div class='cat-item'>
                        <a href='//localhost/homehive/category/" . strtolower($category[$i]['type']) ."'>
                            <img src='./assets/img/" . $category[$i]['file_name'] . "' alt='" . $category[$i]['alt'] . "'>
                            <h3>" . $category[$i]['type'] ."</h3>
                        </a>
                    </div>
                </div>
            </section>
            ";
        }
        echo $html;
        ?>
    </section>
</html>