<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="assets/css/styles.css" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/site.webmanifest">

        <title>Contact Us | HomeHive</title>
    </head>

    <body>
        <header class="main-header multi-column">
            <?php include('header.php'); ?>
        </header>
        <section class="contact-section">
            <div class="column-container multi-column">
            <div class="column-1">
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
    </body>
</html>