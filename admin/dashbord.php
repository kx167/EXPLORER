<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            a{
    display:inline-block;
    text-decoration:none;
    color:black;
   }
   
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            background-color: rgb(66, 75, 188);
            padding-top: 20px;
           
        }

        #sidebar a, .dropdown-btn {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover, .dropdown-btn:hover {
            background-color: #000000;
        }

        .dropdown-container {
            padding-left: 20px;
            display: none;
        }

        .active {
            display: block;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }
        
        h1{
            color: white;
           font-family: monospace;
           font-size: 30px;
           color: #000000;
           background-color: azure;
        }
        .dash{
           
            overflow: auto;
            border: 1px solid black;
            margin-left: 250px;
        }
        #dash{
            height: 150px;
            width: 250px;
            background-color:rgb(66, 75, 188) ;
            margin: 50px auto;
            margin-left: 80px;
            margin-right: 80px;
            color: black;
            font-size: 35px;
            text-align: center;
            
            
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
  h2{
    font-size:20px;
    color:white;
    font-family:monospace;
   
  }
  
        }
       
        </style>
    </head>
    <body>
        <div id="sidebar">
        <div id="sidebar">
    <?php include('header.php');?>
</div>
        </div>
        <center>
        <a><img src="../img/logo.png" alt="" width="100px" height="80px" alt="" style="margin-bottom: 15px;"></a>
        </center>
        <div class="dash">
          <div class="col-md-12">
            <div class="col-md-4" id="dash">
                <?php

                // Database connection parameters
                $servername = "localhost";
                $username = "root"; // Your MySQL username
                $password = ""; // Your MySQL password
                $database = "travel"; // Your MySQL database name
                $table = "user"; // Your MySQL table name
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // SQL query to count records in the table
                $sql = "SELECT COUNT(*) AS total_records FROM $table";
                
                // Execute query
                $result = $conn->query($sql);
                
                // Check if query executed successfully
                if ($result) {
                    // Fetch the result
                    $row = $result->fetch_assoc();
                    // Output the total number of records
                
                    echo $row['total_records'];
            
                } else {
                    echo "Error: " . $conn->error;
                }
                
                // Close connection
                $conn->close();
                
                ?>
                <h2>TOTAL USER</h2>
                
            </div>

            
                <div class="col-md-4" id="dash">
                    <?php

                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root"; // Your MySQL username
                    $password = ""; // Your MySQL password
                    $database = "travel"; // Your MySQL database name
                    $table = "hollydays"; // Your MySQL table name
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to count records in the table
                    $sql = "SELECT COUNT(*) AS total_records FROM $table where tourtype='domestic'";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                    
                        echo $row['total_records'];
                
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    
                    // Close connection
                    $conn->close();
                    
                    ?>
                    <h2>TOTAL DOMESTIC TOURS</h2>
                </div>

               
                    <div class="col-md-4" id="dash">
                        <?php

                        // Database connection parameters
                        $servername = "localhost";
                        $username = "root"; // Your MySQL username
                        $password = ""; // Your MySQL password
                        $database = "travel"; // Your MySQL database name
                        $table = "hollydays"; // Your MySQL table name
                        
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $database);
                        
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        // SQL query to count records in the table
                        $sql = "SELECT COUNT(*) AS total_records FROM $table where tourtype='international'";
                        
                        // Execute query
                        $result = $conn->query($sql);
                        
                        // Check if query executed successfully
                        if ($result) {
                            // Fetch the result
                            $row = $result->fetch_assoc();
                            // Output the total number of records
                        
                            echo $row['total_records'];
                    
                        } else {
                            echo "Error: " . $conn->error;
                        }
                        
                        // Close connection
                        $conn->close();
                        
                        ?>
                        
                        <h2>TOTAL INTERNATIONAL</h2>
                    </div>
<br>

                    
                        <div class="col-md-4" id="dash">
                            <?php

                            // Database connection parameters
                            $servername = "localhost";
                            $username = "root"; // Your MySQL username
                            $password = ""; // Your MySQL password
                            $database = "travel"; // Your MySQL database name
                            $table = "book"; // Your MySQL table name
                            
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $database);
                            
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            // SQL query to count records in the table
                            $sql = "SELECT COUNT(*) AS total_records FROM $table ";
                            
                            // Execute query
                            $result = $conn->query($sql);
                            
                            // Check if query executed successfully
                            if ($result) {
                                // Fetch the result
                                $row = $result->fetch_assoc();
                                // Output the total number of records
                            
                                echo $row['total_records'];
                        
                            } else {
                                echo "Error: " . $conn->error;
                            }
                            
                            // Close connection
                            $conn->close();
                            
                            ?>
                            <h2>TOTAL BOOKING</h2>
                        </div>
            
                        
                            <div class="col-md-4" id="dash">
                                <?php

                                // Database connection parameters
                                $servername = "localhost";
                                $username = "root"; // Your MySQL username
                                $password = ""; // Your MySQL password
                                $database = "travel"; // Your MySQL database name
                                $table = "book"; // Your MySQL table name
                                
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $database);
                                
                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                // Calculate the timestamp for 24 hours ago
                                $twentyFourHoursAgo = date("Y-m-d H:i:s", strtotime('-24 hours'));
                                
                                // SQL query to count records in the last 24 hours
                                $sql = "SELECT COUNT(*) AS total_records FROM $table WHERE bookingdate >= '$twentyFourHoursAgo'";
                                
                                // Execute query
                                $result = $conn->query($sql);
                                
                                // Check if query executed successfully
                                if ($result) {
                                    // Fetch the result
                                    $row = $result->fetch_assoc();
                                    // Output the total number of records
                                    echo  $row['total_records'];
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                
                                // Close connection
                                $conn->close();
                                
                                ?>
                                <h2>NEW BOOKING</h2>
                            </div>

                            <div class="col-md-4" id="dash">
                                <?php

                                // Database connection parameters
                                $servername = "localhost";
                                $username = "root"; // Your MySQL username
                                $password = ""; // Your MySQL password
                                $database = "travel"; // Your MySQL database name
                                $table = "review"; // Your MySQL table name
                                
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $database);
                                
                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                
                                // SQL query to count records in the table
                                $sql = "SELECT COUNT(*) AS total_records FROM $table ";
                                
                                // Execute query
                                $result = $conn->query($sql);
                                
                                // Check if query executed successfully
                                if ($result) {
                                    // Fetch the result
                                    $row = $result->fetch_assoc();
                                    // Output the total number of records
                                
                                    echo $row['total_records'];
                            
                                } else {
                                    echo "Error: " . $conn->error;
                                }
                                
                                // Close connection
                                $conn->close();
                                
                                ?>
                                <h2>REVIEWS</h2>
                            </div>
                   
                      </div>
                    
               
          </div>

        </div>

        
            
          

        <script>
            // Add JavaScript to toggle the dropdown menu
            document.addEventListener("DOMContentLoaded", function () {
                var dropdownBtns = document.querySelectorAll('.dropdown-btn');
        
                dropdownBtns.forEach(function (dropdownBtn) {
                    dropdownBtn.addEventListener('click', function () {
                        var dropdownContainer = dropdownBtn.nextElementSibling;
                        dropdownContainer.classList.toggle('active');
                    });
        
                    var dropdownLinks = dropdownBtn.nextElementSibling.querySelectorAll('a');
                    dropdownLinks.forEach(function (link) {
                        link.addEventListener('click', function () {
                            var dropdownContainer = link.closest('.dropdown-container');
                            dropdownContainer.classList.remove('active');
                        });
                    });
                });
            });
        </script>
    </body>
</html>