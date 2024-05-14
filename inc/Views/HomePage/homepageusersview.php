<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

    .dropdown {
        position: relative; /* Relative position for dropdown */
    }

    .dropdown-toggle {
        background-color: transparent; /* Transparent background */
        color: #fff; /* White text */
        border: 2px solid #fff; /* White border */
        border-radius: 5px; /* Rounded corners */
        padding: 10px 20px; /* Add padding */
        cursor: pointer; /* Cursor change on hover */
        transition: all 0.3s; /* Smooth transition */
    }

    .dropdown-toggle:hover {
        background-color: #555; /* Change background on hover */
    }

    .dropdown-menu {
        position: absolute;
        top: 100%; /* Position below the button */
        right: 0; /* Align to the right */
        background-color: #444; /* Darker dropdown background */
        border-radius: 5px; /* Rounded corners */
        padding: 10px; /* Padding around dropdown content */
        display: none; /* Hide dropdown by default */
        z-index: 10; /* Ensure dropdown is above other elements */
    }

    .dropdown-item {
        color: #fff; /* White text */
        text-decoration: none; /* No underline */
        padding: 10px; /* Padding around dropdown items */
        display: block; /* Display as block element */
    }

    .dropdown-item:hover {
        background-color: #555; /* Change background on hover */
    }
    .dropdown-menu {
                position: absolute;
                top: 100%;
                right: 0;
                background-color: #007bff; /* Dropdown background color */
                min-width: 100px; /* Adjust dropdown width as needed */
                border-radius: 5px; /* Rounded corners */
                padding: 10px 0;
                display: none; /* Hide by default */
            }

            .dropdown-item {
                color: #fff; /* Text color */
                text-decoration: none; /* Remove default underline */
                display: block; /* Display as block element */
                padding: 10px 20px; /* Add padding */
            }

            .dropdown-item:hover {
                background-color: rgba(255, 255, 255, 0.1); /* Change background color on hover */
            }

            .content-section img {
                width: 100%; /* Make images responsive */
                height: auto;
            }

            .content-section .content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #f2f2f2; /* Change background color on hover */
                padding: 20px;
                border-radius: 5px;
            }

            button {
                padding: 10px 20px;
                background-color: #007bff; /* Button background color */
                color: #fff; /* Button text color */
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #0056b3; /* Button background color on hover */
            }
            

            /* Team Container styles */
            .team-container {
                padding: 50px 20px;
                text-align: center;
            }

            .team-container h2 {
                color: #333;
            }

            .team-member {
                display: inline-block;
                margin: 20px;
            }

            .team-member img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
            }

            /* Work Row styles */
            .services {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .service {
        width: 300px;
        padding: 20px;
        margin: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s; /* Smooth transition on hover */
    }

    .service:hover {
        /* Increase size on hover */
        transform: scale(1.05);
    }

    .service h3 {
        margin-top: 0;
    }

    .service img {
        max-width: 100%;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin-right: 10px;
        transition: background-color 0.3s ease; /* Smooth transition for hover */
    }

    .btn:hover {
        background-color: #0056b3; /* Change color on hover */
    }

    .centered-heading {
                text-align: center; /* Center-aligns the text */
            }
            .about-section {
                padding: 50px 20px; /* Add padding */
                text-align: center; /* Center text */
                background-color: #fff; /* White background */
                color: #333; /* Darker text color for contrast */
                border-radius: 10px; /* Smooth corners */
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
                max-width: 800px; /* Limit the width */
                margin: 40px auto; /* Center the section */
            }

            .about-section h2 {
                font-size: 36px; /* Larger font size for heading */
                color: #333; /* Heading color */
                margin-bottom: 20px; /* Space below the heading */
            }

            .about-section p {
                font-size: 18px; /* Increase font size for readability */
                line-height: 1.6; /* Increase line spacing */
                margin-bottom: 20px; /* Space between paragraphs */
            }

            .about-section .highlight {
                font-weight: bold; /* Bold text for emphasis */
                color: #007bff; /* A different color for highlighted text */
            }

            .about-section img {
                max-width: 100%; /* Ensure image does not overflow */
                border-radius: 10px; /* Smooth corners on images */
                margin-top: 20px; /* Space above the image */
            }
            .contact-container {
                background-color: #f9f9f9; /* Light background for contrast */
                padding: 40px; /* Sufficient padding */
                border-radius: 10px; /* Rounded corners */
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
                max-width: 600px; /* Limit the maximum width */
                margin: 40px auto; /* Center it */
                text-align: center; /* Center text */
            }

            .contact-container h2 {
                font-size: 32px; /* Larger font size for heading */
                color: #333; /* Darker text for readability */
                margin-bottom: 20px; /* Spacing below heading */
            }

            .contact-container p {
                font-size: 18px; /* Increase font size for body text */
                color: #555; /* Slightly darker text for contrast */
                margin: 10px 0; /* Consistent spacing */
            }

            .contact-info {
                display: flex; /* Flexbox for layout */
                justify-content: space-around; /* Space out elements evenly */
                margin-bottom: 20px; /* Add spacing below the contact info */
            }

            .contact-info p {
                display: flex; /* Flexbox for aligning icons */
                align-items: center; /* Align icons with text */
                margin: 0; /* No extra margin */
            }

            .contact-info i {
                margin-right: 8px; /* Space between icon and text */
                color: #007bff; /* Color for icons */
            }

            .contact-form {
                display: flex; /* Flexbox layout */
                flex-direction: column; /* Arrange items in a column */
                align-items: center; /* Center items */
            }

            .contact-form input,
            .contact-form textarea {
                width: 100%; /* Make inputs full-width */
                padding: 10px; /* Add padding */
                border: 1px solid #ccc; /* Light border */
                border-radius: 5px; /* Rounded corners */
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); /* Add shadow */
                margin-bottom: 10px; /* Spacing between elements */
            }

            .contact-form button {
                padding: 12px 20px; /* Larger padding */
                background-color: #007bff; /* Button background color */
                color: white; /* White text */
                border: none; /* No border */
                border-radius: 5px; /* Rounded corners */
                cursor: pointer; /* Pointer cursor */
                transition: background-color 0.3s; /* Smooth transition */
            }

            .contact-form button:hover {
                background-color: #0056b3; /* Change background on hover */
            }
    </style>
</head>
<body>

    <!-- Header -->
  
    <?php include __DIR__ . '/../header/header.php'; ?>


<!-- Team Container -->
<div class="team-container" id="team">
    <h2>WEBSITE DEVLOPERS</h2>
   <b> <p>Meet the Brains Behind the Code - Our Development Team:</p> </b>
    <div class="team-members">
        <div class="team-member">
                    <img src="<?php echo URLROOT ?>/images/webmember1.png" alt="Member 1">
            <h3>Roopdai Hussain</h3>
          
        </div>
        <div class="team-member">
           
            <img src="<?php echo URLROOT ?>/images/webmember2.png" alt="Member 2">
            <h3>Avinash Singh </h3>
    
        </div>
        <div class="team-member">
      
            <img src="<?php echo URLROOT ?>/images/webmember3.png" alt="Member 3">
            <h3>Trevis Cudjoe</h3>
          
        </div>
        <div class="team-member">
           
            <img src="<?php echo URLROOT ?>/images/webmember4.png" alt="Member 4">
            <h3>Darrell Jagdeo</h3>
      
        </div>

        <div class="team-member">
        <img src="<?php echo URLROOT ?>/images/webmember5.png" alt="Member 5">
          
            <h3>Dyanand Ghandatt</h3>
    
        </div>

        <div class="team-member">
        <img src="<?php echo URLROOT ?>/images/webmember6.png" alt="Member 6">
            <h3>Vahid Khublall</h3>
 
        </div>
    </div>
</div>

<!-- Services -->
<h1 class="centered-heading">SERVICES</h1>
<div class="services" id="services">
    <div class="service">
        <div style="text-align: center;">
            <img src="<?php echo URLROOT ?>/images/plumber.jpeg" alt="Plumbing">


            <h3 style="text-align: center;">Plumbing</h3>
            <p style="text-align: center;">Transform your plumbing challenges into hassle-free solutions with our expert team.</p>
        </div>
        <a href="service_details.html?service=plumbing"></a>
    </div>
    <div class="service">
        <div style="text-align: center;">
            <img src="<?php echo URLROOT ?>/images/carpenter.jpeg" alt="Carpentry">
            <h3 style="text-align: center;">Carpentry</h3>
            <p style="text-align: center;">Elevate your space with craftsmanship that brings your vision to life. Discover our carpentry services for quality and precision.</p>
        </div>
        <a href="service_details.html?service=carpentry"></a> 
    </div>
    <div class="service">
        <div style="text-align: center;">
            <img src="<?php echo URLROOT ?>/images/mechanic.jpeg" alt="Mechanic">
            <h3 style="text-align: center;">Mechanic</h3>
            <p style="text-align: center;">Rev up your vehicle's performance with expert mechanics who ensure every turn is smooth. Experience excellence in automotive care with our trusted services.</p>
        </div>
        <a href="service_details.html?service=mechanic"></a>
    </div>
    <div class="service">
        <div style="text-align: center;">
            <img src="<?php echo URLROOT ?>/images/cleaner.jpeg" alt="Cleaning">
            <h3 style="text-align: center;">Cleaning</h3>
            <p style="text-align: center;">Transform your space into a pristine sanctuary with our meticulous cleaning services. From dusting off every corner to sparkling floors, let us redefine cleanliness for you.</p>
        </div>
        <a href="service_details.html?service=cleaning"></a>
    </div>
    <div class="service">
        <div style="text-align: center;">
                       <img src="<?php echo URLROOT ?>/images/handyman.jpeg" alt="Handyman">

            <h3 style="text-align: center;">Handyman</h3>
            <p style="text-align: center;">From fixing leaky faucets to assembling furniture, our skilled handymen are here to tackle all your household tasks with precision and expertise. Say goodbye to DIY headaches.</p>
        </div>
        <a href="service_details.html?service=handyman"></a>
    </div>
    <div class="service">
        <div style="text-align: center;">
            <img src="<?php echo URLROOT ?>/images/painter.jpeg" alt="Painter">
            <h3 style="text-align: center;">Painting</h3>
            <p style="text-align: center;">Revitalize your space with expert painting services! Let us add a touch of creativity to your walls, bringing them to life with vibrant colors and impeccable finishes.</p>
        </div>
        <a href="service_details.html?service=painter"></a>
    </div>
</div>

    
</div>

<div class="about-section" id="about">
    <h2>About Our Company</h2>
    <p>Welcome to <span class="highlight">ServiceSwift</span>, where we believe in delivering high-quality services that make a difference. Our mission is to provide innovative solutions and exceptional customer experiences.</p>
    <p>With a dedicated team of experts, we are constantly evolving to meet the changing needs of our clients. Whether you're looking for a plumber or mechanic, we have the expertise to turn your vision into reality.</p>
    <p>At ServiceSwift, we prioritize customer satisfaction and aim to build lasting relationships with our clients. Join us on this journey to experience the best in service and innovation.</p>
 
    <img src="<?php echo URLROOT ?>/images/aboutus.jpeg" alt="About Us Image" />


</div>
    <!-- Contact Container -->
    <div class="contact-container" id="contact">
        <h2>Contact Us</h2>
        <p>Questions? We're here to help.</p>
        
        <div class="contact-info">
            <p><i class="fas fa-map-marker-alt"></i> Georgetown, GY</p>
            <p><i class="fas fa-phone-alt"></i> +592 658-2323</p>
            <p><i class="fas fa-envelope"></i> general.service@gmail.com</p>
        </div>
        
        <form action="/action_page.php" target="_blank" class="contact-form">
            <input type="text" placeholder="Name" name="Name" required>
            <input type="email" placeholder="Email" name="Email" required>
            <input type="text" placeholder="Subject" name="Subject" required>
            <textarea placeholder="Message" name="Message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

        <!-- Footer -->
        <?php include __DIR__ . '/../footer/footer.php'; ?>

    </div>

    <script>
         // JavaScript for smooth scrolling
         document.addEventListener('DOMContentLoaded', function() {
    var navLinks = document.querySelectorAll('.nav a');

    navLinks.forEach(function(navLink) {
        navLink.addEventListener('click', function(event) {
            event.preventDefault();

            var targetId = this.getAttribute('href');
            var targetSection = document.querySelector(targetId);

            if (targetSection) {
                var offset = targetSection.offsetTop;

                window.scrollTo({
                    top: offset,
                    behavior: 'smooth'
                });
            }
        });
    });
});

        
    </script>

</body>
</html>