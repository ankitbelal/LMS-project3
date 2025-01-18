<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Questions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./css/index.css"> <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="./css/nav.css"> <!-- Link to your navigation CSS file -->
    <style>
        /* Additional styles for the old questions page */
        .container {
     
            padding: 20px;
            max-width: 1200px; /* Limit container width for better readability */
            margin: 0 auto; /* Center the container */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center-align everything inside the container */
        }

        .form-container {
            margin-top: 57px;
            margin-bottom: 20px;
            display: flex;
            align-items: center; /* Center-align form elements horizontally */
            gap: 10px; /* Space between dropdowns and button */
            justify-content: center; /* Center-align the entire form container */
        }

        .form-container select {
            padding: 10px;
            border-radius: 5px; /* Square corners */
            border: 2px solid #007BFF; /* Blue border */
            background-color: #f9f9f9; /* Light background */
            font-size: 1rem;
            appearance: none; /* Remove default arrow */
            -webkit-appearance: none; /* Remove default arrow for Safari */
            -moz-appearance: none; /* Remove default arrow for Firefox */
            cursor: pointer;
            width: 200px; /* Increased width for dropdowns */
            text-align: center;
            transition: all 0.3s ease;
        }

        .form-container select:hover {
            border-color: #0056b3; /* Darker blue on hover */
            background-color: #e9f5ff; /* Light blue background on hover */
        }

        .form-container select:focus {
            outline: none;
            border-color: #0056b3; /* Darker blue on focus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Glow effect */
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px; /* Square corners */
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            width: 200px; /* Match width with dropdowns */
        }

        .form-container button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .questions-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Center-align cards */
        }

        .question-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 300px; /* Increased width for the cards */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center; /* Center-align text inside the card */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center-align content vertically */
        }

        .question-card:hover {
            transform: translateY(-10px); /* Lift effect on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
        }

        .question-card h3 {
            margin-top: 0;
            color: #007BFF; /* Blue heading */
            font-size: 1.5rem; /* Larger font size for title */
        }

        .question-card p {
            margin: 10px 0;
            color: #555; /* Dark gray text */
            font-size: 1rem; /* Standard font size for description */
        }

        .question-card a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        .question-card a:hover {
            color: #0056b3; /* Darker blue on hover */
            text-decoration: underline;
        }

        .question-card .icon {
            font-size: 2rem; /* Larger icon size */
            color: #007BFF; /* Blue icon color */
            margin-bottom: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column; /* Stack dropdowns and button vertically on small screens */
                align-items: center; /* Center-align vertically */
            }

            .form-container select,
            .form-container button {
                width: 100%; /* Full width on small screens */
            }

            .question-card {
                width: calc(50% - 20px); /* Two cards per row on medium screens */
            }
        }

        @media (max-width: 480px) {
            .question-card {
                width: 100%; /* Full width on small screens */
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'subnav.php'; ?>

    <div class="container">
        <div class="form-container">
            <select name="course" required>
                <option value="" disabled selected>Select Course</option>
                <option value="bba">BBA</option>
                <option value="bca">BCA</option>
                <option value="computer_engineering">Computer Engineering</option>
                <option value="mba">MBA</option>
                <option value="mca">MCA</option>
            </select>
            <select name="semester" required>
                <option value="" disabled selected>Select Semester</option>
                <option value="semester1">Semester 1</option>
                <option value="semester2">Semester 2</option>
                <option value="semester3">Semester 3</option>
                <option value="semester4">Semester 4</option>
                <option value="semester5">Semester 5</option>
                <option value="semester6">Semester 6</option>
                <option value="semester7">Semester 7</option>
                <option value="semester8">Semester 8</option>
            </select>
            <button type="submit">Show Old Questions</button>
        </div>

        <div class="questions-container">
            <?php
            // Simulated data for old questions with random subject names
            $oldQuestions = [
                'bba' => [
                    'semester1' => [
                        ['title' => 'Business Communication', 'description' => 'Old questions for Business Communication.', 'link' => '#'],
                        ['title' => 'Financial Accounting', 'description' => 'Old questions for Financial Accounting.', 'link' => '#'],
                        ['title' => 'Principles of Management', 'description' => 'Old questions for Principles of Management.', 'link' => '#'],
                        ['title' => 'Business Mathematics', 'description' => 'Old questions for Business Mathematics.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Marketing Management', 'description' => 'Old questions for Marketing Management.', 'link' => '#'],
                        ['title' => 'Organizational Behavior', 'description' => 'Old questions for Organizational Behavior.', 'link' => '#'],
                        ['title' => 'Business Law', 'description' => 'Old questions for Business Law.', 'link' => '#'],
                        ['title' => 'Economics for Managers', 'description' => 'Old questions for Economics for Managers.', 'link' => '#']
                    ]
                ],
                'bca' => [
                    'semester1' => [
                        ['title' => 'Programming in C', 'description' => 'Old questions for Programming in C.', 'link' => '#'],
                        ['title' => 'Discrete Mathematics', 'description' => 'Old questions for Discrete Mathematics.', 'link' => '#'],
                        ['title' => 'Computer Fundamentals', 'description' => 'Old questions for Computer Fundamentals.', 'link' => '#'],
                        ['title' => 'Digital Electronics', 'description' => 'Old questions for Digital Electronics.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Data Structures', 'description' => 'Old questions for Data Structures.', 'link' => '#'],
                        ['title' => 'Database Systems', 'description' => 'Old questions for Database Systems.', 'link' => '#'],
                        ['title' => 'Object-Oriented Programming', 'description' => 'Old questions for OOP using C++.', 'link' => '#'],
                        ['title' => 'Operating Systems', 'description' => 'Old questions for Operating Systems.', 'link' => '#']
                    ]
                ],
                'computer_engineering' => [
                    'semester1' => [
                        ['title' => 'Engineering Mathematics', 'description' => 'Old questions for Engineering Mathematics.', 'link' => '#'],
                        ['title' => 'Basic Electronics', 'description' => 'Old questions for Basic Electronics.', 'link' => '#'],
                        ['title' => 'Engineering Physics', 'description' => 'Old questions for Engineering Physics.', 'link' => '#'],
                        ['title' => 'Engineering Drawing', 'description' => 'Old questions for Engineering Drawing.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Digital Logic Design', 'description' => 'Old questions for Digital Logic Design.', 'link' => '#'],
                        ['title' => 'Data Structures', 'description' => 'Old questions for Data Structures.', 'link' => '#'],
                        ['title' => 'Computer Organization', 'description' => 'Old questions for Computer Organization.', 'link' => '#'],
                        ['title' => 'Programming in Python', 'description' => 'Old questions for Python Programming.', 'link' => '#']
                    ]
                ],
                'mba' => [
                    'semester1' => [
                        ['title' => 'Managerial Economics', 'description' => 'Old questions for Managerial Economics.', 'link' => '#'],
                        ['title' => 'Financial Management', 'description' => 'Old questions for Financial Management.', 'link' => '#'],
                        ['title' => 'Marketing Management', 'description' => 'Old questions for Marketing Management.', 'link' => '#'],
                        ['title' => 'Human Resource Management', 'description' => 'Old questions for HR Management.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Strategic Management', 'description' => 'Old questions for Strategic Management.', 'link' => '#'],
                        ['title' => 'Marketing Research', 'description' => 'Old questions for Marketing Research.', 'link' => '#'],
                        ['title' => 'Operations Management', 'description' => 'Old questions for Operations Management.', 'link' => '#'],
                        ['title' => 'Business Analytics', 'description' => 'Old questions for Business Analytics.', 'link' => '#']
                    ]
                ],
                'mca' => [
                    'semester1' => [
                        ['title' => 'Advanced Java Programming', 'description' => 'Old questions for Java Programming.', 'link' => '#'],
                        ['title' => 'Operating Systems', 'description' => 'Old questions for Operating Systems.', 'link' => '#'],
                        ['title' => 'Database Management Systems', 'description' => 'Old questions for DBMS.', 'link' => '#'],
                        ['title' => 'Software Engineering', 'description' => 'Old questions for Software Engineering.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Cloud Computing', 'description' => 'Old questions for Cloud Computing.', 'link' => '#'],
                        ['title' => 'Web Technologies', 'description' => 'Old questions for Web Technologies.', 'link' => '#'],
                        ['title' => 'Machine Learning', 'description' => 'Old questions for Machine Learning.', 'link' => '#'],
                        ['title' => 'Network Security', 'description' => 'Old questions for Network Security.', 'link' => '#']
                    ]
                ]
            ];

            // Default old questions to display if no course/semester is selected
            $defaultQuestions = [
                ['title' => 'Welcome to AnyNotes!', 'description' => 'Select a course and semester to view old questions.', 'link' => '#'],
                ['title' => 'Explore Our Resources', 'description' => 'Find old questions, notes, and more.', 'link' => '#'],
                ['title' => 'Get Started', 'description' => 'Choose a course and semester to begin.', 'link' => '#'],
                ['title' => 'Need Help?', 'description' => 'Contact us for any assistance.', 'link' => '#']
            ];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $course = $_POST['course'];
                $semester = $_POST['semester'];

                if (isset($oldQuestions[$course][$semester])) {
                    $displayQuestions = $oldQuestions[$course][$semester];
                } else {
                    $displayQuestions = $defaultQuestions;
                }
            } else {
                $displayQuestions = $defaultQuestions;
            }

            foreach ($displayQuestions as $question) {
                echo '<div class="question-card">';
                echo '<div class="icon"><i class="fas fa-file-alt"></i></div>'; // Icon for the card
                echo '<h3>' . htmlspecialchars($question['title']) . '</h3>';
                echo '<p>' . htmlspecialchars($question['description']) . '</p>';
                echo '<a href="' . htmlspecialchars($question['link']) . '">View Question</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <!-- Social Section -->
        <div class="social-section">
            <h3>Follow Us</h3>
            <div class="social-links">
                <a href="" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copyright-section">
            <p>&copy; 2025 AnyNotes. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>