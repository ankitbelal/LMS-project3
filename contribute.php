<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribute Resource Form</title>
    <link rel="stylesheet" href="./css/nav.css"> <!-- Ensure the path to nav.css is correct -->
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            display: flex;
            flex-direction: column;
            
            background: url("") no-repeat fixed;
            background-size: cover;
            background-position: center;
            user-select: none;
           
        
            align-items: center;
        }

        /* Sub Navigation Bar - Full Width */
        /* Sub Navigation Bar */
     

        .form-container {
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 80px; /* Add margin to avoid overlap with the navbar */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #333;
        }

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
            width: 50%; /* Narrower button */
            padding: 10px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 25px; /* Rounded edges */
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .form-group input[type="submit"]:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.05); /* Slight zoom effect on hover */
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?> <!-- Include the navbar here -->
    <?php include 'subnav.php'; ?> <!-- Include the sub-navigation bar here -->

    <div class="form-container">
        <h2>Contribute</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <!-- Course Selection -->
            <div class="form-group">
                <label for="course">Select Course:</label>
                <select id="course" name="course" required>
                    <option value="">--Select Course--</option>
                    <option value="bba">BBA (Bachelor of Business Administration)</option>
                    <option value="bca">BCA (Bachelor of Computer Applications)</option>
                    <option value="civil-engineering">Civil Engineering</option>
                    <option value="computer-engineering">Computer Engineering</option>
                    <option value="mba">MBA (Master of Business Administration)</option>
                    <option value="mechanical-engineering">Mechanical Engineering</option>
                    <option value="electrical-engineering">Electrical Engineering</option>
                    <option value="electronics-engineering">Electronics Engineering</option>
                    <option value="it">Information Technology (IT)</option>
                    <option value="biotechnology">Biotechnology</option>
                    <option value="pharmacy">Pharmacy</option>
                    <option value="law">Law</option>
                    <option value="architecture">Architecture</option>
                    <option value="hospitality-management">Hospitality Management</option>
                </select>
            </div>

            <!-- Semester Selection -->
            <div class="form-group">
                <label for="semester">Select Semester:</label>
                <select id="semester" name="semester" required>
                    <option value="">--Select Semester--</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>

            <!-- Subject Selection -->
            <div class="form-group">
                <label for="subject">Select Subject:</label>
                <select id="subject" name="subject" required>
                    <option value="">--Select Subject--</option>
                    <option value="mathematics">Mathematics</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="computer-science">Computer Science</option>
                    <option value="business-management">Business Management</option>
                    <option value="economics">Economics</option>
                    <option value="accounting">Accounting</option>
                    <option value="engineering-drawing">Engineering Drawing</option>
                    <option value="programming">Programming</option>
                    <option value="database-management">Database Management</option>
                    <option value="networking">Networking</option>
                    <option value="software-engineering">Software Engineering</option>
                    <option value="data-structures">Data Structures</option>
                    <option value="algorithms">Algorithms</option>
                    <option value="artificial-intelligence">Artificial Intelligence</option>
                </select>
            </div>

            <!-- Resource Type Selection -->
            <div class="form-group">
                <label for="resource-type">Select Resource Type:</label>
                <select id="resource-type" name="resource-type" required>
                    <option value="">--Select Resource Type--</option>
                    <option value="note">Note</option>
                    <option value="syllabus">Syllabus</option>
                    <option value="question-paper">Question Paper</option>
                </select>
            </div>

            <!-- Resource Description -->
            <div class="form-group">
                <label for="resource-description">Resource Description:</label>
                <textarea id="resource-description" name="resource-description" placeholder="Enter resource description" required></textarea>
            </div>

            <!-- File Upload -->
            <div class="form-group">
                <label for="file-upload">Upload File:</label>
                <input type="file" id="file-upload" name="file-upload" accept=".pdf,.doc,.docx,.txt" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group" style="text-align: center;">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>