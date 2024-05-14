<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: blue; /* Dark background */
            color: #fff; /* White text */
            padding: 30px; /* Increased padding */
            text-align: center; /* Center-align text */
        }

        .footer p {
            margin: 0; /* No margin for text */
        }

        .footer a {
            color: #fff; /* White text */
            text-decoration: none; /* No underline */
            margin: 0 10px; /* Add spacing between links */
            transition: color 0.3s; /* Smooth transition */
            display: inline-flex; /* Inline display with icons */
            align-items: center; /* Align icons with text */
        }

        .footer a i {
            margin-right: 5px; /* Space between icon and text */
        }

        .footer a:hover {
            color: #007bff; 
        }
    </style>
</head>
<body>

    <!-- Footer -->   
    <footer class="footer">
        <p>Follow Us</p>
        <a href="https://www.facebook.com" title="Facebook">
            <i class="fab fa-facebook-f"></i> Facebook
        </a>
        <a href="https://www.twitter.com" title="Twitter">
            <i class="fab fa-twitter"></i> Twitter
        </a>
        <a href="https://plus.google.com" title="Google +">
            <i class="fab fa-google-plus-g"></i> Google +
        </a>
        <a href="https://www.instagram.com" title="Instagram">
            <i class="fab fa-instagram"></i> Instagram
        </a>
        <a href="https://www.linkedin.com" title="LinkedIn">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <p>&copy; 2024 ServiceSwift. All rights reserved.</p>
    </footer>

</body>
</html>