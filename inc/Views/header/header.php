<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: blue; /* Dark background for contrast */
            color: #fff; /* White text */
            padding: 20px; /* Padding for a clean look */
            display: flex; /* Flexbox for layout */
            align-items: center; /* Align items vertically */
            justify-content: flex-start; /* Align all elements to the start */
        }
        .header .logo {
            width: 80px; /* Adjust logo size */
            margin-right: 5px; /* Reduce space between logo and app name */
            box-shadow: 0 0 15px 10px white;
        }
        .header .app-name {
            font-size: 24px; /* Font size for the app name */
            font-weight: bold; /* Bold text */
        }
        .header .nav {
            display: flex; /* Flexbox for layout */
            gap: 20px; /* Space between nav items */
            margin-left: auto; /* Push the navigation to the far right */
        }
        .nav a {
            text-decoration: none; /* Remove underline */
            color: #fff; /* White text */
            padding: 10px 20px; /* Padding for a button-like appearance */
            background-color: transparent; /* Transparent background */
            border: 2px solid #fff; /* Border */
            border-radius: 5px; /* Rounded corners */
            transition: all 0.3s; /* Smooth transition */
            cursor: pointer; /* Pointer cursor on hover */
        }
        .nav a:hover {
            background-color: #555; /* Darken on hover */
        }
        /* Dropdown styles */
        /* Add your dropdown styles here */
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
    <img class="logo" src="<?php echo URLROOT ?>/images/logoservice.jpeg" alt="Logo">
        <b> <h1 class="app-name">ServiceSwift</h1> </b>
        <div class="nav"> 
        <a href="<?php echo URLROOT ?>/Login" id="loginLink">Login</a>

           <!--  <a href="../Authentication/login.php" id="loginLink">Login</a> -->
         

             <a href="#services">Services</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </div>
    </div>

    <script>
        // Select the login link
        const loginLink = document.getElementById('loginLink');

        // Add click event listener
        loginLink.addEventListener('click', function(event) {
            // Prevent the default behavior (following the link)
            event.preventDefault();

            // Redirect to the login page
            window.location.href = '<?php echo URLROOT ?>/Login';
         
          
        });
    </script>
</body>
</html>
