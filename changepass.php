<?php

include "confi.php";

if (isset($_GET['id']) && isset($_POST['newPassword'])) {
    $pass = $_POST['newPassword'];
    $id = $_GET['id'];
   
    // Use prepared statements to prevent SQL injection
    $query = "UPDATE `user` SET `pass` = ? WHERE `email` = ?";
    $stmt = mysqli_prepare($con, $query);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $pass, $id);
    
    // Execute statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo '<script>
        alert('password update successfull');
        windows.location = "profile.php";
        </script>';
    } else {
        echo 'no';
    }
} else {
    echo 'Missing parameters';
}
?>
