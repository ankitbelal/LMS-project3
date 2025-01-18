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

        /* Search Box */
        .search-box {
            display: flex;
            align-items: center;
            max-width: 300px; /* Limit the maximum width of the search bar */
            width: 100%; /* Take up available space up to the max-width */
            margin-left: auto; /* Push the search bar to the right */
            margin-right: 20px; /* Add space between the search bar and the right corner */
        }

        .search-box input {
            padding: 8px 12px;
            border: none;
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
            outline: none;
            flex: 1; /* Take up remaining space */
        }

        .search-box button {
            padding: 8px 12px;
            border: none;
            background: #fff;
            color: #007BFF;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .search-box button:hover {
            background: #f0f0f0; /* Light hover effect */
        }

        .search-box button i {
            font-size: 1rem;
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

            .search-box {
                margin-top: 15px; /* Add more space between nav items and search box */
                margin-right: 0; /* Remove right margin on small screens */
                width: 100%; /* Full width for search box on small screens */
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
            <a href="#"><i class="fas fa-file-alt"></i> Syllabuses</a>
            <a href="contribute.php"><i class="fas fa-hand-holding-heart"></i> Contribute</a>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </div>
    </div>
</body>
</html>