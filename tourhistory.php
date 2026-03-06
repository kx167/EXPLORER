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
$query="SELECT * FROM book where user='$un' " ;
$result = mysqli_query($con,$query);

?>
<html>
    <head>
<style>
    .container{
        width: 1200px;
        height: 500px;
        overflow: auto;
        border:1px solid;
        margin-top: 5%;
    }
    table{
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: auto;
    }
    td, th{
border: 1px solid;
text-align: left;
padding: 8px;
    }
   tr:nth-child(even) {
    background-color: #dddddd;
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
 
}



.button {
    display: inline-block;
    padding: 8px 12px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.disabled {
    background-color: #cccccc;
    color: #666666;
    cursor: not-allowed;
}


</style>
    </head>
    <body>
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
        <center>
        <div class="container">
            <table>
                <tr >
                <th> BOOK ID</th>
                <th>PLACE</th>
                <th>TOUR DATE</th>
                <th>USER</th>
                <th>PRICE</th>
                <th>BOOKING DATE</th>
                <th>DURATION</th>
                <th>BOOKING CONTACT NO.</th>
                <th>STATUS</th>
                <th>VIEW DETAIL</th>
            </tr>
            
                <tr>
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?> 
                        <th ><?php echo $row['id']; ?></th>
                        <th ><?php echo $row['tourname']; ?></th>
                        <th ><?php echo $row['tourdate']; ?></th>
                        <th ><?php echo $row['user']; ?></th>
                        <th ><?php echo $row['totalPrice']; ?></th>
                        <th ><?php echo $row['bookingdate']; ?></th>
                        <th ><?php echo $row['tourduration']; ?></th>
                        <th ><?php echo $row['phone']; ?></th>
                        <th ><?php echo $row['status']; ?></th>
                        <th>
                        
    <?php
    if ($row['status'] == 'confirm by admin') {
        echo '<a href="view.php?id=' . $row['id'] . '" class="button">View</a>';
    } else {
        echo '<button class="disabled" disabled>N/A</button>'; 
    }
    ?>
</th>


                    </tr>
                        <?php    
                    }
                    ?>
                </tr>
            </table>
        </div>
    </center>
    </body>
</html>