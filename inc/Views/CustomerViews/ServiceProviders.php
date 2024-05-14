
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Providers</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Your CSS styles */
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
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

        .request-button {
            padding: 6px 12px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .request-button:hover {
            background-color: #0056b3;
        }
        .btn {
        padding: 6px 12px;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        text-decoration: none; /* Ensure button doesn't get underlined if used inside an anchor tag */
    }

    .btn:hover {
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
    <div class="container">
        <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
        <h2 class="welcome-message">Available Service Providers</h2>
        <?php if (isset($service_type)): ?>
            <h3>Showing <?= $service_type ?> Providers</h3>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Telephone</th>
                    <th>Village</th>
                    <th>Ward</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($serviceProviders)): ?>
                    <?php foreach ($serviceProviders as $provider): ?>
                        <?php if ($provider['account_status'] === 'Active'): ?>
                            <tr>
                                <td><?= $provider['username'] ?></td>
                                <td><?= $provider['first_name'] ?></td>
                                <td><?= $provider['last_name'] ?></td>
                                <td><?= $provider['telephone'] ?></td>
                                <td><?= $provider['village'] ?></td>
                                <td><?= $provider['ward'] ?></td>
                                <td>
                                    <a href="<?= URLROOT ?>/RequestServices?provider_username=<?= $provider['username'] ?>" class="btn">Request</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No service providers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>


</html>

