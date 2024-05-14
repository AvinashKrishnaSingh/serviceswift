<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
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

    .container {
      max-width: 100%;
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
        <a href="<?php echo URLROOT ?>/ServiceProviderDashboard">Home</a>
        <div class="navbar-right">
            <a href="<?php echo URLROOT ?>/Logout">Logout</a>
        </div>
      </div>
    

    <div class="container">
        <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
        <h1>All Requests</h1>
        <div class="MyAccount">
        <a href="<?php echo URLROOT ?>/myAccount"><button>MyAccount</button></a>
      </div>

        <table>
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Contact</th>
                    <th>Service Location</th>
                    <th>Comments</th>
                    <th>Date Scheduled</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request['client_name'] ?></td>
                    <td><?= $request['contact'] ?></td>
                    <td><?= $request['service_location'] ?></td>
                    <td><?= $request['comments'] ?></td>
                    <td><?= $request['date_scheduled'] ?></td>
                    <td><?= $request['status'] ?></td>
                    <td>
                        <?php if ($request['status'] !== 'Cancelled'): ?>
                          <form action="<?= URLROOT ?>/cancelRequest" method="POST">
                              <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                              <button class="status-buttons cancel" type="submit">Cancel</button>
                          </form>
                      <?php endif; ?>

                      <?php if ($request['status'] !== 'Accepted'): ?>
                          <form action="<?= URLROOT ?>/acceptRequest" method="POST">
                              <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                              <button class="status-buttons accepted" type="submit">Accept</button>
                          </form>
                      <?php endif; ?>

                      <?php if ($request['status'] !== 'Completed' && $request['status'] !== 'Cancelled'): ?>
                          <form action="<?= URLROOT ?>/completeRequest" method="POST">
                              <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                              <button class="status-buttons complete" type="submit">Complete</button>
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
