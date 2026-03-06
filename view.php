<?php
require_once('confi.php');

$id = $_GET['id'];
$query = "SELECT * FROM book WHERE id='$id'";


$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            text-align: center;
        }

        .receipt-info {
            margin-bottom: 20px;
        }

        .receipt-info p {
            margin: 5px 0;
        }

        .receipt-info p strong {
            font-weight: bold;
        }

        .total-price {
            text-align: right;
            margin-top: 20px;
        }

        .total-price p {
            margin: 5px 0;
        }

        .download-button {
            text-align: center;
            margin-top: 20px;
        }

        .download-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .download-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <h1>TOUR BOOKING RECEIPT</h1>
        <div class="receipt-info">
            <p><strong>Booking ID:</strong> <?php echo $row['id']; ?></p>
            <p><strong>Date:</strong> <?php echo $row['bookingdate']; ?></p>
        </div>
        <div class="receipt-info">
            <h2>Customer Details:</h2>
            <p><strong>Name:</strong> <?php echo $row['person1']; ?></p>
            <p><strong>Phone No:</strong> +91<?php echo $row['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        </div>
        <div class="receipt-info">
            <h2>Tour Details:</h2>
            <p><strong>Tour Name:</strong> <?php echo $row['tourname']; ?></p>
            <p><strong>Tour Date:</strong> <?php echo $row['tourdate']; ?></p>
            <p><strong>Tour Duration:</strong> <?php echo $row['tourduration']; ?></p>
            <p><strong>Number of Persons:</strong> <?php echo $row['noofpeople']; ?></p>
        </div>
        <div class="total-price">
            <h2>Total Price :</h2>
            
            <p><strong>Total Price:</strong> rs.<?php echo $row['totalPrice']; ?></p>
        </div>
        <div class="download-button">
            <a href="#" download="tour_receipt.pdf">Download Receipt</a>
        </div>
        <p>Thank you for choosing our services. For any inquiries or assistance, please contact us at <a href="mailto:explorerxpro@gmail.com">explorerxpro@gmail.com</a></p>
        <?php endwhile; ?>
    </div>
</body>
</html>
