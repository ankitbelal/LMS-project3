<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Codes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./css/index.css"> <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="./css/nav.css"> <!-- Link to your navigation CSS file -->
    <style>
        /* Additional styles for the course codes page */
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

        /* Heading for Course Codes */
        .course-codes-heading {
            font-size: 2rem;
            margin-bottom: 20px; /* Space below the heading */
            text-align: center; /* Center-align the heading */
            background: linear-gradient(90deg, #ff6a6a, #ff0000, #ff1493, #ff4500, #ff6347); /* Gradient red with multiple colors */
            -webkit-background-clip: text; /* Clip text to the background */
            -webkit-text-fill-color: transparent; /* Make text transparent */
            display: inline-block; /* Ensure gradient applies correctly */
        }

        /* Label for Course and Semester */
        .course-semester-label {
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center; /* Center-align the label */
            background: linear-gradient(90deg, #ff6a6a, #ff0000, #ff1493, #ff4500, #ff6347); /* Gradient red with multiple colors */
            -webkit-background-clip: text; /* Clip text to the background */
            -webkit-text-fill-color: transparent; /* Make text transparent */
            display: inline-block; /* Ensure gradient applies correctly */
        }

        /* Modern Table Styling */
        .codes-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Ensure rounded corners are visible */
        }

        .codes-table th,
        .codes-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Light border between rows */
        }

        .codes-table th {
            background-color: #007BFF; /* Blue header background */
            color: #fff; /* White text for headers */
            font-weight: bold;
        }

        .codes-table tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternate row color */
        }

        .codes-table tr:hover {
            background-color: #e9f5ff; /* Light blue background on hover */
        }

        .codes-table td {
            color: #333; /* Dark gray text for table data */
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

            .codes-table {
                display: block;
                overflow-x: auto; /* Enable horizontal scrolling on small screens */
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'subnav.php'; ?>

    <div class="container">
        <!-- Heading for Course Codes -->
        <h2 class="course-codes-heading">Course Codes</h2>

        <div class="form-container">
            <select name="course" id="course" required>
                <option value="" disabled selected>Select Course</option>
                <option value="bba">BBA</option>
                <option value="bca">BCA</option>
                <option value="computer_engineering">Computer Engineering</option>
                <option value="mba">MBA</option>
                <option value="mca">MCA</option>
            </select>
            <select name="semester" id="semester" required>
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
            <button type="submit">Show Course Codes</button>
        </div>

        <!-- Label for Course and Semester -->
        <div class="course-semester-label" id="course-semester-label">
            Course Codes for: <span id="selected-course">All Courses</span> - <span id="selected-semester">All Semesters</span>
        </div>

        <!-- Modern Table for Course Codes -->
        <table class="codes-table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Subject Name</th>
                    <th>Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Simulated data for course codes
                $courseCodes = [
                    ['sn' => 1, 'subject' => 'Business Communication', 'code' => 'BC101'],
                    ['sn' => 2, 'subject' => 'Financial Accounting', 'code' => 'FA102'],
                    ['sn' => 3, 'subject' => 'Principles of Management', 'code' => 'PM103'],
                    ['sn' => 4, 'subject' => 'Business Mathematics', 'code' => 'BM104'],
                    ['sn' => 5, 'subject' => 'Marketing Management', 'code' => 'MM105'],
                    ['sn' => 6, 'subject' => 'Organizational Behavior', 'code' => 'OB106'],
                ];

                foreach ($courseCodes as $code) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($code['sn']) . '</td>';
                    echo '<td>' . htmlspecialchars($code['subject']) . '</td>';
                    echo '<td>' . htmlspecialchars($code['code']) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
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

    <!-- JavaScript to Update Course and Semester Label -->
    <script>
        const courseSelect = document.getElementById('course');
        const semesterSelect = document.getElementById('semester');
        const selectedCourse = document.getElementById('selected-course');
        const selectedSemester = document.getElementById('selected-semester');

        // Function to update the label
        function updateLabel() {
            const course = courseSelect.value || 'All Courses';
            const semester = semesterSelect.value || 'All Semesters';
            selectedCourse.textContent = course;
            selectedSemester.textContent = semester;
        }

        // Add event listeners to dropdowns
        courseSelect.addEventListener('change', updateLabel);
        semesterSelect.addEventListener('change', updateLabel);

        // Initialize the label
        updateLabel();
    </script>
</body>
</html>