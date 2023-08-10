<?php require_once("includes/db.inc.php"); ?>
<?php require_once("includes/functions.inc.php"); ?>
<?php $pageTitle = "Contact Us | " . $config['SITE_TITLE']; ?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <section class="contact-bg full-screen--centered">
        <div class="boxed flex">
            <div class="def-spacing">
                <h2 class="--color-white">Let's Get in Touch</h2>
                <p class="--color-white">Our team is dedicated to providing exceptional customer service and support for all your rental needs.
                Whether you need help booking a rental or have feedback to share, we're here to help.
                Get in touch with us today and let us assist you in creating an unforgettable rental experience.</p>
            </div>
            <form class="web-form contact-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Text</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn" name="submit">Get in Touch</button>
                </div>
            </form>
        </div>
    </section>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (sendContactEmail($name, $email, $message)) {
            // display: none; -> web-form
            // echo success message instead
            echo '<p class="success-message">Thank you for contacting us. Your message has been sent successfully.</p>';
        } else {
            echo '<p class="error-message">Sorry, there was an issue sending your message. Please try again later.</p>';
        }
    }
    ?>

    <?php include('templates/footer.php'); ?>
</html>