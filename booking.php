<?php
session_start();
if (!isset($_SESSION['un'])) {
    header("Location: login.php"); // Redirect to your login page
    exit(); // Stop script execution
}

require_once('confi.php');

$un = $_SESSION['un'];
$id = $_GET['id'];
$query = "SELECT * FROM hollydays WHERE packname='$id'";


$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

.input-box {
    margin-bottom: 20px;
}

.input-box label {
    display: block;
    margin-bottom: 5px;
}

.input-with-icons {
    display: flex;
    align-items: center;
}

.input-with-icons .icon {
    cursor: pointer;
    padding: 5px 10px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin: 0 5px;
}

.input-with-icons .icon:hover {
    background-color: #e0e0e0;
}

.input-with-icons input[type="number"] {
    flex: 1;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    text-align: center;
}


        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 50px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        img {
            max-width: 80%;
            height: 50%;
            border-radius: 10px;
        }

        .input-box {
            margin-top: 20px;
        }

        .input-box input[type="text"],
        .input-box input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 16px;
            outline: none;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        h1 {
            font-style: italic;
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .details {
            font-weight: bold;
            color: #007bff;
            font-size: 30px;
            font-style: italic;
            font-family: 'Times New Roman';
        }

        label {
            font-size: 25px;
            font-style: italic;
            font-family: 'Times New Roman';
        }

        
    </style>
</head>

<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="book.php" method="POST" enctype="multipart/form-data" id="bookingForm">
                <div class="row">
                    <div class="col-md-6">
                        <img src="package/<?php echo $row['timg']; ?>" alt="Package Image">
                        <input type="hidden" name="bimg" value="<?php echo $row['timg']; ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="input-box">
                            <span class="details">Tour:</span>
                            <label><?php echo $row['packname']; ?></label>
                            <input type="hidden" name="tour" value="<?php echo $row['packname']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tour Date:</span>
                            <label><?php echo $row['fromdate']; ?></label>
                            <input type="hidden" name="tdate" value="<?php echo $row['fromdate']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Price per person:</span>
                            <label><?php echo $row['price']; ?></label>
                            <input type="hidden" name="pricePerPerson" value="<?php echo $row['price']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Duration:</span>
                            <label><?php echo $row['tourduration']; ?></label>
                            <input type="hidden" name="duration" value="<?php echo $row['tourduration']; ?>">
                        </div>
                        <div class="input-box">
    <label for="noOfPeople">Number of People:</label>
    <div class="input-with-icons" style="width:200px";>
        <span class="icon" onclick="decrement()">-</span>
        <input type="text" id="noOfPeople" name="noOfPeople" min="1" value="1" onchange="updateTotalPrice()">
        <span class="icon" onclick="increment()">+</span>
    </div>
</div>

                        <div class="input-box">
                            <span class="details">Total Price:</span>
                            <label id="totalPrice"><?php echo $row['price']; ?></label>
                        </div>

                        <div class="input-box">
       
        <input type="hidden" name="totalPrice" id="hiddenTotalPrice" value="<?php echo $row['price']; ?>">
    </div>
                    </div>
                </div>

                <center>
                    <div class="input-box">
                        <button type="submit" class="btn">CONFIRM BOOKING</button>
                    </div>
                </center>
            </form>
        <?php endwhile; ?>

    </div>

    <script>

function increment() {
    var input = document.getElementById('noOfPeople');
    input.value = parseInt(input.value) + 1;
    updateTotalPrice();
}

function decrement() {
    var input = document.getElementById('noOfPeople');
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
        updateTotalPrice();
    }
}


    function updateTotalPrice() {
        var pricePerPerson = parseFloat(document.querySelector('[name="pricePerPerson"]').value);
        var noOfPeople = parseInt(document.getElementById('noOfPeople').value);
        var totalPrice = pricePerPerson * noOfPeople;
        document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
        document.getElementById('hiddenTotalPrice').value = totalPrice.toFixed(2); // Update hidden input field for total price
        document.getElementById('hiddenNoOfPeople').value = noOfPeople; // Update hidden input field for number of people
    }
</script>


</body>

</html>
