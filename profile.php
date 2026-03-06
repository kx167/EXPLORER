<?php
session_start();
if (!isset($_SESSION['un'])) {
  header("Location: login.php"); // Redirect to your login page
  exit(); // Stop script execution
}

require_once('confi.php');
error_reporting(0);
session_start();
 

$un = $_SESSION['un'];

$query="SELECT * FROM user where un='$un'" ;
$result = mysqli_query($con,$query);

?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            

            body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fafafa;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      box-sizing: border-box;
      margin-top: 100px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
      text-transform: uppercase;
    }

    .profile-info {
      margin-bottom: 30px;
      display: flex;
      flex-wrap: wrap;
    }

    .sticker {
      font-size: 14px;
      padding: 10px 15px;
      border-radius: 20px;
      margin-right: 15px;
      margin-bottom: 15px;
      display: inline-block;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
      border: 2px solid transparent;
    }

    .sticker:nth-child(odd) {
      background-color: #2196F3;
      color: white;
      border-radius: 20px 5px 20px 20px;
    }

    .sticker:nth-child(even) {
      background-color: #4CAF50;
      color: white;
      border-radius: 5px 20px 20px 20px;
    }

    .sticker:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .sticker.highlight {
      background-color: #2243ff; /* Changed to orange */
    }

    .sticker.highlight:hover {
      background-color: #4349ff; /* Changed to a lighter shade of orange */
    }

    .sticker i {
      margin-right: 8px;
    }

    .btn-container {
      text-align: center;
      margin-top: 30px;
    }

    .btn {
      padding: 12px 24px;
      margin: 0 10px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s;
      font-size: 16px;
      outline: none;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
      text-decoration: none;
      display: inline-block;
      position: relative;
      overflow: hidden;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300%;
      height: 300%;
      background-color: rgba(255, 255, 255, 0.3);
      transition: all 0.3s;
      border-radius: 50%;
      transform: translate(-50%, -50%);
      z-index: 0;
    }

    .btn:hover::before {
      width: 0;
      height: 0;
    }

    .btn span {
      z-index: 1;
      position: relative;
    }

    .btn.logout {
      background-color: #f44336;
    }

    .btn.logout::before {
      background-color: rgba(255, 255, 255, 0.3);
    }

    .btn.logout:hover::before {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .fa-lock,
    .fa-sign-out-alt {
      margin-right: 10px;
    }
    .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: fixed;
    background-color: #333;
    min-width: 160px;
    z-index: 100;
  }

  .dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #555;
  }

  .dropdown:hover .dropdown-content {
    display: block;
}

/* Main styles */
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.menu {
  background-color: #333;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect */
 
  z-index: 1;
}

.logo {
  display: flex;
  align-items: center;
}

.logo img {
  margin-right: 10px;
}

.website-name {
  color: white;
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
}

.nav-links {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
}

.nav-links li {
  margin: 0 10px;
}

.nav-links li a {
  color: white;
  text-decoration: none;
  font-size: 18px;
}

.nav-links li a:hover {
  color: #006aff;
  text-decoration: underline;
}

a {
  text-transform: uppercase;
  font-family: monospace;
  font-size: 30px;
}
            </style>
</head>
<body >

<?php if($_SESSION['un'])
  {?>
    <nav class="menu">
      <div class="logo">
        <img src="img/logo.png" alt="Logo" width="50" height="50">
        <a href="#" class="website-name">Explorer</a>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="#">Tours</a>
          <div class="dropdown-content">
            <a href="states.php">Domestic Tour</a>
            <a href="international.php">International Tour</a>
          </div>
        </li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="tourhistory.php">tourhistory</a></li>
        <li><a href="profile.php">welcome, <?php echo $un;?></a></li>
      </ul>
    </nav>

    <?php
  } else
  { ?>

<nav class="menu">
  <div class="logo">
    <img src="img/logo.png" alt="Logo" width="50" height="50">
    <a href="#" class="website-name">Explorer</a>
  </div>
  <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
    <li class="dropdown">
      <a href="#">Tours</a>
      <div class="dropdown-content">
        <a href="states.php">Domestic Tour</a>
        <a href="international.php">International Tour</a>
      </div>
    </li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="register.php">REGISTER</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</nav>
<?php
}?>
    
   
           
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                    ?> 
                    <div class="container">
  <h1>User Profile</h1>
  <div class="profile-info">
    <div class="sticker"><i class="fas fa-user"></i> <?php echo $row['name']; ?></div>
    <div class="sticker"><i class="fas fa-id-card"></i> <?php echo $row['un']; ?></div>
    <div class="sticker"><i class="fas fa-phone"></i> <?php echo $row['phone']; ?></div>
    <div class="sticker"><i class="fas fa-envelope"></i> <?php echo $row['email']; ?></div>
   
    <div class="sticker"><i class="fas fa-calendar-alt"></i> <?php
      function calculateAge($birthDate){
          $today = new DateTime();
          $diff = $today->diff(new DateTime($birthDate));
          return $diff->y;
      }
  
      $birthDate = $row['date']; // Change $birthday to $birthDate
      $age = calculateAge($birthDate); // Change $birthdate to $birthDate
      echo $age;
      ?></div>
    <div class="sticker"><i class="fas fa-birthday-cake"></i> <?php echo $row['date']; ?></div>
  </div>
  <div class="btn-container">
    <a href="changepassword.php?id=<?php echo $row['email'];?>" class="btn update"><i class="fas fa-lock"></i><span>Update Password</span></a>
    <a href="logout.php" class="btn logout"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a>
  </div>
</div>
                
                    <?php    
                }
                ?>
           
           
            
       
            
</body>
</html>