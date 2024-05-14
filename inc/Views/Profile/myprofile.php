<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
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


  .profile-card {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .profile-card h1 {
    margin-bottom: 20px;
    color: #007bff;
  }

  .profile-info {
    margin-bottom: 30px;
    text-align: left;
  }

  .profile-info label {
    font-weight: bold;
  }

  .profile-info p {
    margin: 5px 0;
  }

  .profile-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .update-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
  }

  .update-button:hover {
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


<div class="profile-card">
    <h1><?= $_SESSION['username'] ?></h1>
    <div class="profile-info">
        <label>First Name:</label>
        <p><?php echo $userData['first_name']; ?></p>
        <label>Last Name:</label>
        <p><?php echo $userData['last_name']; ?></p>
        <label>Address:</label>
        <p><?php echo $userData['address']; ?></p>
        <label>Username:</label>
        <p><?php echo $userData['username']; ?></p>
        <label>Telephone:</label>
        <p><?php echo $userData['telephone']; ?></p>
        <?php if ($userData['userrole'] === 'service_provider'): ?>
            <label>Service Type:</label>
            <p><?php echo $userData['service_type']; ?></p>
        <?php endif; ?>
    </div>
    <form action="<?php echo URLROOT ?>/myAccount" method="post">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <label for="update-request">Request Profile Update:</label>
        <textarea id="update-request" name="update_request" rows="4" cols="50"></textarea>
        <button type="submit" class="update-button">Submit Request</button>
    </form>
</div>

</body>
</html>


