<?php

include("confi.php");
if(isset($_POST['login'])){

session_start();

$un = $_REQUEST['un'];
$pass = $_REQUEST['pass'];


$_SESSION['un']=$un;
$_SESSION['pass']=$pass;

$query="SELECT * FROM user WHERE un='$un' AND pass='$pass' ";
$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);

echo $total;
if ($total==1){
  echo '<script>
  alert("LOG IN SUCCESS!");
  window.location = "./";
  </script>';

}
else {
  echo
 ' <script>
  alert("INVALID USER");
  window.location = "login.php";
  </script>';
}
}
?>