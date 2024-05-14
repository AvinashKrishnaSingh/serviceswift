<!-- ActivityAdminView.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity</title>
    <style>
    /* CSS styles for the page layout */
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
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
    </style>
</head>
<body>

<!-- Navigation bar -->
<div class="navbar">
    <a href="<?php echo URLROOT ?>/Home">Home</a>
    <div class="navbar-right">
      <a href="<?php echo URLROOT ?>/Logout">Logout</a>
    </div>
</div>

<!-- Main content area -->
<div class="container">
    <h1>User Activity</h1>
    <h2>Requests</h2>
    <!-- Display requests in a table -->
    <table>
    <thead>
      <tr>
        <th>Service Provider</th>
        <th>Service Location</th>
        <th>Comments</th>
        <th>Date Requested</th>
        <th>Date Scheduled</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <!-- Loop through each request and display its details -->
      <?php foreach ($requests as $request): ?>
        <tr>
          <td><?= $request['service_provider_username'] ?></td>
          <td><?= $request['service_location'] ?></td>
          <td><?= $request['comments'] ?></td>
          <td><?= $request['created_at'] ?></td>
          <td><?= $request['date_scheduled'] ?></td>
          <td><?= $request['status'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
