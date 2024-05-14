<!-- user_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <style>
    /* Add your CSS styles here */
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


    /* Style for the Go Back button */
    .container button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-bottom: 10px; /* Add some margin below the button */
    }

    .container button:hover {
      background-color: #0056b3;
    }

  </style>
</head>
<body>

<div class="navbar">
  <a href="<?php echo URLROOT ?>/Home" >Home</a>
  <div class="navbar-right">
    <a href="<?php echo URLROOT ?>/Logout">Logout</a>
  </div>
</div>

<div class="container">
  <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>

  <div class="RequestServices">
    <a href="<?php echo URLROOT ?>/ViewServices"><button>Request Service</button></a>
  </div>
  <div class="MyAccount">
    <a href="<?php echo URLROOT ?>/myAccount"><button>MyAccount</button></a>
  </div>
    
  <table>
    <thead>
      <tr>
        <th>Service Provider</th>
        <th>Service Location</th>
        <th>Telephone</th>
        <th>Comments</th>
        <th>Date Requested</th>
        <th>Date Scheduled</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($requests as $request): ?>
        <tr>
          <td><?= $request['service_provider_username'] ?></td>
          <td><?= $request['service_location'] ?></td>
          <td><?= $request['provider_telephone'] ?></td>
          <td><?= $request['comments'] ?></td>
          <td><?= $request['created_at'] ?></td>
          <td><?= $request['date_scheduled'] ?></td>
          <td><?= $request['status'] ?></td>
          <td>
              <?php if ($request['status'] !== 'Cancelled'): ?>
                  <form action="<?= URLROOT ?>/cancelCustomerRequest" method="POST">
                      <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                      <button type="submit">Cancel</button>
                  </form>
              <?php endif; ?>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

</body>

</html>
