<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Navigation Bar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        /* Sub Navigation Bar */
        .sub-navbar {
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap on small screens */
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%; /* Ensure full width */
        }

        .sub-nav-items {
            display: flex;
            gap: 15px; /* Reduced gap for small screens */
            flex-wrap: wrap; /* Allow items to wrap on small screens */
            padding-left: 15px; /* Add a slight gap from the left corner */
        }

        .sub-nav-items a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease, text-decoration 0.3s ease; /* Smooth transition for color and underline */
            position: relative; /* For underline effect */
            font-family: Arial, sans-serif; /* Explicitly set the font family */
        }

        .sub-nav-items a:hover {
            color: #ffdd57; /* Change text color on hover */
        }

        .sub-nav-items a:hover::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px; /* Position the underline below the text */
            width: 100%;
            height: 2px;
            background: #ffdd57; /* Underline color */
            animation: underline 0.3s ease; /* Smooth animation for underline */
        }

        @keyframes underline {
            from {
                width: 0; /* Start with no width */
            }
            to {
                width: 100%; /* Expand to full width */
            }
        }

        .sub-nav-items a i {
            font-size: 1.2rem;
        }

        /* Responsive Design for Small Screens */
        @media (max-width: 768px) {
            .sub-navbar {
                flex-direction: column; /* Stack items vertically */
                align-items: flex-start; /* Align items to the left */
            }

            .sub-nav-items {
                flex-direction: column; /* Stack links vertically */
                gap: 10px; /* Reduce gap between items */
                padding-left: 0; /* Remove left padding on small screens */
            }
        }
    </style>
</head>
<body>
    <!-- Sub Navigation Bar -->
    <div class="sub-navbar">
        <div class="sub-nav-items">
            <a href="index.php"><i class="fas fa-book-open"></i> courses</a>
            <a href="notes.php"><i class="fas fa-sticky-note"></i> Notes</a>
            <a href="old.php"><i class="fas fa-book"></i> Old Questions</a>
            <a href="code.php"><i class="fas fa-code"></i> Course Codes</a>
            <a href="syllabus.php"><i class="fas fa-file-alt"></i> Syllabuses</a>
            <a href="contribute.php"><i class="fas fa-hand-holding-heart"></i> Contribute</a>
        </div>
    </div>
</body>
</html>