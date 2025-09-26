<?php
// Process the form if it's submitted
if (isset($_POST['submit'])) {
    // Sanitize and validate the email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Set email parameters
        $to = 'recipient@gmail.com';  // Change this to the email you want to send alerts to
        $subject = 'Email Alert Submission';
        $message = "An alert has been submitted with the following email: $email";
        $headers = "From: no-reply@yourwebsite.com\r\n";  // Change this to your valid sender email
        $headers .= "Reply-To: $email\r\n";  // Set the reply-to address to the user’s email

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Alert has been sent successfully.";
        } else {
            echo "Failed to send email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/forgetpassword.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Alert Submission</title>
</head>
<body>
    <!-- Form for submitting email alerts -->
    <form action="login.php" method="POST">
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" name="submit" value="Send Alert">
    </form>
</body>
</html>
