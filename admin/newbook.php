<?php
require_once('../confi.php');
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
// Calculate the timestamp for 24 hours ago
$twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));

// Query to retrieve data from the last 24 hours
$query = "SELECT * FROM book WHERE bookingdate >= '$twentyFourHoursAgo'";
$result = mysqli_query($con, $query);

// Fetch the rows and store them in an array
$rows = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($con);
}

// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($con);
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
    background-color: #dddddd;
   }
   .btn{
    height:30px;
    width:80px;
    background-color: rgb(23, 113, 38);
   }
   .btn:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }
   .btn1{
    height:30px;
    width:80px;
    background-color: rgb(201, 0, 0);
   }
   .btn1:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }
   .btn2{
    height:30px;
    width:80px;
    background-color: rgb(0, 98, 255);
   }
   .btn2:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }

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
        <center>
        <a><img src="../img/logo.png" alt="" width="100px" height="80px" alt="" style="margin-bottom: 15px;"></a>
        </center>

        <div class="container">
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for tour name...">
    <table id="tourTable"> <!-- Move the id="tourTable" to this table -->
        <tr>
            <th> BOOK ID</th>
            <th>USER NAME</th>
            <th>TOUR NAME</th>
            <th>BOOKING DATE</th>
            <th>USER CONTACT NO</th>
            <th>USER EMAIL</th>
            <th>TOTAL</th>
            <th>CONFIRM</th>
            <th>DELETE</th>
            
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user']; ?></td>
                <td><?php echo $row['tourname']; ?></td>
                <td><?php echo $row['bookingdate']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['noofpeople']; ?></td>
                <td>
                <?php if ($row['status'] != 'pending'): ?>
    <button class="btn" disabled>CONFIRM</button>
<?php else: ?>
    <a href="confirm.php?id=<?php echo $row['id']; ?>&email=<?php echo urlencode($row['email']); ?>" class="btn">CONFIRM</a>
<?php endif; ?>
</td>
<td>
<?php if ($row['status'] != 'pending'): ?>
    <button class="btn1" disabled>DELETE</button>
<?php else: ?>
    <a href="cancel.php?id=<?php echo $row['id']; ?>&email=<?php echo urlencode($row['email']); ?>" class="btn1">DELETE</a>
<?php endif; ?>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </table> <!-- Close the table here -->
</div>

<script>
        function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tourTable");
    tr = table.getElementsByTagName("tr"); // Change to select rows (tr)

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2]; // Adjust index according to tour name column position (0-based)
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