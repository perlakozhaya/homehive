<?php $pageTitle = "Contact Us | HomeHive"; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <section class="contact-section">
        <div class="multi-column">
            <div class="column-1 flow">
                <h2 class="white">Let's Get in Touch</h2>
                <p class="white">Our team is dedicated to providing exceptional customer service and support for all your rental needs.<br/>
                    Whether you need help booking a rental or have feedback to share, we're here to help.<br/>
                    Get in touch with us today and let us assist you in creating an unforgettable rental experience. 
                </p>
            </div>
            <div class="column-2">
                <form class="form-group" action="" method="POST">
                <label for="name" hidden>Name:</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
                
                <label for="email" hidden>Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <label for="message" hidden>Message:</label>
                <textarea id="message" name="message" placeholder="Your Text" required></textarea>
                
                <button type="submit" class="button white">Get in Touch</button>
                </form>
            </div>
        </div>
    </section>

    <?php include('templates/footer.php'); ?>
</html>