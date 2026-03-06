<?php
include("confi.php");
session_start();
$un = $_SESSION['un'];

$tourname = $_POST['tour'];
$tourdate = $_POST['tdate'];
$totalPrice = $_POST['totalPrice'];
$tourduration = $_POST['duration'];

$bimg = $_POST['bimg'];

// Selecting name, email, and phone from the user table
$user_query = mysqli_query($con, "SELECT name, email, phone FROM user WHERE un = '$un'");
$user_row = mysqli_fetch_assoc($user_query);
$user_name = $user_row['name'];
$user_email = $user_row['email'];
$user_phone = $user_row['phone'];
$noOfPeople = $_POST['noOfPeople'];
$insert = mysqli_query($con, "INSERT INTO book (user, phone, email, tourname, tourdate, tourduration, totalPrice, person1, bimg, noofpeople) 
                              VALUES ('$un', '$user_phone', '$user_email', '$tourname', '$tourdate', '$tourduration', '$totalPrice', '$user_name', '$bimg', '$noOfPeople')");


if ($insert) {
    echo '<script>
            alert("booking request successful!");
            window.location = "tourhistory.php";
        </script>';
} else {
    echo '<script>
            alert("Issues found!");
            window.location = "registration.php";
        </script>';
}
?>
?>
