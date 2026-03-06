<?php

include "../confi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

$query="DELETE FROM hollydays WHERE id='$id' ";
$data = mysqli_query($con,$query);

if ($data) {
    echo '<script>alert("delete successful!");
    window.location = "dashbord.php";
    </script>';
    
} else {
    echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
}
}
?>