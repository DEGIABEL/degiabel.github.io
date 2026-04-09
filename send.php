<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars(trim($_POST["Name"]));
    $email = htmlspecialchars(trim($_POST["Email"]));
    $subject = htmlspecialchars(trim($_POST["Subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email destination
    $to = "info@degiabel.com";

    // Email content
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n\n" .
                  "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
} else {
    echo "Invalid request.";
}
?>
