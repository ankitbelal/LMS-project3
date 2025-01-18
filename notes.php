<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./css/index.css"> <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="./css/nav.css"> <!-- Link to your navigation CSS file -->
    <style>
        /* Additional styles for the notes page */
        .container {
            padding: 20px;
            max-width: 1200px; /* Limit container width for better readability */
            margin: 0 auto; /* Center the container */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center-align everything inside the container */
        }

        .form-container {
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

        .notes-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Center-align cards */
        }

        .note-card {
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

        .note-card:hover {
            transform: translateY(-10px); /* Lift effect on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
        }

        .note-card h3 {
            margin-top: 0;
            color: #007BFF; /* Blue heading */
            font-size: 1.5rem; /* Larger font size for title */
        }

        .note-card p {
            margin: 10px 0;
            color: #555; /* Dark gray text */
            font-size: 1rem; /* Standard font size for description */
        }

        .note-card a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        .note-card a:hover {
            color: #0056b3; /* Darker blue on hover */
            text-decoration: underline;
        }

        .note-card .icon {
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

            .note-card {
                width: calc(50% - 20px); /* Two cards per row on medium screens */
            }
        }

        @media (max-width: 480px) {
            .note-card {
                width: 100%; /* Full width on small screens */
            }
        }

        /* New styles for heading and label */
        .selection-heading {
            font-size: 2rem;
            color: #007BFF;
            margin-bottom: 20px;
            text-align: center;
        }

        .selection-label {
            font-size: 1.2rem;
            color: #555;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'subnav.php'; ?>

    <div class="container">
        <!-- Heading above the selection part -->
        <h1 class="selection-heading">Notes</h1>

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
            <button type="submit">Show Notes</button>
        </div>

        <!-- Label below the selection part -->
        <p class="selection-label">Notes for BCA.</p>

        <div class="notes-container">
            <?php
            // Simulated data for notes with random subject names
            $notes = [
                'bba' => [
                    'semester1' => [
                        ['title' => 'Business Communication', 'description' => 'Effective communication in business environments.', 'link' => '#'],
                        ['title' => 'Financial Accounting', 'description' => 'Basics of financial accounting and reporting.', 'link' => '#'],
                        ['title' => 'Principles of Management', 'description' => 'Fundamentals of management theories.', 'link' => '#'],
                        ['title' => 'Business Mathematics', 'description' => 'Mathematical concepts for business applications.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Marketing Management', 'description' => 'Principles and practices of marketing.', 'link' => '#'],
                        ['title' => 'Organizational Behavior', 'description' => 'Understanding human behavior in organizations.', 'link' => '#'],
                        ['title' => 'Business Law', 'description' => 'Legal aspects of business operations.', 'link' => '#'],
                        ['title' => 'Economics for Managers', 'description' => 'Economic theories for managerial decision-making.', 'link' => '#']
                    ]
                ],
                'bca' => [
                    'semester1' => [
                        ['title' => 'Programming in C', 'description' => 'Introduction to C programming language.', 'link' => '#'],
                        ['title' => 'Discrete Mathematics', 'description' => 'Mathematical structures used in computer science.', 'link' => '#'],
                        ['title' => 'Computer Fundamentals', 'description' => 'Basics of computer systems and architecture.', 'link' => '#'],
                        ['title' => 'Digital Electronics', 'description' => 'Fundamentals of digital circuits.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Data Structures', 'description' => 'Fundamental data structures and algorithms.', 'link' => '#'],
                        ['title' => 'Database Systems', 'description' => 'Introduction to database management systems.', 'link' => '#'],
                        ['title' => 'Object-Oriented Programming', 'description' => 'Concepts of OOP using C++.', 'link' => '#'],
                        ['title' => 'Operating Systems', 'description' => 'Basics of operating system concepts.', 'link' => '#']
                    ]
                ],
                'computer_engineering' => [
                    'semester1' => [
                        ['title' => 'Engineering Mathematics', 'description' => 'Mathematical concepts for engineering.', 'link' => '#'],
                        ['title' => 'Basic Electronics', 'description' => 'Fundamentals of electronic circuits.', 'link' => '#'],
                        ['title' => 'Engineering Physics', 'description' => 'Physics principles for engineers.', 'link' => '#'],
                        ['title' => 'Engineering Drawing', 'description' => 'Basics of technical drawing.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Digital Logic Design', 'description' => 'Design and analysis of digital circuits.', 'link' => '#'],
                        ['title' => 'Data Structures', 'description' => 'Algorithms and data structures.', 'link' => '#'],
                        ['title' => 'Computer Organization', 'description' => 'Basics of computer architecture.', 'link' => '#'],
                        ['title' => 'Programming in Python', 'description' => 'Introduction to Python programming.', 'link' => '#']
                    ]
                ],
                'mba' => [
                    'semester1' => [
                        ['title' => 'Managerial Economics', 'description' => 'Economic theories for managerial decision-making.', 'link' => '#'],
                        ['title' => 'Financial Management', 'description' => 'Principles of financial management.', 'link' => '#'],
                        ['title' => 'Marketing Management', 'description' => 'Strategies for marketing products.', 'link' => '#'],
                        ['title' => 'Human Resource Management', 'description' => 'Managing human resources in organizations.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Strategic Management', 'description' => 'Formulation and implementation of business strategies.', 'link' => '#'],
                        ['title' => 'Marketing Research', 'description' => 'Techniques for conducting marketing research.', 'link' => '#'],
                        ['title' => 'Operations Management', 'description' => 'Managing production and operations.', 'link' => '#'],
                        ['title' => 'Business Analytics', 'description' => 'Using data for business decision-making.', 'link' => '#']
                    ]
                ],
                'mca' => [
                    'semester1' => [
                        ['title' => 'Advanced Java Programming', 'description' => 'Object-oriented programming in Java.', 'link' => '#'],
                        ['title' => 'Operating Systems', 'description' => 'Concepts and design of operating systems.', 'link' => '#'],
                        ['title' => 'Database Management Systems', 'description' => 'Design and management of databases.', 'link' => '#'],
                        ['title' => 'Software Engineering', 'description' => 'Principles of software development.', 'link' => '#']
                    ],
                    'semester2' => [
                        ['title' => 'Cloud Computing', 'description' => 'Basics of cloud computing and services.', 'link' => '#'],
                        ['title' => 'Web Technologies', 'description' => 'Building web applications using HTML, CSS, and JavaScript.', 'link' => '#'],
                        ['title' => 'Machine Learning', 'description' => 'Introduction to machine learning algorithms.', 'link' => '#'],
                        ['title' => 'Network Security', 'description' => 'Fundamentals of securing computer networks.', 'link' => '#']
                    ]
                ]
            ];

            // Default notes to display if no course/semester is selected
            $defaultNotes = [
                ['title' => 'Welcome to AnyNotes!', 'description' => 'Select a course and semester to view notes.', 'link' => '#'],
                ['title' => 'Explore Our Resources', 'description' => 'Find notes, old questions, and more.', 'link' => '#'],
                ['title' => 'Get Started', 'description' => 'Choose a course and semester to begin.', 'link' => '#'],
                ['title' => 'Need Help?', 'description' => 'Contact us for any assistance.', 'link' => '#']
            ];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $course = $_POST['course'];
                $semester = $_POST['semester'];

                if (isset($notes[$course][$semester])) {
                    $displayNotes = $notes[$course][$semester];
                } else {
                    $displayNotes = $defaultNotes;
                }
            } else {
                $displayNotes = $defaultNotes;
            }

            foreach ($displayNotes as $note) {
                echo '<div class="note-card">';
                echo '<div class="icon"><i class="fas fa-book"></i></div>'; // Icon for the card
                echo '<h3>' . htmlspecialchars($note['title']) . '</h3>';
                echo '<p>' . htmlspecialchars($note['description']) . '</p>';
                echo '<a href="' . htmlspecialchars($note['link']) . '">View Note</a>';
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