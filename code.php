<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Codes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="./css/nav.css"> <!-- Link to your navigation CSS file -->
    <style>
        /* Container for the entire page */
        .container {
            
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Form container for dropdowns */
        .form-container {
            
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        /* Dropdown styling */
        .form-container select {
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #007BFF;
            background-color: #f9f9f9;
            font-size: 1rem;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
            width: 200px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .form-container select:hover {
            border-color: #0056b3;
            background-color: #e9f5ff;
        }

        .form-container select:focus {
            outline: none;
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-container select:disabled {
            background-color: #e9ecef;
            border-color: #ced4da;
            cursor: not-allowed;
        }

        /* Heading for Course Codes */
        .course-codes-heading {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            background: linear-gradient(90deg, #ff6a6a, #ff0000, #ff1493, #ff4500, #ff6347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        /* Label for Course and Semester */
        .course-semester-label {
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
            background: linear-gradient(90deg, #ff6a6a, #ff0000, #ff1493, #ff4500, #ff6347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        /* Modern Table Styling */
        .codes-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .codes-table th,
        .codes-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .codes-table th {
            background-color: #007BFF;
            color: #fff;
            font-weight: bold;
        }

        .codes-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .codes-table tr:hover {
            background-color: #e9f5ff;
        }

        .codes-table td {
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
                align-items: center;
            }

            .form-container select {
                width: 100%;
            }

            .course-codes-heading {
                font-size: 1.5rem;
            }

            .course-semester-label {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'subnav.php'; ?>

    <?php
    // Include the Front class and create an instance
    include_once('classes/front.php');
    $front = new Front();

    // Fetch course data
    $courses = $front->getCourseId();

    // Fetch total semesters for each course
    $courseSemesters = [];
    foreach ($courses as $course) {
        $courseSemesters[$course['course_id']] = $front->getSemestersByCourse($course['course_id']);
    }

    // Get selected course and semester from the POST data
    $selectedCourse = $_POST['course'] ?? null;
    $selectedSemester = $_POST['semester'] ?? null;

    // Fetch subjects based on the selected course and semester
    $subjects = $front->getSubjects($selectedCourse, $selectedSemester);
    ?>

    <div class="container">
        <!-- Heading for Course Codes -->
        <h2 class="course-codes-heading">Course Codes</h2>

        <!-- Form Container with Dropdowns -->
        <div class="form-container">
            <form method="POST" action="">
                <select name="course" id="course" required onchange="this.form.submit()">
                    <option value="" disabled selected>Select Course</option>
                    <?php
                    // Dynamically populate the course dropdown with course codes
                    foreach ($courses as $course) {
                        $selected = ($selectedCourse == $course['course_id']) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($course['course_id']) . '" ' . $selected . '>' . htmlspecialchars($course['course_id']) . '</option>';
                    }
                    ?>
                </select>
                <select name="semester" id="semester" required onchange="this.form.submit()" <?php echo !$selectedCourse ? 'disabled' : ''; ?>>
                    <option value="" disabled selected>Select Semester</option>
                    <?php
                    if ($selectedCourse) {
                        $totalSemesters = $courseSemesters[$selectedCourse] ?? 0;
                        for ($i = 1; $i <= $totalSemesters; $i++) {
                            $selected = ($selectedSemester == $i) ? 'selected' : '';
                            echo '<option value="' . $i . '" ' . $selected . '>Semester ' . $i . '</option>';
                        }
                    }
                    ?>
                </select>
            </form>
        </div>

        <!-- Label for Course and Semester -->
        <div class="course-semester-label" id="course-semester-label">
            Course Codes for: 
            <span id="selected-course"><?php echo $selectedCourse ? htmlspecialchars($selectedCourse) : 'All Courses'; ?></span> - 
            <span id="selected-semester"><?php echo $selectedSemester ? 'Semester ' . htmlspecialchars($selectedSemester) : 'All Semesters'; ?></span>
        </div>

        <!-- Modern Table for Course Codes -->
        <table class="codes-table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Subject Name</th>
                    <th>Code</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($subjects)) {
                    $sn = 1;
                    foreach ($subjects as $subject) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($sn++) . '</td>';
                        echo '<td>' . htmlspecialchars($subject['subject_name']) . '</td>';
                        echo '<td>' . htmlspecialchars($subject['subject_id']) . '</td>';
                        echo '<td>' . htmlspecialchars($subject['semester']) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" style="text-align: center;">No subjects found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

   <?php include 'footer.php'; ?>
    <!-- JavaScript to Update Course and Semester Label -->
    <script>
        const courseSelect = document.getElementById('course');
        const semesterSelect = document.getElementById('semester');
        const selectedCourse = document.getElementById('selected-course');
        const selectedSemester = document.getElementById('selected-semester');

        // Data for total semesters per course
        const courseSemesters = <?php echo json_encode($courseSemesters); ?>;

        // Function to update the semester dropdown
        function updateSemesterDropdown() {
            const selectedCourseId = courseSelect.value;

            // Clear existing options
            semesterSelect.innerHTML = '<option value="" disabled selected>Select Semester</option>';

            // If no course is selected, disable the semester dropdown
            if (!selectedCourseId) {
                semesterSelect.disabled = true;
                selectedSemester.textContent = 'All Semesters'; // Reset semester label
                return;
            }

            // Enable the semester dropdown
            semesterSelect.disabled = false;

            // Get the total semesters for the selected course
            const totalSemesters = courseSemesters[selectedCourseId] || 0;

            // Populate the semester dropdown
            for (let i = 1; i <= totalSemesters; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = `Semester ${i}`;
                semesterSelect.appendChild(option);
            }

            // Update the label
            updateLabel();
        }

        // Function to update the label
        function updateLabel() {
            const course = courseSelect.value || 'All Courses';
            const semester = semesterSelect.value || 'All Semesters';
            selectedCourse.textContent = course;
            selectedSemester.textContent = semester === 'All Semesters' ? 'All Semesters' : `Semester ${semester}`;
        }

        // Add event listeners to dropdowns
        courseSelect.addEventListener('change', updateSemesterDropdown);
        semesterSelect.addEventListener('change', updateLabel);

        // Initialize the semester dropdown and label
        updateSemesterDropdown();
        updateLabel();
    </script>
</body>
</html>