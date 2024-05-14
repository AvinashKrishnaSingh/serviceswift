<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    form {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="text"]::placeholder,
    input[type="date"]::placeholder,
    textarea::placeholder {
      color: #999;
    }

    select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .service-type-container {
      display: flex;
      align-items: center;
    }

    .service-type-label {
      flex: 1;
      margin-right: 10px;
    }

    .service-type-input {
      flex: 2;
      background-color: #f4f4f4;
      color: #333;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
  </style>
</head>
<body>
<form action="<?php echo URLROOT ?>/storeRequests" method="POST">
    <input type="hidden" name="requester_username" value="<?php echo $_SESSION['username']; ?>">
    <!-- Retrieve and set the provider's username from the query parameter -->
    <input type="hidden" name="service_provider_username" value="<?= isset($_GET['provider_username']) ? htmlspecialchars($_GET['provider_username']) : '' ?>">

    <label for="date">Date Scheduled:</label><br>
    <input type="date" id="date_scheduled" name="date_scheduled" required><br>


    <label for="service_location">Service Location:</label><br>
    <input type="text" id="service_location" name="service_location" placeholder="Enter service location" required><br>

    <label for="client_name">Client Name:</label><br>
    <input type="text" id="client_name" name="client_name" placeholder="Enter your name" required><br>

    <label for="comments">Comments:</label><br>
    <textarea id="comments" name="comments" placeholder="Enter your comments"></textarea><br>
    
    <input type="submit" value="Submit">
</form>


</html>


