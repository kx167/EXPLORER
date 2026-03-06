<?php

error_reporting(0);

require_once('confi.php');
session_start();
$un = $_SESSION['un'];
$id=$_GET['id'];
$query="SELECT * FROM hollydays where landscap='$id' ";
$result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holidays</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <style>
        body {
            background-color: beige;
            margin: 0;
            padding: 0;
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

nav a {
  text-transform: uppercase;
  font-family: monospace;
  font-size: 30px;
}

        .holiday-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .holiday-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            max-width: 300px;
            overflow: hidden;
            transition: transform 0.3s ease;
            width: calc(33.33% - 40px);
        }

        .holiday-card:hover {
            transform: translateY(-5px);
        }

        .holiday-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .holiday-details {
            padding: 20px;
        }

        .holiday-details h2 {
            margin-top: 0;
            font-family: 'cursive';
            font-size: 24px;
        }

        .holiday-details h4 {
            margin: 5px 0;
            font-family: 'Georgia';
        }

        .holiday-details i {
            margin-right: 5px;
        }

        .price {
            margin: 10px 0;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .details-btn {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .details-btn:hover {
            background-color: #555;
        }

        @media screen and (max-width: 768px) {
            .holiday-card {
                width: calc(50% - 40px);
            }
        }

        @media screen and (max-width: 480px) {
            .holiday-card {
                width: calc(100% - 40px);
            }

            .col {
                flex: 100%;
            }
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

    </style>
</head>
<body>
  <div class="col-md-12">
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
</div>

<div class="holiday-container">
    <?php
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="holiday-card">
            <img src="package/<?php echo $row['timg']; ?>" alt="">
            <div class="holiday-details">
                <h2><?php echo $row['packname']; ?></h2>
                <div class="row">
                    <div class="col">
                        <h4><i class="material-icons">location_on</i><?php echo $row['state']; ?></h4>
                        <h4><i class='material-icons'>schedule</i><?php echo $row['tourduration']; ?></h4>
                        
                    </div>
                    <div class="col">
                        <h4><i class="material-icons">date_range</i><?php echo $row['fromdate']; ?></h4>
                        <h4><i class="material-icons">directions_car</i><?php echo $row['transportation']; ?></h4>
                    </div>
                </div>
                <div class="price">&#8377;<?php echo $row['price']; ?>/-</div>
                <a href="hollydaydetails.php?id=<?php echo $row['packname']; ?>" class="details-btn">Details</a>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>