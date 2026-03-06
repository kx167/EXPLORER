<?php
session_start(); // Start or resume the session

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Function to generate a random OTP
function generateOTP($length = 6) {
    return rand(pow(10, $length - 1), pow(10, $length) - 1);
}

// Create a PHPMailer object
$mail = new PHPMailer(true);

// Verify OTP (You would typically do this in a separate script or after form submission)
if (isset($_POST['verify_otp'])) {
    // Get the entered OTP from the form
    $enteredOTP = isset($_POST['otp']) ? $_POST['otp'] : '';

    // Get the stored OTP from the session
    $storedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

    // Verify the entered OTP
    if ($enteredOTP != $storedOTP) {
        $verificationResult = 'OTP verification successful!';
    } else {
        $verificationResult = 'OTP verification failed. Please try again.';
    }

    // Clear the OTP from the session after verification
    unset($_SESSION['otp']);
} elseif (isset($_POST['send_otp'])) {
    // Get the recipient's email address
    $recipientEmail = isset($_POST['email']) ? $_POST['email'] : '';

    // Set up SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'explorerxpro@gmail.com'; // Your Gmail address
    $mail->Password = 'jihz pijq uxav yfnb'; // Your Gmail password or App Password
    $mail->SMTPSecure = 'ssl'; // Use 'ssl' instead of 'tls'
    $mail->Port = 465; // Change port to 465 for 'ssl'

    try {
        // Set up email content
        $mail->setFrom('explorerxpro@gmail.com', 'explorer'); // Your name and Gmail address
        $mail->addAddress($recipientEmail); // Recipient's email address
        $mail->Subject = 'Your OTP for verification';

        // Generate a random OTP
        $otp = generateOTP();
        $mail->Body = 'Your OTP is: ' . $otp;

        // Send the email
        $mail->send();

        // Store the OTP in the session
        $_SESSION['otp'] = $otp;

        // Display success message
        $verificationResult = "OTP sent successfully to $recipientEmail <script>window.location = 'verify_otp.php?email=" . urlencode($recipientEmail) . "';</script>";



    } catch (Exception $e) {
        // Display error message if sending fails
        $verificationResult = "Error sending email: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 16px;
            display: block;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
            font-size: 16px;
        }

        .email-form {
            margin-top: 20px;
        }

        .email-form label {
            margin-bottom: 0;
        }

        .email-form input {
            margin-bottom: 0;
        }

        .email-form button {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Display the OTP verification result or email form
    if (isset($verificationResult)) {
        echo '<p>' . $verificationResult . '</p>';
    } else {
        ?>
       
        <div class="email-form">
            <form method="post" action="send_otp.php">
                <label for="email">Enter your email:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit" name="send_otp">Send OTP</button>
            </form>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>
