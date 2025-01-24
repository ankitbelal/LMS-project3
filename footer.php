<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <style>
        /* Footer */
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        /* Social Section */
        .social-section {
            margin-bottom: 20px; /* Space between social section and copyright */
        }

        .social-section h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px; /* Space between social links */
        }

        .social-links a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #ffdd57; /* Highlight color on hover */
        }

        .social-links a i {
            font-size: 1.5rem;
        }

        /* Copyright Section */
        .copyright-section {
            font-size: 0.9rem;
            color: #ccc;
        }

        /* Responsive Design for Small Screens */
        @media (max-width: 768px) {
            .social-links {
                flex-direction: column; /* Stack social links vertically on small screens */
                align-items: center; /* Center the social links horizontally */
                justify-content: center; /* Center the social links vertically */
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer>
        <!-- Social Section -->
        <div class="social-section">
            <h3>Follow Us</h3>
            <div class="social-links">
                <a href="" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copyright-section">
            <p>&copy; 2025 AnyNotes. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>