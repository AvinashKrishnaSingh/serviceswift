<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 320px;
            max-width: 90%;
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        #user-image {
            display: block;
            margin: auto;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ffffff;
            border: 3px solid #007bff;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f3f4f6;
            border: 1px solid #007bff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="button"] {
            background-color: #e7e7e7;
            color: black;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #d3d3d3;
        }

        .forgot-link,
        .register-link {
            text-align: center;
            font-size: 14px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .forgot-link a,
        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .checkbox-container {
            margin-top: 10px;
        }

        .checkbox-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .checkbox-container select {
            width: 100%;
            padding: 8px;
            border: 1px solid #007bff;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .checkbox-container select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-repeat: no-repeat;
            background-position-x: calc(100% - 8px);
            background-position-y: 50%;
            padding-right: 24px;
        }

        .checkbox-container select:hover,
        .checkbox-container select:focus {
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Login</h1>
        </div>
        <div class="content">
            <img id="user-image" src="<?php echo URLROOT ?>/images/userlogo.jpeg" alt="User Image">
            <form action="<?php echo URLROOT ?>/LoginAuthentication" method="post">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <div class="forgot-link">
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
                <div class="checkbox-container">
                    <label for="rememberMe">
                        <input type="checkbox" id="rememberMe" name="rememberMe" value="1">
                        Remember me
                    </label>
                    <label for="showPassword">
                        <input type="checkbox" id="showPassword" name="showPassword" value="1">
                        Show password
                    </label>
                </div><br>
                <input type="submit" value="Login">
                <input type="button" value="Cancel">
            </form>
            <div class="register-link">
                Not registered? <a href="<?php echo URLROOT ?>/Register">Register here.</a>
            </div>
        </div>
    </div>
</body>

</html>
