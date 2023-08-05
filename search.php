<?php require_once "includes/db.inc.php"; ?>
<?php require_once "includes/functions.inc.php"; ?>
<?php $pageTitle = "Search Results | HomeHive"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <?php
    if(isset($_GET['area'])) {
        $returnArray = get_property_id_by_address($_GET['area']);
        $propertyIds = $returnArray['propertyIds'];
        $display = $returnArray['display'];

        if ($propertyIds === false) {
            $html.= 
            "<div class='column-container centered'>
                <h1 class='align-center'>$display</h1>
                <form method='get' action='search.php'>
                    <div class='multi-column' id='search-bar'>
                        <div class='column-1'>
                            <input type='search' placeholder='Try searching again...' name='area'>
                        </div>
                        <div class='column-2'>
                            <button type='submit' class='rotate-btn'>
                                <i class='fa-solid fa-search'></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a href='//localhost/homehive' class='button align-center'>Back to Home</a>
            </div>";
        }
        else {
            echo displayProperty($propertyIds);
        }
    }
    ?>
