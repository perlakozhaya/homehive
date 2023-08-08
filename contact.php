<?php require_once("includes/db.inc.php"); ?>
<?php $pageTitle = "Contact Us | " . $config['SITE_TITLE']; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <section class="contact-bg full-screen--centered">
        <div class="boxed flex p-50">
            <div class="def-spacing">
                <h2 class="--color-white">Let's Get in Touch</h2>
                <p class="--color-white">Our team is dedicated to providing exceptional customer service and support for all your rental needs.
                Whether you need help booking a rental or have feedback to share, we're here to help.
                Get in touch with us today and let us assist you in creating an unforgettable rental experience.</p>
            </div>
            <form class="web-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group --color-white">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group --color-white">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group --color-white">
                    <label for="message">Your Text</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn">Get in Touch</button>
                </div>
            </form>
        </div>
    </section>

    <?php include('templates/footer.php'); ?>
</html>