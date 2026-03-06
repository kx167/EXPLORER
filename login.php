<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-3Bs8yK8+KWnBUzYK0Stv3wZ2o3eRnkB5lh8At0kHbBfUG9IbA3lBVjA8JnC3Ayyj3ZlxS9ysaXkNjzvCsb6Jxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-3Bs8yK8+KWnBUzYK0Stv3wZ2o3eRnkB5lh8At0kHbBfUG9IbA3lBVjA8JnC3Ayyj3ZlxS9ysaXkNjzvCsb6Jxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <style>
        /* Resetting default margin and padding */
        body, h1, h2, h3, h4, h5, h6, p, ul, li {
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .login-form {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        
        .login-form h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }
        
        .input-container {
            margin-bottom: 20px;
            text-align: left;
        }
        
        .input-container label {
            font-size: 16px;
            color: #333333;
            margin-bottom: 8px;
            display: block;
        }
        
        .input-container input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        
        .input-container input:focus {
            border-color: #4a90e2;
        }
        
        .submit-button {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 12px 0;
            width: 100%;
            font-size: 18px;
            cursor: pointer;
        }
        
        .submit-button:hover {
            background-color: #357ebd;
        }
        
        .bottom-links {
            margin-top: 20px;
        }
        
        .bottom-links a {
            color: #4a90e2;
            text-decoration: none;
            font-size: 14px;
            margin-right: 10px;
        }
        
        .bottom-links a:hover {
            text-decoration: underline;
        }

        .menu {
            background-color: black;
            height: 60px;
            position: fixed;
            width: 100%;
            top: 0; /* Fixed navbar at the top */
            z-index: 1;
        }

        nav {
            font-size: 25px;
            width: 100%;
            text-align: right;
            position: fixed;
            z-index: 1;
            margin-bottom:20px;
        }

        nav a {
            color: white;
            margin-top: 0px;
            font-family: monospace;
            font-weight: 500;
            text-transform: uppercase;
            margin-right: 15px;
            text-decoration: none;
            display: inline-block;
        }

       nav a:hover {
            color: yellowgreen;
            
        }

        .imx {
            height: 40px;
            width: 80px;
            
        }

        .nav {
    text-decoration: none;
    display: inline-block;
    color: #4a90e2; /* Blue color */
    font-size: 16px;
    border-radius: 5px; /* Rounded corners */
    padding: 8px 16px; /* Padding for better appearance */
    transition: background-color 0.3s ease; /* Smooth background color transition on hover */
    border-radius:25px;
    background-color:blue;
    padding:5px;
}

.nav:hover {
    background-color: #eff7ff; /* Light background color on hover */
}

       
    </style>
</head>
<body>


      <form class="login-form" action="login1.php" method="POST">
        <h1>User Login</h1>
        <div class="input-container">
            <label for="username"><i class="fa fa-user"></i>Username</label>
            <input id="username" type="text" name="un" placeholder="Enter your username" required>
        </div>
        <div class="input-container">
            <label for="password"><i class="fa fa-lock"></i>Password</label>
            <input id="password" type="password" name="pass" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="submit-button" name="login">Login</button>
        <div class="bottom-links">
            <a class="nav" href="register.php">Don't have an account? Sign up here</a>
            <a  class ="nav" href="send_otp.php">Forgot password?</a>
        </div>
    </form>
</body>
</html>
