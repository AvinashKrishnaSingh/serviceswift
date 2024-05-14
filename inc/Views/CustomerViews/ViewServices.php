<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Services</title>
    <style>
        /* Header bar styles */
        .navbar {
      background-color: #007bff;
      overflow: hidden;
    }

    .navbar a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #0056b3;
    }

    .navbar-right {
      float: right;
    }

    .navbar-right a {
      display: inline-block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 20px;
      text-decoration: none;
    }

    .navbar-right p {
      display: inline-block;
      margin: 0;
      padding: 14px 20px;
      color: #f2f2f2;
    }

        .app-name {
            font-size: 20px; 
            font-weight: bold; 
            margin: 0; 
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .services {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .service {
            width: 300px;
            padding: 20px;
            margin: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .service h3 {
            margin-top: 0;
        }

        .service img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #007bff; 
            color: #fff; 
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="<?php echo URLROOT ?>/Home">Home</a>
        <div class="navbar-right">
            <a href="<?php echo URLROOT ?>/Logout">Logout</a>
        </div>
        
    </div>
    <div class="container">
          <h1><p>Welcome, <?= $_SESSION['username'] ?>!</h1>
        <h2 class="welcome-message">Available Services</h2>
        <div class="services">
            <?php
            $services = array(
                array("name" => "Plumbing", "service_type" => "Plumbing", "image" => "images/plumber.jpeg"),
                array("name" => "Carpentry", "service_type" => "Carpentry", "image" => "images/carpenter.jpeg"),
                array("name" => "Mechanic", "service_type" => "Mechanic", "image" => "images/mechanic.jpeg"),
                array("name" => "Cleaning", "service_type" => "Cleaning", "image" => "images/cleaner.jpeg"),
                array("name" => "Handyman", "service_type" => "Handyman", "image" => "images/handyman.jpeg"),
                array("name" => "Painting", "service_type" => "Painter", "image" => "images/painter.jpeg")
            );

            foreach ($services as $service) {
            ?>
                <div class="service">
                    <img src="<?php echo $service['image']; ?>" alt="<?php echo $service['name']; ?>">
                    <h3><?php echo $service['name']; ?></h3>
                    <form action="<?php echo URLROOT ?>/ServiceProviders" method="GET">
                        <input type="hidden" name="service_type" value="<?php echo $service['service_type']; ?>">
                        <button type="submit" class="btn">View Details</button>
                    </form>


                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 ServiceSwift. All rights reserved.
    </div>
</body>

</html>

