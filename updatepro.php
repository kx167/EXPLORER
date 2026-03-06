<?php
    require_once("confi.php");
    session_start();
    $un = $_SESSION['un'];
    if(isset($_POST['submit'])){
    $un = $_SESSION['un'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
$sql="UPDATE `user` SET `email`='$email', `phone`='$phone' WHERE `un`='$un'";
        $insert = mysqli_query($con, $sql);
        if($cpass!=$pass){
          echo '<script>
                  alert("Passwords do not match!");
                  window.location = "updatepro.php";
              </script>';
      }
      else{
          
        $sql="UPDATE `user` SET `email`='$email', `phone`='$phone' WHERE `un`='$un'";
        $insert = mysqli_query($con, $sql);
          if($insert){
            echo '<script>
            alert("update successfull!");
            window.location = "profile.php";
        </script>';
          }
      }
       
}
    
?>
<html>
  <head>
  <link rel="stylesheet" href="../bootstrap.min.css" />
    <style>
      body{
        border-style:ridge;
        border-width:15px;
        background-color:silver;
      }
      .button{
        background-color:black;
        color:white;
        padding:15px 32px;
        text-align:center;
        display:inline-block;
        font-size: 16px;
      }
      .input-box{
       font-size:20px;
       margin: 10px;;
      }
      input{
        height: 30px;
       margin: 10px;
      }
     
      </style>
</head>
<body>
<form action="updatepro.php" method="POST" enctype="multipart/form-data">
    <?php
    $un = $_SESSION['un'];
    $query="SELECT * FROM user where un ='$un' ";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
    {
?>
  <center>

    <h1>UPDATE DETAIL</h1>
   
          <div class="input-box" >
            <span class="details">NAME:</span>
            <label><?php echo $row['name'];?></label>
          </div>
          <br>
          <div class="input-box" >
            <span class="details">USER NAME:</span>
            <label><?php echo $row['un'];?></label>
          </div>
          <DIV style="border:ridge";>
          <div class="input-box" >
            <span class="details">PHONE NUMBER:</span>
            <input type="text" placeholder="" value="<?php echo $row['phone'];?>" name="phone" required>
          </div>
          <br>
          <div class="input-box">
            <span class="details">EMAIL ID:</span>
            <input type="text" placeholder="" value="<?php echo $row['email'];?>" name="email" required >
          </div>
          <br>
          <h2>IF YOU WANT TO CHANGE PASSWORD</h2>
          <div class="input-box">
            <span class="details">ENTER PASSWORD:</span>
            <input type="password" placeholder="" value="<?php echo $row['pass'];?>" name="pass" required >
          </div>
          <br>
          <div class="input-box">
            <span class="details">CONFIRM PASSWORD:</span>
            <input type="password" placeholder="" value="<?php echo $row['pass'];?>" name="cpass" required >
          </div>
          <br>
    </DIV> 
    </div>
   
          
        
        <div  style="hight: 20px;">
          <button type="submit" class="button" value="ADD PACK" name="submit">submit</button>
        </div>
</center>
<?php
    }
?>
      </form>
      <h5>NOTE: USER ONLY CHANGE PHONE NUMBER AND EMAIL</h5>
</body>
  </html>