<?php

include "../confi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

$query="UPDATE `book` SET `status`='cancel by admin' WHERE `id`='$id' ";
$data = mysqli_query($con,$query);



if ($data){
  echo
 '<script>
 window.location = "bookingdetail.php";
 </script>';

}
else {
  echo 'no';
}

}

?>