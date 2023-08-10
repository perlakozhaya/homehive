<?php include_once("../includes/db.inc.php"); ?>
<?php include_once("../includes/functions.inc.php"); ?>

<!DOCTYPE html>
<html lang="eng">
<?php include('../templates/header.php'); ?>

    <section class="boxed large-spacing p-50">

        <h2 class="align-center">Become a Host</h2>
        <form class = "web-form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><h3>Property Information:</h3></legend>
                    <div class = "form-group">
                        <label for="title">Property title: </label>
                        <input type="text" id="title" name="title"><br>
                    </div>
                    <div class = "form-group">
                        <label for="slug">Property slug: </label>
                        <input type="text" id="slug" name="slug"><br>
                    </div>
            
                    <label class="form-legend">Property type: </label>
                        <?php 
                        $categories = getCategories();
                        for($i = 0; $i < count($categories); $i++) {
                            $types[] = $categories[$i]['type'];
                        }

                        $html = "";
                        foreach($types as $type) {
                            $html .= '
                            <div>
                                <input type="radio" id="' . strtolower($type) . '" name="property" value="' . $type . '">
                                <label for="' . strtolower($type) . '">' . $type . '</label>
                            </div>
                            ';
                        }
                        echo $html;
                        ?>

                    <div class = "form-group">
                        <label for="city">City*: </label>
                        <input type="text" id="city" name="city" required><br> 
                    </div>
            
                    <div class = "form-group">
                        <label for="state">State: </label>
                        <input type="text" id="state" name="state"><br> 
                    </div>
            
                    <div class = "form-group">
                        <label for="country">Country*: </label>
                        <input type="text" id="country" name="country" required><br>
                    </div>
            
                    <div class = "form-group">
                        <label for="street">Street*: </label>
                        <input type="text" id="street" name="street" required><br>
                    </div>  
            
                    <div class = "form-group">
                        <label for="zip">Postal Code: </label>
                        <input type="text" id="postal code" name="postal code"><br>
                    </div>
            </fieldset>
            
            <fieldset>
                <legend><h3>Additional Details:</h3></legend>
                    <div class="form-group">
                        <label for="description">Property description: </label>
                        <input type="text" id="description" name="description">
                    </div>
                    <div class="form-group file">
                        <label for="image">Image: </label>
                        <input type="file" id="image" name="image">
                    </div>
            </fieldset>
            <fieldset>
                <legend><h3>Terms and Conditions:</h3></legend>
                    <div>
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I have read and agree to the Terms and Conditions of Home Hive.</label>
                    </div>
                    <div>
                        <input type="checkbox" id="promotional" name="promotional">
                        <label for="promotional">I would like to receive promotional emails and updates from Home Hive.</label>
                    </div>
             </fieldset>
             
             <div>
                 <button class="btn" type="submit">Submit</button>
             </div>
        </form>
    </section>
<?php include('../templates/footer.php'); ?>
</html>

