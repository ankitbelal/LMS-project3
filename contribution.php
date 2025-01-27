<?php
session_start(); // Start the session to access user data
if (!isset($_SESSION['email'])) { // Check if the user is not logged in
    header("Location: login.php"); // Redirect to login if the user is not logged in
    exit();
}
include 'navbar.php';
// session_start(); // Start the session to access user data
include_once('classes/front.php'); // Include the Front class

// Check if the user is logged in


// Initialize the Front class
$front = new Front();

// Fetch contributions for the logged-in user
$userEmail = $_SESSION['email']; // Get the user's email from the session
$contributions = $front->getContributionsByUser($userEmail); // Fetch contributions by the user
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Contributions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
       /* Container for the entire page */
.container {
    padding: 20px;
    max-width: 1200px;
    margin: 100px auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Header Container for Heading and Button */
.header-container {
    display: flex;
    justify-content: space-between; /* Space between heading and button */
    align-items: center; /* Center vertically */
    width: 100%;
    margin-bottom: 20px;
}

/* Heading for Contributions */
.contributions-heading {
    font-size: 2rem;
    text-align: center;
    background: linear-gradient(90deg, #ff6a6a, #ff0000, #ff1493, #ff4500, #ff6347);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
    margin-left:200px; /* Remove default margin */
}

/* Contribute Button Styling */
.contribute-button {
    padding: 10px 20px;
    background-color:rgb(26, 104, 68);
    color: #fff;
    border: none;
    border-radius: 25px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
   
}

.contribute-button:hover {
    background-color: #0056b3;
}

/* Modern Table Styling */
.contributions-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.contributions-table th,
.contributions-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.contributions-table th {
    background-color: #007BFF;
    color: #fff;
    font-weight: bold;
}

.contributions-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.contributions-table tr:hover {
    background-color: #e9f5ff;
}

.contributions-table td {
    color: #333;
}

/* Status Styling */
.status-pending {
    color: #ffc107; /* Yellow for pending */
}

.status-approved {
    color:rgb(23, 102, 41); /* Green for approved */
}

.status-rejected {
    color: #dc3545; /* Red for rejected */
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        margin:50% auto; /* Adjusted margin for mobile */
    }

    .contributions-heading {
        margin:0 auto; /* Remove margin for mobile */
        font-size: 1.5rem; /* Smaller heading for mobile */
    }

    .contributions-table th,
    .contributions-table td {
        padding: 10px; /* Smaller padding for mobile */
    }

    .header-container {
       
        align-items: center; /* Align items to the start */
    }

    .contribute-button {
        margin-left: 0; /* Remove auto margin on mobile */
        margin-top: 10px; /* Add space between heading and button */
       
    }
}
    </style>
</head>
<body>
    <?php include 'subnav.php'; ?>

    <div class="container">
        <!-- Header Container for Heading and Button -->
        <div class="header-container">
            <!-- Heading for Contributions -->
            <h2 class="contributions-heading">Your Contributions</h2>

            <!-- Contribute Button -->
            <button class="contribute-button" onclick="window.location.href='contribute.php'">
                <i class="fas fa-plus"></i> Contribute
            </button>
        </div>

        <!-- Modern Table for Contributions -->
        <table class="contributions-table">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Semester</th>
                    <th>Subject Name</th>
                    <th>Type</th>
                    <th>Uploaded Date</th>
                    <th>File Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contributions)): ?>
                    <?php foreach ($contributions as $contribution): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contribution['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($contribution['semester']); ?></td>
                            <td><?php echo htmlspecialchars($contribution['subject_name']); ?></td>
                            <td><?php echo htmlspecialchars($contribution['content_type']); ?></td>
                            <td><?php echo htmlspecialchars($contribution['uploaded_at']); ?></td>
                            <td><?php echo htmlspecialchars($contribution['file_name']); ?></td>
                            <td class="status-<?php echo strtolower(htmlspecialchars($contribution['status'])); ?>">
                                <?php echo htmlspecialchars($contribution['status']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No contributions found for your account.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>