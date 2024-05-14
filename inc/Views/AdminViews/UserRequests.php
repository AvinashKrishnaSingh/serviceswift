<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Requests</title>
<style>
        /* CSS Styles */
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
            width: 80%;
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

<div class="navbar">
  <a href="<?php echo URLROOT ?>/AdminDashboard">Home</a>
  <div class="navbar-right">
    <a href="<?php echo URLROOT ?>/Logout">Logout</a>
  </div>
</div>

<div class="container">
  <h1>User Requests</h1>

  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Update Request</th>
        <th>Request Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($requests as $request): ?>
        <tr>
        <td><?= $request['requester_username'] ?></td>  
        <td><?= $request['request_text'] ?></td>
        <td><?= $request['request_date'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>