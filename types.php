<?php require_once "includes/db.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>
<?php $pageTitle = "Property Types | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include ('templates/header.php'); ?>

    <section class="boxed p-100 align-center">
        <?php
        $html = "";
        $categories = getCategories();
        $categoriesPerRow = 4;
        $totalCategories = count($categories);
        
        // Calculate the number of items needed to complete the last row
        $remainingItems = $categoriesPerRow - ($totalCategories % $categoriesPerRow);
        
        // Add empty placeholders to the categories array
        for ($i = 0; $i < $remainingItems; $i++) {
            $categories[] = ['type' => '', 'file_name' => '', 'alt' => ''];
        }

        foreach (array_chunk($categories, $categoriesPerRow) as $rowCategories) {
        $html .= "<div class='all-columns archive-columns flex'>";
            foreach ($rowCategories as $category) {
                $type = $category['type'];
                $file_name = $category['file_name'];
                $alt = $category['alt'];
                
                $category_url = "//localhost/homehive/category/" . strtolower($type);
                $img_src = "./assets/img/" . $file_name;
                
                $html .= 
                "<div class='archive-item'>
                    <a href='$category_url'>
                        <img src='$img_src' alt='$alt'>
                        <h3>$type</h3>
                    </a>
                </div>";
            }
            $html .= "</div>";
        }
        echo $html;
    ?>
    </section>

    <?php include ('templates/footer.php'); ?>
</html>