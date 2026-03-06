<?php
error_reporting(0);
require_once('confi.php');
session_start();
$un = $_SESSION['un'];


?>

<html>
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>

   
    body{
    
    
      h1 {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
    text-transform: uppercase;
    border-bottom: 2px solid #555; /* Add this line */
    border-left: 4px solid #555; /* Add this line */
    margin-left: 150px;
    margin-right: 150px;
    border-radius: 7px;
    text-shadow:1px 1px 1px black;
   
}


    
    }
    /* Add custom styles for the carousel images */
    .container{
        width: auto;
        height: 400px;
        margin-bottom: 50px;
        
    }
    .carousel-inner img {
      width: 100%;
      height: 500px; /* Set your desired fixed height */
      object-fit: cover; /* Ensure the image covers the entire container */
      border-radius:25px;
      margin-top:20px;
     
    }
    #desert{
              margin-top: 20px;
              
              position: relative;
              overflow: hidden;
              img{
                height: 250px;
                width: 73%;
                border-radius:15px 50px ;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
               }
              

            }
            #beach{
             margin-top: 20px;
              
              overflow: hidden;
              img{
                height: 250px;
                width: 80%;
                border-radius:15px 50px ;
                
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);

              }
            }
            #snow{
              margin-top: 20px;
              
              overflow: hidden;
              img{
                height: 250px;
                width: 73%;
                border-radius:15px 50px ;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
                
              }
            
            }
            .content{
              color:white;
              background:rgba(144, 88, 14, 0.8);
              position: absolute;
              top: 0px;;
              left:-115%;
              height: 100%;
                width: 71%;
                border-radius:15px 50px ;
                padding: 20px;
                box-sizing: border-box;
                transition: all 0.5s;
                

                
            }
            #desert:hover .content{
              left:0;
              margin-left: 13px;
              margin-bottom: 25px;
            }

            .content1{
              color:white;
              background:rgba(5, 32, 141, 0.8);
              position: absolute;
              top: 0px;;
              left:-115%;
              height: 100%;
                width: 77%;
                border-radius:15px 50px ;
               
                box-sizing: border-box;
                transition: all 0.5s;
                
                
            }
            #beach:hover .content1{
              left:0;
              margin-left: 15px;
              margin-bottom: 25px;
            }

            .content2{
              color:rgb(8, 8, 8);
              background:rgba(147, 171, 184, 0.8);
              position: absolute;
              top: 0px;;
              left:-100%;
              height: 100%;
                width: 71%;
                border-radius:15px 50px ;
                padding: 20px;
                box-sizing: border-box;
                transition: all 0.5s;

                
            }
            #snow:hover .content2{
              left:0;
              margin-left: 13px;
              margin-bottom: 25px;
            }
            h3{
              font-family: cursive;
            }
            .ls{
                margin-top: 200px;
               
            }
            

.heading h1{

margin-right:17%;
margin-left: 17%;
font-family:cursive;
font-size: 50px;
font-style: italic;

}

h3{
              font-family: cursive;
            }
            h2{
                font-family:cursive;
            }
            h4{
                font-family:times new roman;
            }
            h1{
                font-family:cursive;
                font-style:italic;
            }

.box-con {
    margin-top: 20px;
    height:200px;
    width:100%;
    overflow:auto;
    background-color:rgb(189, 222, 250);
}

.y {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
}

form {
    margin-top: 20px;
}

  /* Additional styles */
  /* Additional styles */
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
  overflow-x: hidden;
}

.menu {
  background-color: #333;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect */
 
  
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



.row{
  
  height: auto;
  width: auto;
  margin: 25px auto ;
  margin-bottom: 25px;
  img{
    height: 200px;
    width: 600px;
    
  }
  h1{
    color: aliceblue;
  }
}
#rec{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(222, 222, 222, 0.626);
  button {
    width: 200px;
    margin-left: 250px;
    background-color:#555;
    
      color: #16151b;
    
    
  }
  button:hover{
    background-color: aliceblue;
  }
}
header {
    background-color: #333333; /* Dark Cyan */
    color: #fff;
    padding: 20px 0;
    text-align: center;
    height:125px;
}

header h1 {
    margin: 0;
    font-size: 36px;
    color: #f9f9f9;
    margin-bottom: 10px;
}

header nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

header nav ul li {
    display: inline;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
    margin: 0 15px;
    font-size: 18px;
}

header nav ul li a:hover {
    color: #ffcc00; /* Yellow */
}

#aboutcont{
  
  margin-top: 20px;
  h2{
    text-align: center;
    color:coral;
    font-family:  monospace;
    font-size: 36px;
  }
}
.cmi{
  position: absolute;
  z-index: 1;
  margin-top: 270px;
  justify-content: center;
  text-align: center;
  color: #f3f3f3;;
}
.xyz{
  height:40px;
  width:300px;
}




  </style>
</head>
<body>

  <div id="content">
  <?php if($_SESSION['un'])
  {?>
    <nav class="menu" >
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

<nav class="menu" >
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container" data-aos="slide-right">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <center><h1 class="cmi"></h1></center>
        <img src="states/leh.jpg" alt="Los Angeles" style="height: 600px;">
        
      </div>

      <div class="item">
        <img src="states/bengal.jpg" alt="Chicago" style="height: 600px;">
      </div>
    
      <div class="item">
        <img src="states/j&k.jpg" alt="New york" style="height: 600px;">
      </div>

      <div class="item">
        <img src="states/rajasthan.jpg" alt="New york" style="height: 600px;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="col-sm-12">
<div class="ls" data-aos="flip-down"  >
 
    <div  class="heading">
      <br>
        <center><h1>explore by landscape</h1></center>
        <br>
        </div>
<div class="col-sm-7" id="desert" data-aos="zoom-out-right" data-aos-duration="3000" >
    <a href="destini.php?id=<?php echo 'desert';?>">
      <img src="img/desert.jpg">
      <div class="content">
        <center>
        <h3 style="margin-top: 140px";>desert</h3>
      </center>
      </div>
    </a>
      
      </div>
      <div class="col-sm-4" id="aboutcont" data-aos="zoom-out-left" data-aos-duration="3000">
        <h2>desert</h2>
        <h3>
          Deserts cover more than one-fifth of the Earth's land area, and they are found on every continent. A place that receives less than 10 inches (25 centimeters) of rain per year is considered a desert. Deserts are part of a wider class of regions called drylands.
        </h3>
      </div>
      <br>
      <br>
     <div class="col-sm-6" id="aboutcont" data-aos="zoom-out-right" data-aos-duration="3000" >
      <h2>beach</h2>
      <h3>A beach is a landform alongside a body of water which consists of loose particles. The particles composing a beach are typically made from rock, such as sand, gravel, shingle, pebbles, etc., or biological sources, such as mollusc shells or coralline algae. Sediments settle in different densities and structures, depending on the local wave action and weather, creating different textures, colors and gradients or layers of material.</h3>
     </div>
        
        <div class="col-sm-6" id="beach" data-aos="zoom-out-left" data-aos-duration="3000" >
      
    <a href="destini.php?id=<?php echo 'beach';?>">
      <img src="img/beach.jpg">
      <div class="content1">
        <center>
        <h3 style="margin-top: 140px";>beach</h3>
      </center>
      </div>
    </a>
      </div>
      
        
        <div class="col-sm-7" id="snow" data-aos="zoom-out-right" data-aos-duration="3000" >
    <a href="destini.php?id=<?php echo 'mountains';?>">
       <img src="img/snow.jpg">
       <div class="content2">
         <center>
        <h3 style="margin-top: 140px";>MOUNTAINS</h3>
         </center>
        </div>
    </a>  
    </div>
    <div class="col-sm-4" id="aboutcont" data-aos="zoom-out-left" data-aos-duration="3000" >
      <h2>mountains</h2>
        <h3>They usually have steep, sloping sides and sharp or rounded ridges, and a high point, called a peak or summit. Most geologists classify a mountain as a landform that rises at least 1,000 feet (300 meters) or more above its surrounding area.</h3>
    </div>

  </div>
</div>


  <div class="row">
    <div class="col-sm-12" style="background-color: #333333;" data-aos="zoom-in-up">
      <center><h1 style="color: white;">RECENTLY ADDED</h1></center>
      <?php
        $query = "SELECT * FROM hollydays ORDER BY adddate DESC LIMIT 3";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($result)) {
      ?> 
      <div class="col-sm-4" style="background-color: aliceblue; margin-bottom: 20px;" id="rec" data-aos="flip-left" data-aos-duration="3000">
        <img src="package/<?php echo $row['timg'];?>" class="img-responsive" alt="">
        <h2><?php echo $row['packname'];?></h2>
        <h2>&#8377;<?php echo $row['price'];?>/-</h2>
        <a href="hollydaydetails.php?id=<?php echo $row['packname'];?>"><button class="btn btn-primary">VIEW TOUR</button></a>
      </div>
      <?php } ?>
    </div>
  </div>




<!-- Review Section -->

<center><hr><h1>Reviews</h1></center>

  <div class="box-con" >
    <?php
    $query = "SELECT * FROM review ";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-md-4" >
      <div class="y">
        <h2>User: <?php echo $row['un']; ?></h2>
        <h4>Date: <?php echo $row['date']; ?></h4>
        <h3><?php echo $row['message']; ?></h3>
      </div>
    </div>
    <?php
    }
    ?>
  </div>



<center>
<!-- Form Section -->

  <?php if(isset($_SESSION['un'])) { ?>
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="section">
        <form action="review.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Add your reviews" required></textarea>
          </div>
          <div class="xyz"><a href="feedbacks.php">VIEW YOUR REVIEWS</a></div>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>


<!--- header --->
<header>
  <div class="col-sm-12">
  <h2>Explorer</h2>
            <nav>
                <ul>
                    <li><a href="#"><i class="fas fa-globe"></i> Destinations</a></li>
                    <li><a href="#"><i class="fas fa-route"></i> Travel Services</a></li>
                    <li><a href="#"><i class="fas fa-book-open"></i> Travel Guides</a></li>
                    <li><a href="#"><i class="fas fa-smile"></i> Explore with Fun</a></li>
                    <li><a href="#"><i class="fas fa-headset"></i> Customer Support</a></li>
                </ul>
            </nav>
        </div>
  
    </header>
  </div>
</center>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<!--our aos-->
<script>
  AOS.init(
    {
      offset:350,
      duration:1000,
    }
  );
</script>

</body>
</html>