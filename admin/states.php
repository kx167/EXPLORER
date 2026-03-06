<?php
require_once('../confi.php');
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
$query="SELECT * FROM states " ;
$result = mysqli_query($con,$query);

?>
<html>
    <head>
<style>
     .container{
        width: auto;
        height: 500px;
        overflow: auto;
        border:1px solid;
        margin-left:300px;
        
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
    background-color: #bbbdc4;
   }
   .btn{
    height:25px;
    width:80px;
    background-color: rgb(133, 75, 75);
    border-radius:8px;
    text-align:center;
   }
  
   a{
    display:inline-block;
    text-decoration:none;
    color:black;
    
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
        #searchInput {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

#searchInput:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

</style>
    </head>
    <body>
       
    <div id="sidebar">
    <div id="sidebar">
    <?php include('header.php');?>
</div>
</div>
<center><a><img src="../img/logo.png" alt="" width="100px" height="80px" alt="" style="margin-bottom: 15px;"></a></center>
<div class="container">
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for state name...">
    <center>
    <table id="tourTable">
        <tr>
            <th> ID</th>
            <th>STATE NAME</th>
            
            
            
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                
                
            </tr>
            <?php
        }
        ?>
    </table>
    </center>
</div>
    
   

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tourTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Change index according to tour name column position
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

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