<?php
session_start(); // Start or resume the session

// Verify OTP
if (isset($_POST['verify_otp'])) {
    // Get the entered OTP from the form
    $enteredOTP = isset($_POST['otp']) ? $_POST['otp'] : '';

    // Get the stored OTP from the session
    $storedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

    // Get the email from the form or URL parameter
    $email = isset($_POST['email']) ? $_POST['email'] : (isset($_GET['email']) ? $_GET['email'] : '');
    
    // Verify the entered OTP
    if ($enteredOTP == $storedOTP) {
        // OTP verification successful
        // Redirect to updatepass.php with email id
        if (!empty($email)) {
            header("Location: updatepass.php?email=" . urlencode($email));
            exit(); // Make sure to stop execution after redirection
        }
    } else {
        // OTP verification failed
        $verificationResult = 'OTP verification failed. Please try again.';
    }

    // Clear the OTP from the session after verification
    unset($_SESSION['otp']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    </style>
</head>
<body>

<?php
// Display the OTP verification result
if (isset($verificationResult)) {
    echo '<p>' . $verificationResult . '</p>';
} else {
    // Display the OTP input form
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    ?>
    <form method="post" action="verify_otp.php">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"> <!-- Add hidden field to pass email -->
        <button type="submit" name="verify_otp">Verify OTP</button>
    </form>
    <?php
}
?>


</body>
</html>
