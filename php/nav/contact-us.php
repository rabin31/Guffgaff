<?php
include("php/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

 
    <header class="bg-blue-600 text-white py-8">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">Contact Us</h1>
            <p class="mt-2 text-lg">We'd love to hear from you! Reach out to us with any questions or feedback.</p>
        </div>
    </header>

 
    <section class="py-12">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold mb-4">Send Us a Message</h2>
                    <form action="contact-us.php" method="POST">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 p-2 block w-full border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required
                                class="mt-1 p-2 block w-full border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea name="message" id="message" rows="5" required
                                class="mt-1 p-2 block w-full border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <input type="button" id="button" value='Send Message' class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    </form>
                </div>

                <div class="rounded-lg overflow-hidden shadow-md">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.476417888234!2d144.96305791531948!3d-37.81410797975179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577c3b5b7c8ac5a!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1632306578887!5m2!1sen!2sau" 
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

  
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; <?= date('Y') ?> GuffGaff. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
<?php

 $name = $_POST['name'];
 $email = $_POST['email'];
 $message = $_POST['messgae'];
 
 if(isset($_POST['button'])){
    $sql = INSERT INTO contact_us(name, email, password) 
           VALUES("$name", "$email", "$message");

 }
?>