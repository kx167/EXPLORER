<?php

error_reporting(0);

require_once('confi.php');

session_start();
$un = $_SESSION['un'];
$id=$_GET['id'];
$query="SELECT * FROM hollydays WHERE packname='$id' or country='$id' ";
$result = mysqli_query($con,$query);

?>
<html>
    <head>
        <style>
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
 position: fixed;
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
  margin-right: 900px;
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


.first img{
  width: 100%;
  height: 70%;
  
}
.first #f{
  font-family: cursive;
  color:white;
              background:rgba(14, 36, 144, 0.8);
              position: absolute;
              top: 0px;
              box-sizing: border-box;
              width: 100%;
              height: 70%;
              z-index: 0;
              text-align: center;
              h1{
                margin-top: 200px;
              }
                
}
.why-choose-us {
  text-align: center;
  margin-top: 50px;
  margin-bottom: 50px;
  font-family: cursive;
  font-size: larger;
  color: blue;
}

.icon-container {
  display: flex;
  justify-content: center;
}

.icon {
  margin: 0 20px;
  margin-left: 100px;
  margin-right: 100px;
}

.icon img {
  width: 100px;
  height: 100px;
}

.icon p {
  margin-top: 10px;
  font-size: 18px;
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
<!------about content------->
<div class="container">
  <section>
<div class="first">
  <img src="img/beach.jpg">
  <div id="f">
  <h1>ABOUT US</h1>
  <p>At Explorer, we're dedicated to crafting transformative travel experiences that ignite the spirit of adventure. With personalized itineraries tailored to your preferences and led by experienced guides, we ensure each journey is authentic and unforgettable. Our commitment to excellence and passion for exploration sets us apart, guaranteeing every moment with Explorer is filled with discovery, connection, and wonder. Choose Explorer for your next adventure and embark on a journey that will inspire and enrich your life, one extraordinary experience at a time. Welcome to a world of endless possibilities, where every destination is a new chapter waiting to be written.</p>
</div>
</div>
</section>

<section class="why-choose-us">
  <h2>Why Choose Us?</h2>
  <div class="icon-container">
    <div class="icon">
      <img src="details/experience.png" alt="Better Travel Experience Icon">
      <p>Better Travel Experience</p>
    </div>
    <div class="icon">
      <img src="details/tours.png" alt="Better Tours Icon">
      <p>Better Tours</p>
    </div>
    <div class="icon">
      <img src="details/stay.png" alt="Best Hotel Stay Icon">
      <p>Best Hotel Stay</p>
    </div>
    <div class="icon">
      <img src="details/travel-itinerary.png" alt="Best Location Icon">
      <p>Best Location</p>
    </div>
  </div>
</section>



</div>
    </body>
    </html>