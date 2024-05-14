<!-- EditAdminView.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

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

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 100px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
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

    <!-- Update User form -->

    <div class="container">
        <h1>Edit User</h1>
        <form action="<?= URLROOT ?>/updateUser" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?= isset($user['first_name']) ? $user['first_name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?= isset($user['last_name']) ? $user['last_name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="telephone">Telephone:</label>
                <input type="text" id="telephone" name="telephone" value="<?= isset($user['telephone']) ? $user['telephone'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"><?= isset($user['address']) ? $user['address'] : ''; ?></textarea>
            </div>
            <input type="hidden" name="old_username" value="<?= isset($user['username']) ? $user['username'] : ''; ?>">
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>

