<?php
// Include database configuration
include("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $tourname = $_POST['tourname'];
    
    // Loop through each day to get hotel details
    for ($day = 1; $day <= 8; $day++) {
        $hotelName = $_POST['h' . $day];
        $hotelImage = $_FILES['h' . $day . 'img']['name'];
        $hotelDescription = $_POST['h' . $day . 'des'];

        // Move uploaded image to destination directory
        $targetDirectory = "../hotel/";
        $targetPath = $targetDirectory . basename($hotelImage);
        move_uploaded_file($_FILES['h' . $day . 'img']['tmp_name'], $targetPath);

        // Insert data into the database
        $insertQuery = "INSERT INTO hotel (tourname, h" . $day . ", h" . $day . "img, h" . $day . "des) 
                        VALUES ('$tourname', '$hotelName', '$hotelImage', '$hotelDescription')";
        $insert = mysqli_query($con, $insertQuery);

        if (!$insert) {
            echo '<script>alert("Error inserting data for day ' . $day . ': ' . mysqli_error($con) . '");</script>';
        }
    }

    // Check if all data inserted successfully
    if ($insert) {
        echo '<script>alert("All hotel details inserted successfully!");</script>';
    }
}
?>
