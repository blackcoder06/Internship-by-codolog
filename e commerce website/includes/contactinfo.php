<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Apni Dukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .contact-info {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-info h2 {
            margin-top: 0;
        }
        .contact-info p {
            margin: 5px 0;
        }
        .contact-form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="contact-info">
    <h2>Contact Us</h2>
    <p><strong>Toll-free Number 1:</strong> 011101111</p>
    <p><strong>Toll-free Number 2:</strong> 32659871</p>
    <p><strong>Email:</strong> <a href="mailto:apnidukan@gmail.com">apnidukan@gmail.com</a></p>
    <p><strong>Address:</strong> 1st Floor, Bombay Enterprise</p>
    <p><strong>Phone:</strong> 1234567890</p>
    <p><strong>Fax:</strong> 0987654321</p>
</div>

<div class="contact-form">
    <h2>Send Us a Message</h2>
    <form action="contact_form_handler.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>
        
        <button type="submit">Send Message</button>
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "apnidukan@gmail.com";
    $subject = "New Contact Form Submission from " . $name;
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $body = "Name: " . $name . "\n" .
            "Email: " . $email . "\n" .
            "Message: \n" . $message;

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>
</div>

</body>
</html>
