<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AnyNotes</title>
    <link rel="stylesheet" href="./css/nav.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            margin-top: 80px; /* Added margin-top to create space below the navbar */
        }

        /* Contact Us Heading */
        h1 {
            text-align: center;
            color: #e91e63; /* Pink color for Contact Us heading */
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Contact Info Section */
        .contact-info {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }
        .contact-info div {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex:  1 calc(10% - 20px); /* Two columns with gap */
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .contact-info div:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .contact-info i {
            font-size: 2rem;
            color: #ff5722; /* Orange color for icons */
            margin-bottom: 10px;
        }
        .contact-info h2 {
            color: #673ab7; /* Purple color for email and phone labels */
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .contact-info a {
            color: #1a73e8;
            text-decoration: none;
        }
        .contact-info a:hover {
            color: #34a853;
            text-decoration: underline;
        }

        /* Feedback Form Section */
        .feedback-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 40px;
            max-width: 600px; /* Limit form width */
            margin: 0 auto; /* Center the form */
        }
        .feedback-form h2 {
            color: #009688; /* Teal color for Feedback heading */
            font-size: 1.8rem;
            margin-bottom: 15px;
            text-align: center; /* Center the header */
        }
        .feedback-form input, .feedback-form textarea {
            width: 80%; /* Decrease width of input fields */
            padding: 12px;
            margin: 0 auto 20px; /* Center input fields */
            display: block; /* Ensure inputs are block-level for centering */
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .feedback-form input:focus, .feedback-form textarea:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 8px rgba(26, 115, 232, 0.3);
            outline: none;
        }
        .feedback-form textarea {
            resize: vertical;
            height: 150px;
        }

        /* Centered Gradient Button */
        .feedback-form .button-container {
            text-align: center; /* Center the button */
        }
        .feedback-form button {
            background: linear-gradient(45deg, #1a73e8, #34a853); /* Gradient background */
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feedback-form button:hover {
            background: linear-gradient(45deg, #34a853, #1a73e8); /* Reverse gradient on hover */
            transform: translateY(-2px); /* Lift effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
        }

        /* Social Media Section */
        .social-media {
            text-align: center;
            margin-top: 40px;
        }
        .social-media a {
            margin: 0 10px;
            color: #1a73e8;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        .social-media a:hover {
            color: #34a853;
        }

        /* Responsive Design for Mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem; /* Smaller font size for mobile */
            }

            .contact-info {
                gap: 15px; /* Reduce gap for mobile */
            }
            .contact-info div {
                flex: 1 1 calc(50% - 10px); /* Keep side-by-side with reduced gap */
                padding: 15px; /* Reduce padding for mobile */
            }
            .contact-info i {
                font-size: 1.5rem; /* Smaller icons for mobile */
            }
            .contact-info h2 {
                font-size: 1.2rem; /* Smaller font size for mobile */
            }

            .feedback-form {
                padding: 20px; /* Reduce padding for mobile */
            }
            .feedback-form input, .feedback-form textarea {
                width: 100%; /* Full width for mobile */
            }

            .feedback-form h2 {
                font-size: 1.5rem; /* Smaller font size for mobile */
            }

            .social-media a {
                font-size: 1.2rem; /* Smaller icons for mobile */
            }
        }

        @media (max-width: 480px) {
            .contact-info div {
                flex: 1 1 100%; /* Stack vertically on very small screens */
            }
        }
    </style>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Contact Us</h1>

        <!-- Contact Information -->
        <div class="contact-info">
            <div>
                <i class="fas fa-envelope"></i>
                <h2>Email</h2>
                <p><a href="mailto:sample@anynotes.com">sample@anynotes.com</a></p>
            </div>
            <div>
                <i class="fas fa-phone"></i>
                <h2>Phone</h2>
                <p><a href="tel:+977-1234567890">+977-1234567890</a></p>
            </div>
        </div>

        <!-- Stylish Feedback Form -->
        <div class="feedback-form">
            <h2>Feedback</h2> <!-- Teal color for Feedback heading -->
            <form action="submit_feedback.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Feedback" required></textarea>
                <div class="button-container">
                    <button type="submit">Submit Feedback</button>
                </div>
            </form>
        </div>

        <!-- Social Media Links -->
        <div class="social-media">
            <h2>Follow Us</h2>
            <a href="" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</body>
</html>