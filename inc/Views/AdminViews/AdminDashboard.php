<!-- AdminDashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            /* max-width: 1000px; */ /* Remove this line */
            width: 80%; /* Add this line */
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

        .action-buttons.edit a,
        .action-buttons.view a,
        .action-buttons.userRequests a {
            text-decoration: none;
            color: inherit;
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
    <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
    <h1>Admin Dashboard</h1>
    <button class="action-buttons userRequests">
      <a href="<?= URLROOT ?>/showRequests">User Requests</a>
    </button>

    <!-- Customers -->
    <h2>Customers</h2>
    <table id="Customers">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer['username'] ?></td>
                    <td><?= $customer['first_name'] ?></td>
                    <td><?= $customer['last_name'] ?></td>
                    <td><?= $customer['telephone'] ?></td>
                    <td><?= $customer['address'] ?></td>
                    <td>
                        <!-- Delete Button -->
                        <form action="<?= URLROOT ?>/deleteUser" method="POST" style="display: inline;" >
                            <input type="hidden" name="username" value="<?= $customer['username'] ?>">
                            <button type="submit" class="action-buttons delete">Delete</button>
                        </form>
                        <!-- Edit Button (Redirects to Edit Page) -->
                        <button class="action-buttons edit">
                            <a href="<?= URLROOT ?>/updateUser?username=<?= $customer['username'] ?>">Edit</a>
                        </button>
                        <!-- View Requests Button (Redirects to View Requests Page) -->
                        <button class="action-buttons view">
                            <a href="<?= URLROOT ?>/showActivity?username=<?= $customer['username'] ?>">Activity</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Service Providers -->
    <h2>Service Providers</h2>
    <table id="ServiceProviders">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Status</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serviceProviders as $provider): ?>
                <tr>
                    <td><?= $provider['username'] ?></td>
                    <td><?= $provider['first_name'] ?></td>
                    <td><?= $provider['last_name'] ?></td>
                    <td><?= $provider['telephone'] ?></td>
                    <td><?= $provider['address'] ?></td>
                    <td><?= $provider['account_status']?></td>
                    <td>
                        <!-- Delete Button -->
                        <form action="<?= URLROOT ?>/deleteUser" method="POST" style="display: inline;">
                            <input type="hidden" name="username" value="<?= $provider['username'] ?>">
                            <button type="submit" class="action-buttons delete">Delete</button>
                        </form>
                        <!-- Edit Button (Redirects to Edit Page) -->
                        <button class="action-buttons edit">
                            <a href="<?= URLROOT ?>/editUser/<?= $provider['username'] ?>">Edit</a>
                        </button>
                        <!-- Activate/Deactivate Button -->
                        <form action="<?= URLROOT ?>/toggleServiceProviderStatus" method="POST" style="display: inline;">
                            <input type="hidden" name="username" value="<?= $provider['username'] ?>">
                            <input type="hidden" name="account_status" value="<?= $provider['account_status'] ?>">
                            <button type="submit" class="action-buttons"><?= $provider['account_status'] === 'Active' ? 'Deactivate' : 'Activate' ?></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
