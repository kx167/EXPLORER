<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "../confi.php";

if (isset($_GET['id']) && isset($_GET['email'])) {
    $id = $_GET['id'];
    $email = $_GET['email'];

    $query = "DELETE FROM `book` WHERE `id`='$id'";
    $data = mysqli_query($con, $query);

    if ($data) {
        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'explorerxpro@gmail.com'; // Your Gmail email address
            $mail->Password   = 'jihz pijq uxav yfnb';   // Your Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipient
            $mail->setFrom('explorerxpro@gmail.com', 'explorer');
            $mail->addAddress($email); // Recipient email
            $mail->addReplyTo('explorerxpro@gmail.com', 'explorer');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Booking Cancellation';
            $mail->Body    = "Your booking with ID $id has been canceled.";

            $mail->send();
            echo '<script>alert("Booking canceled. Email sent to user.");</script>';
        } catch (Exception $e) {
            echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
        }

        echo '<script>window.location = "bookingdetail.php";</script>';
    } else {
        echo '<script>alert("Failed to cancel booking.");</script>';
        echo '<script>window.location = "bookingdetail.php";</script>';
    }
} else {
    echo '<script>alert("Invalid request.");</script>';
    echo '<script>window.location = "bookingdetail.php";</script>';
}
?>
