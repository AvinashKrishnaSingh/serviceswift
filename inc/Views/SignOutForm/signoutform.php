<!DOCTYPE html>
<html>
<head>
    <title>Sign Out</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SysAid Customized Header</title>
  <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.signout-container {
    width: 300px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

h1 {
    text-align: center;
    margin-top: 0;
}

p {
    margin-bottom: 20px;
}

button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #3e8e41;
}
  </style>
</head>
<body>
    <div class="signout-container">
        <h1>Sign Out</h1>
        <p>Are you sure you want to sign out?</p>
        <form action='<?php echo URLROOT ?>/Home' method="post">
            <button type="submit" id="signout-btn">Sign Out</button>
        </form>
    </div>
    <script>
        document.getElementById('signout-btn').addEventListener('click', function() {
            window.location.href = 'hompagevahid.html';
        });
    </script>
</body>
</html>
