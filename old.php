
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Question Papers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./css/nav.css"> <!-- Link to your navigation CSS file -->
    <style>
        /* Additional styles for the old question papers page */
        .container {
            padding: 20px;
            max-width: 1200px; /* Limit container width for better readability */
            margin: 40px auto; /* Center the container */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center-align everything inside the container */
        }

        .form-container {
            margin-bottom: 20px;
            display: flex;
            align-items: center; /* Center-align form elements horizontally */
            gap: 10px; /* Space between dropdowns */
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

        .form-container select:disabled {
            background-color: #e9ecef;
            border-color: #ced4da;
            cursor: not-allowed;
        }

        .papers-container {
            
            margin-top: 20px;
         
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Center-align cards */
        }

        .paper-card {
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

        .paper-card:hover {
            transform: translateY(-10px); /* Lift effect on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
            background: linear-gradient(135deg, rgb(85, 126, 202), rgb(215, 220, 229));
        }

        .pdf-preview {
            width: 100%;
            height: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .paper-card h3 {
            margin-top: 0;
            color: #007BFF; /* Blue heading */
            font-size: 1.5rem; /* Larger font size for title */
        }

        .paper-card p {
            
            margin: 10px 0;
            color: #555; /* Dark gray text */
            font-size: 1rem; /* Standard font size for description */
        }

        .paper-card button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            margin: 5px; /* Add margin between buttons */
        }

        .paper-card button:hover {
            background-color: #0056b3;
        }

        .paper-card a.download-button {
            padding: 10px 20px;
            background-color: #28a745; /* Green color for download button */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s ease;
            margin: 5px; /* Add margin between buttons */
        }

        .paper-card a.download-button:hover {
            background-color: #218838; /* Darker green on hover */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
           
            margin: 50% auto; /* Center the container */
        
          
            align-items: center; /* Center-align everything inside the container */
        }
            .form-container {
                flex-direction: column; /* Stack dropdowns vertically on small screens */
                align-items: center; /* Center-align vertically */
            }

            .form-container select {
                width: 100%; /* Full width on small screens */
            }

            .paper-card {
                width: calc(50% - 20px); /* Two cards per row on medium screens */
            }
        }

        @media (max-width: 480px) {
            .container {
           
           margin: 50% auto; /* Center the container */
       
         
           align-items: center; /* Center-align everything inside the container */
       }
           
            .paper-card {
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
 
    <?php include 'subnav.php'; ?>

    <?php
    // Include the Front class and create an instance
    include_once('classes/front.php');
    $front = new Front();

    // Fetch all course IDs from the database
    $courses = $front->getCourseId();

    // Get selected course and semester from the POST data
    $selectedCourse = $_POST['course'] ?? null;
    $selectedSemester = $_POST['semester'] ?? null;

    // Fetch old question papers based on the selected course and semester
    $questionPapers = $front->getQuestionPapers($selectedCourse, $selectedSemester);

    // Base URL for your website
    $baseUrl = "http://localhost:8080/uploads/"; // Replace with your actual domain
    ?>

    <div class="container">
        <!-- Heading above the selection part -->
        <h1 class="selection-heading">Old Question Papers</h1>

        <!-- Form Container with Dropdowns -->
        <div class="form-container">
            <form method="POST" action="">
                <select name="course" id="course" required onchange="this.form.submit()">
                    <option value="" disabled selected>Select Course</option>
                    <?php
                    // Dynamically populate the course dropdown with course IDs
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
                        $totalSemesters = $front->getSemestersByCourse($selectedCourse);
                        for ($i = 1; $i <= $totalSemesters; $i++) {
                            $selected = ($selectedSemester == $i) ? 'selected' : '';
                            echo '<option value="' . $i . '" ' . $selected . '>Semester ' . $i . '</option>';
                        }
                    }
                    ?>
                </select>
            </form>
        </div>

        <!-- Label below the selection part -->
        <p class="selection-label">
            Question Papers for: 
            <span id="selected-course"><?php echo $selectedCourse ? htmlspecialchars($selectedCourse) : 'All Courses'; ?></span> - 
            <span id="selected-semester"><?php echo $selectedSemester ? 'Semester ' . htmlspecialchars($selectedSemester) : 'All Semesters'; ?></span>
        </p>

        <div class="papers-container">
            <?php
            if (!empty($questionPapers)) {
                foreach ($questionPapers as $paper) {
                    // Construct the full URL for the file
                    $fileUrl = $baseUrl . $paper['file_name'];

                    // Use Google Docs Viewer for PDF preview
                    // $pdfPreviewUrl = 'https://docs.google.com/viewer?url=' . urlencode($fileUrl) . '&embedded=true';
                    echo '<div class="paper-card">';
                    echo '<div class="pdf-preview">';
                    echo '<iframe src="' . $fileUrl . '" width="100%" height="200px" style="border: none;"></iframe>';
                    echo '</div>';
                    echo '<h3>' . htmlspecialchars($paper['subject_name']) . '</h3>';
                    echo '<p>' . htmlspecialchars($paper['file_desc']) . '</p>';
                    echo '<button onclick="window.open(\'' . htmlspecialchars($fileUrl) . '\', \'_blank\')">Open Full View</button>';
                    echo '<a href="' . htmlspecialchars($fileUrl) . '" class="download-button" download>Download</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No question papers found.</p>';
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>