<?php

error_reporting(0);

require_once('confi.php');
session_start();
$un = $_SESSION['un'];
$query="SELECT * FROM global ";
$result = mysqli_query($con,$query);

?>
<html>
    <head>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="bootstrap.min.css">
      
</head>
    <style>
       
            
            
      .x img{
            height: 300px;
            width: 400px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: transform 0.2s ease-in-out;
            }
        .y{
            margin-top: 30px;
            margin-bottom: 30px;
            margin-right: 50px;
            margin-left: 50px;
            border-style:inset;
            height: 200px;
            width: 400px;
            position:;
            
            border-width: 0.5px;
            position: relative;
              overflow: hidden;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .content{
              color:black;
              background:white ;
              position: absolute;
              top: 0px;;
              left:-100%;
              height: 100%;
                width: 100%;
               
                padding: 20px;
                box-sizing: border-box;
                transition: all 0.5s;
                opacity: 0.5;
        }
        .y:hover .content{
              left:0;
              margin-left: 0px;
              margin-bottom: 25px;
              
                height: 350px;
            width: 450px;
              
            }
            img:hover{
              transform: scale(1.2);
            }
     .x{
margin-right:100px;
margin-left:100px;
     }
     h3{
        color:black;
        font-style: italic;
        font-family: cursive;
        font-weight: bold;
     }
        h1{
            color: darkolivegreen;
            font-style: initial;
            font-family: monospace;
            font-weight: bolder;
            font-display: swap;
            font-stretch:wider;
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

        <center><h1>INTERNATIONAL TOURS</h1></center>
        <div class="x">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-sm-4 animate-on-scroll" data-aos="zoom-in">
                <div class="y animate__animated animate__bounce">
                    <a href="hollyday.php?id=<?php echo $row['name'];?>">
                        <img style="height: 100%;" src="global/<?php echo $row['img'];?>" class="img-responsive" alt="">
                        <center><h4><?php echo $row['name'];?></h4></center>
                        <div class="content">
                            <center><h3 style="margin-top: 70px;"><?php echo $row['name'];?></h3></center>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
            
    <script>
    // Function to check if an element is in the viewport with an offset
    function isInViewport(element, offset) {
        var rect = element.getBoundingClientRect();
        var windowHeight = window.innerHeight || document.documentElement.clientHeight;
        return (
            rect.top >= -offset &&
            rect.left >= -offset &&
            rect.bottom <= (windowHeight + offset) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth) + offset
        );
    }

    // Function to handle scroll animation
    function handleScrollAnimation() {
        var animatedElements = document.querySelectorAll('.animate-on-scroll');
        var offset = 100; // Adjust this value to set the desired offset
        animatedElements.forEach(function(element) {
            if (isInViewport(element, offset) && !element.classList.contains('animated')) {
                element.classList.add('animate__animated', 'animate__bounce', 'animated');
                element.style.visibility = 'visible';
            }
        });
    }

    // Attach scroll event listener
    window.addEventListener('scroll', function() {
        handleScrollAnimation();
    });

    // Initial check for elements in viewport on page load
    handleScrollAnimation();
</script>


    </body>
</html>