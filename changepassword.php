<?php
require_once('confi.php');
session_start();
$un = $_SESSION['un'];

$query="SELECT * FROM user WHERE un='$un'";
$result = mysqli_query($con, $query);
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
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
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 8px;
      color: #555;
    }

    input {
      padding: 8px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error-message {
      color: #ff0000;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?> 
    <h2>Change Password</h2>
    <form id="changePasswordForm" action="changepass.php?id=<?php echo $row['email'];?>" method="POST" enctype="multipart/form-data">
      <label for="oldPassword">Old Password:</label>
      <input type="password" id="oldPassword" name="oldPassword" required>

      <input type="hidden" id="currentPassword" name="currentPassword" value="<?php echo $row['pass']; ?>">

      <label for="newPassword">New Password:</label>
      <input type="password" id="newPassword" name="newPassword" required>

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>

      <input type="submit" value="Change Password">
    </form>
    <div class="error-message" id="errorMessage"></div>
  </div>
  <?php
    }
  ?>
  <script>
    document.getElementById("changePasswordForm").addEventListener("submit", function(event) {
      var oldPassword = document.getElementById("oldPassword").value;
      var newPassword = document.getElementById("newPassword").value;
      var confirmPassword = document.getElementById("confirmPassword").value;
      var currentPassword = document.getElementById("currentPassword").value;

      if (oldPassword !== currentPassword) {
        document.getElementById("errorMessage").innerText = "Old Password is incorrect!";
        event.preventDefault(); // Prevent the form submission
      } else if (newPassword !== confirmPassword) {
        document.getElementById("errorMessage").innerText = "Passwords do not match!";
        event.preventDefault(); // Prevent the form submission
      }
    });
  </script>
</body>
</html>
