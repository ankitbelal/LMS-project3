<?php
include_once 'navbar.php';
include_once 'classes/front.php'; // Include the Front class

// Create an instance of the Front class
$front = new Front();

// Fetch all course IDs from the database using the getCourseId() method
$courseIds = $front->getCourseId();

// Get selected course, semester, and subject from the GET data
$selectedCourse = $_GET['course'] ?? null;
$selectedSemester = $_GET['semester'] ?? null;
$selectedSubject = $_GET['subject'] ?? null;

// Fetch subjects based on the selected course and semester
$subjects = [];
if ($selectedCourse && $selectedSemester) {
    $subjects = $front->getSubjects($selectedCourse, $selectedSemester);
}

// Variables to store success/error messages
$message = '';
$messageType = ''; // 'success' or 'error'

// Handle form submission for file upload (still using POST for file upload)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Get form data
    $courseId = $_POST['course'];
    $semester = $_POST['semester'];
    $subjectId = $_POST['subject'];
    $resourceType = $_POST['resource-type'];
    $description = $_POST['resource-description'];
    $file = $_FILES['file-upload'];
    $email = $_SESSION['email'] ?? ''; // Assuming the user's email is stored in the session

    try {
        // Upload the file and get the new file name
        $newFileName = $front->uploadFile($file, $courseId, $semester, $subjectId, $resourceType, $description, $email);

        // Success message
        $message = 'File uploaded successfully!';
        $messageType = 'success';
    } catch (Exception $e) {
        // Error message
        $message = 'Error: ' . $e->getMessage();
        $messageType = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribute Resource Form</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Body and Container Styles */
        body {
            display:block;
            flex-direction: column;
            background: url("") no-repeat fixed;
            background-size: cover;
            background-position: center;
            user-select: none;
            align-items: center;
            font-family: Arial, sans-serif;
           
        }

        .form-container {
         
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; /* Increased max-width to accommodate two columns */
             /* Add margin to avoid overlap with the navbar */
            margin:10% auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #333;
        }

        /* Form Group Styles */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group select,
        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px; /* Rounded corners */
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-sizing: border-box; /* Ensures padding is included in width/height */
        }

        .form-group select:hover,
        .form-group input[type="text"]:hover,
        .form-group input[type="file"]:hover,
        .form-group textarea:hover {
            border-color: #6a11cb;
        }

        .form-group select:focus,
        .form-group input[type="text"]:focus,
        .form-group input[type="file"]:focus,
        .form-group textarea:focus {
            border-color: #6a11cb;
            outline: none;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.6);
            border-image: linear-gradient(135deg, #6a11cb, #2575fc);
            border-image-slice: 1;
        }

        .form-group textarea {
            resize: vertical; /* Allows vertical resizing */
            height: 100px; /* Fixed height for textarea */
        }

        .form-group input[type="submit"] {
            width: 30%; /* Narrower button */
            padding: 10px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 25px; /* Rounded edges */
            font-size: 1rem;
            cursor: pointer;
            transition:  0.3s ease, transform 0.2s ease;
        }

        .form-group input[type="submit"]:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.05); /* Slight zoom effect on hover */
        }

        /* Two-column layout */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between columns */
        }

        .form-row .form-group {
            flex: 1 1 calc(50% - 10px); /* Two columns with gap */
        }

        /* Full width for textarea and file upload */
        .form-row .form-group.full-width {
            flex: 1 1 100%;
        }

        /* Message box styles */
        .message-box {
           
            margin: 0 auto;
            width: 50%;
            padding: 15px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px; /* Space between message box and submit button */
            display: none; /* Hidden by default */
        }

        .message-box.success {
            background-color:rgb(34, 88, 35); /* Green for success */
        }

        .message-box.error {
            background-color:rgb(158, 42, 34); /* Red for error */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                margin: 30% auto; /* Reduce top margin for smaller screens */
                max-width: 90%; /* Reduce max-width for smaller screens */
            }

            .form-row .form-group {
                flex: 1 1 100%; /* Stack form fields in one column on smaller screens */
            }

            .form-group input[type="submit"] {
                width: 50%; /* Full-width button on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .form-container {
                margin: 50% auto; /* Reduce top margin for very small screens */
            }

            h2 {
                font-size: 1.5rem; /* Smaller heading for very small screens */
            }

            .form-group select,
            .form-group input[type="text"],
            .form-group input[type="file"],
            .form-group textarea {
                font-size: 0.9rem; /* Smaller font size for inputs on very small screens */
            }

            .form-group input[type="submit"] {
                width: 50%; /* Full-width button on very small screens */
                font-size: 0.9rem; /* Smaller font size for button on very small screens */
            }
        }
    </style>
</head>
<body>
    <?php include 'subnav.php'; ?>
    <div class="form-container">
        <h2>Contribute</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <!-- Course Selection -->
                <div class="form-group">
                    <label for="course">Select Course:</label>
                    <select id="course" name="course" required onchange="this.form.submit()">
                        <option value="" disabled selected>Select Course</option>
                        <?php
                        // Dynamically populate the course dropdown with course IDs
                        foreach ($courseIds as $course) {
                            $selected = ($selectedCourse == $course['course_id']) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($course['course_id']) . '" ' . $selected . '>' . htmlspecialchars($course['course_id']) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- Semester Selection -->
                <div class="form-group">
                    <label for="semester">Select Semester:</label>
                    <select id="semester" name="semester" required onchange="this.form.submit()" <?php echo !$selectedCourse ? 'disabled' : ''; ?>>
                        <option value="" disabled selected>Select Semester</option>
                        <?php
                        if ($selectedCourse) {
                            // Fetch the total number of semesters for the selected course
                            $totalSemesters = $front->getSemestersByCourse($selectedCourse);
                            for ($i = 1; $i <= $totalSemesters; $i++) {
                                $selected = ($selectedSemester == $i) ? 'selected' : '';
                                echo '<option value="' . $i . '" ' . $selected . '>Semester ' . $i . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Subject Selection -->
            <div class="form-row">
                <div class="form-group">
                    <label for="subject">Select Subject:</label>
                    <select id="subject" name="subject" required <?php echo !$selectedCourse || !$selectedSemester ? 'disabled' : ''; ?>>
                        <option value="" disabled selected>Select Subject</option>
                        <?php
                        if ($selectedCourse && $selectedSemester) {
                            // Fetch subjects based on the selected course and semester
                            foreach ($subjects as $subject) {
                                $selected = ($selectedSubject == $subject['subject_id']) ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($subject['subject_id']) . '" ' . $selected . '>' . htmlspecialchars($subject['subject_name']) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Resource Type Selection -->
                <div class="form-group">
                    <label for="resource-type">Select Resource Type:</label>
                    <select id="resource-type" name="resource-type" required>
                        <option value="">--Select Resource Type--</option>
                        <option value="Notes">Note</option>
                        <option value="Syllabus">Syllabus</option>
                        <option value="Old Questions">Question Paper</option>
                    </select>
                </div>
            </div>

            <!-- Resource Description -->
            <div class="form-row">
                <div class="form-group full-width">
                    <label for="resource-description">Resource Description:</label>
                    <textarea id="resource-description" name="resource-description" placeholder="Enter resource description" required></textarea>
                </div>
            </div>

            <!-- File Upload -->
            <div class="form-row">
                <div class="form-group full-width">
                    <label for="file-upload">Upload File:</label>
                    <input type="file" id="file-upload" name="file-upload" accept=".pdf,.doc,.docx,.txt" required>
                </div>
            </div>

            <!-- Message Box -->
            <?php if ($message): ?>
                <div id="messageBox" class="message-box <?php echo $messageType; ?>">
                    <?php echo $message; ?>
                </div>
                <script>
                    // Show the message box
                    document.getElementById('messageBox').style.display = 'block';

                    // Hide the message box after 5 seconds
                    setTimeout(function() {
                        document.getElementById('messageBox').style.display = 'none';
                        window.location.href = 'contribution.php'; // Redirect to the same page to clear GET parameters
                    }, 1000);
                </script>
            <?php endif; ?>

            <!-- Submit Button -->
            <div class="form-row">
                <div class="form-group" style="text-align: center;">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>

    <script>
        // Update the form action to include GET parameters for dynamic dropdowns
        document.querySelector('form').addEventListener('change', function(event) {
            if (event.target.name === 'course' || event.target.name === 'semester') {
                const form = event.target.form;
                const formData = new FormData(form);
                const params = new URLSearchParams(formData).toString();
                window.location.href = `contribute.php?${params}`;
            }
        });
    </script>
</body>
</html>