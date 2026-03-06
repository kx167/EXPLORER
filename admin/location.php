<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Form</title>
    <style>
        /* Basic CSS styles for the form */
.form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
}

.input-field {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.submit-btn {
    background-color: #514caf;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.submit-btn:hover {
    background-color: #456fa0;
}

a {
            display: inline-block;
            text-decoration: none;
            color: black;
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
        .container{
            overflow:auto;
            height:700px;
        }
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
    background-color: rgb(231, 1, 1);
   }
   .btn:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }
   .btn1{
    height:30px;
    width:80px;
    background-color: rgb(0, 50, 216);
   }
   .btn1:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }
   .btn2{
    height:30px;
    width:100px;
    background-color: rgba(64, 0, 255, 0.505);
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
    <center>
    <h2>Add state</h2>
</center>
    <form action="addstate.php" method="post" enctype="multipart/form-data" class="form-container">
        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" class="input-field"><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" class="input-field"><br><br>
        
        <input type="submit" value="Submit" class="submit-btn">
    </form>

    <center>
    <h2>Add country</h2>
</center>
    <form action="addcountry.php" method="post" enctype="multipart/form-data" class="form-container">
        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" class="input-field"><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" class="input-field"><br><br>
        
        <input type="submit" value="Submit" class="submit-btn">
    </form>
 
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
