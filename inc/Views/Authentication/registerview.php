<!-- registerview.php -->

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 950px;
            max-width: 90%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-section {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .right-section {
            flex: 2;
            padding: 25px;
        }

        .header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 10px;
            height: 95%;
        }

        #decorative-image {
            width: 340px;
            height: 400px;
            border-radius: 20px;
            background-color: #ffffff;
            border: 3px solid #4CAF50;
            display: block;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"],
        input[type="email"],
        input[type="tel"],
        input[type="button"],
        select {
            width: calc(100% - 0px);
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f3f4f6;
            border: 1px solid #e5e7eb;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
            color: #4CAF50;
            margin-top: 15px;
        }

        .login-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left-section">
        <div class="header">
            <h1>Register</h1>
            <img id="decorative-image" src="<?php echo URLROOT ?>/images/register.jpeg" alt="Decorative Image">
        </div>
    </div>

    <div class="right-section">
    <form id="customer-form" action="<?php echo URLROOT ?>/RegisterInfo" method="POST">
            <!-- Customer Registration Form -->
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="first_name">First Name</label><br>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                </div>
                <div style="width: 48%;">
                    <label for="last_name">Last Name</label><br>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                </div>
            </div>

            <div>
                <label for="address">Address</label><br>
                <input type="text" id="address" name="address" placeholder="Address" required>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="Village">Village</label><br>
                    <select name="village">
                        <option value="">Select Village</option>
                        <option value="New Amsterdam">New Amsterdam</option>
                        <option value="Linden">Linden</option>
                        <option value="Anna Regina">Anna Regina</option>
                        <option value="Bartica">Bartica</option>
                        <option value="Corriverton">Corriverton</option>
                        <option value="Rose Hall">Rose Hall</option>
                        <option value="Skeldon">Skeldon</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="Lethem">Lethem</option>
                        <option value="Mabaruma">Mabaruma</option>
                        <option value="Charity">Charity</option>
                        <option value="Parika">Parika</option>
                        <option value="Vreed-en-Hoop">Vreed-en-Hoop</option>
                        <option value="Rosignol">Rosignol</option>
                        <option value="Albion">Albion</option>
                        <option value="Fort Wellington">Fort Wellington</option>
                        <option value="Good Hope">Good Hope</option>
                        <option value="Mahaicony">Mahaicony</option>
                        <option value="Buxton">Buxton</option>
                    </select>
                </div>
                <div style="width: 48%;">
                    <label for="Ward">Ward</label><br>
                    <select id="ward" name="ward">
                        <option value="">Select Ward</option>
                        <option value="East Bank Berbice">East Bank Berbice</option>
                        <option value="Georgetown">Georgetown</option>
                        <option value="East Bank Demerara">East Bank Demerara</option>
                        <option value="East Bank Essequibo">East Bank Essequibo</option>
                        <option value="West Bank Berbice">West Bank Berbice</option>
                        <option value="West Bank Demerara">West Bank Demerara</option>
                        <option value="West Bank Essequibo">West Bank Essequibo</option>
                    </select>
                </div>
            </div>

            <br>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div style="width: 48%;">
                    <label for="telephone">Telephone Number</label><br>
                    <input type="tel" id="telephone" name="telephone" placeholder="Telephone Number" required>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div style="width: 48%;">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <input type="submit" value="Register as customer">
                <input style="background-color: #e7e7e7; color: black;" type="button" value="Cancel">
            </div>
            <input type="hidden" name="userrole" value="customer">
            <input type="hidden" name="account_status" value="Active">
        </form>

                    <!-- Service Provider Registration Form -->
        <form id="service-provider-form" action="<?php echo URLROOT ?>/RegisterInfo" method="post">
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="first_name">First Name</label><br>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                </div>
                <div style="width: 48%;">
                    <label for="last_name">Last Name</label><br>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                </div>
            </div>
            <div>
                <label for="address">Address</label><br>
                <input type="text" id="address" name="address" placeholder="Address" required>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div style="width: 48%;">
                    <label for="service_type">Service Type</label><br>
                    <select id="service_type" name="service_type" required>
                        <option value="Plumbing">Plumbing</option>
                        <option value="Carpentry">Carpentry</option>
                        <option value="Mechanic">Mechanic</option>
                        <option value="Cleaning">Cleaning</option>
                        <option value="General service">General service</option>
                    </select>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="telephone">Telephone Number</label><br>
                    <input type="tel" id="telephone" name="telephone" placeholder="Telephone Number" required>
                </div>
                <div style="width: 48%;">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="Village">Village</label><br>
                    <select name="village">
                        <option value="">Select Village</option>
                        <option value="New Amsterdam">New Amsterdam</option>
                        <option value="Linden">Linden</option>
                        <option value="Anna Regina">Anna Regina</option>
                        <option value="Bartica">Bartica</option>
                        <option value="Corriverton">Corriverton</option>
                        <option value="Rose Hall">Rose Hall</option>
                        <option value="Skeldon">Skeldon</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="Lethem">Lethem</option>
                        <option value="Mabaruma">Mabaruma</option>
                        <option value="Charity">Charity</option>
                        <option value="Parika">Parika</option>
                        <option value="Vreed-en-Hoop">Vreed-en-Hoop</option>
                        <option value="Rosignol">Rosignol</option>
                        <option value="Albion">Albion</option>
                        <option value="Fort Wellington">Fort Wellington</option>
                        <option value="Good Hope">Good Hope</option>
                        <option value="Mahaicony">Mahaicony</option>
                        <option value="Buxton">Buxton</option>
                    </select>
                </div>
                <div style="width: 48%;">
                    <label for="Ward">Ward</label><br>
                    <select id="ward" name="ward">
                        <option value="">Select Ward</option>
                        <option value="East Bank Berbice">East Bank Berbice</option>
                        <option value="Georgetown">Georgetown</option>
                        <option value="East Bank Demerara">East Bank Demerara</option>
                        <option value="East Bank Essequibo">East Bank Essequibo</option>
                        <option value="West Bank Berbice">West Bank Berbice</option>
                        <option value="West Bank Demerara">West Bank Demerara</option>
                        <option value="West Bank Essequibo">West Bank Essequibo</option>
                    </select>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <input type="submit" value="Register as Service Provider">
                <input style="background-color: #e7e7e7; color: black;" type="button" value="Cancel">
            </div>
            <input type="hidden" name="userrole" value="service_provider">
            <input type="hidden" name="account_status" value="Inactive">
        </form>


        <div class="login-link">
            Already have an account? <a href="<?php echo URLROOT ?>/Login">Login here.</a>
        </div>
        <div class="login-link">
            <a href="#" id="switch-form-link">Register as a Service Provider</a>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const normalUserForm = document.getElementById("customer-form");
                const serviceProviderForm = document.getElementById("service-provider-form");
                const switchFormLink = document.getElementById("switch-form-link");

                // Hide the service provider form initially
                serviceProviderForm.style.display = "none";

                switchFormLink.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    // Toggle between displaying the normal user and service provider forms
                    if (normalUserForm.style.display === "none") {
                        normalUserForm.style.display = "block";
                        serviceProviderForm.style.display = "none";
                        switchFormLink.textContent = "Service Provider Registration";
                    } else {
                        normalUserForm.style.display = "none";
                        serviceProviderForm.style.display = "block";
                        switchFormLink.textContent = "Customer Registration";
                    }
                });
            });
        </script>
    </div>
</div>
</body>
</html>


                    
