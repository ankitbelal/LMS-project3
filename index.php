<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css"> <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Font Awesome for icons -->
    <title>Homepage - AnyNotes</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <!-- Include Sub Navigation Bar -->
    <?php include 'subnav.php'; ?>

    <!-- Main Content -->
    <main>
        <section class="content-section">
            <h1 id="animated-heading">AnyNotes</h1>
            <p id="animated-text"></p>
            <h2 id="available-courses-heading">Available Courses</h2> <!-- New heading -->

            <!-- Faculties Section -->
            <div class="faculties-container">
                <?php
                // Include the Front class
                include_once('classes/front.php');
                $front = new Front();

                // Fetch all courses from the database
                $courses = $front->getAllCourses();

                // Define an array of icons for the courses
                $icons = [
                    'fas fa-briefcase', // BBA
                    'fas fa-laptop-code', // BCA
                    'fas fa-laptop', // Computer Engineering
                    'fas fa-building', // Civil Engineering
                    'fas fa-chart-line', // MBA
                    'fas fa-flask', // Electrical Engineering
                    // Add more icons as needed
                ];

                // Iterate over the courses and generate the cards
                foreach ($courses as $index => $course) {
                    $courseName = $course['course_name']; // Get course name
                     // Get course description
                    $icon = $icons[$index % count($icons)]; // Cycle through the icons array

                    echo '<div class="faculty-card">';
                    echo '<i class="' . $icon . '"></i>';
                    echo '<h3>' . $courseName . '</h3>';
                    echo '<p>' . 'Find Notes, Syllabuses, Course Codes, Old Question paper as well as
                    other reference material for the '.$courseName . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript for Animation -->
    <script>
        const heading = document.getElementById("animated-heading");
        const texts = [
            "AnyNotes",
            "Not4U",
            "AnyNotes",
            "Notes4U",
            "AnyNotes",
            "Notesforyou",
            "AnyNotes",
            "Not4you"
        ];
        let index = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeText() {
            const currentText = texts[index];
            if (!isDeleting) {
                heading.textContent = currentText.slice(0, charIndex + 1);
                charIndex++;
                if (charIndex === currentText.length) {
                    isDeleting = true;
                    setTimeout(typeText, 1000); // Pause before deleting
                } else {
                    setTimeout(typeText, 100); // Typing speed
                }
            } else {
                // Add a non-breaking space (&nbsp;) to prevent layout shift
                heading.textContent = currentText.slice(0, charIndex - 1) || '\u00A0'; // Use &nbsp; to maintain space
                charIndex--;
                if (charIndex === 0) {
                    isDeleting = false;
                    index = (index + 1) % texts.length; // Move to the next text
                }
                setTimeout(typeText, 50); // Deleting speed
            }
        }

        // Start the animation
        typeText();

        // Animation for the <p> tag
        const animatedText = document.getElementById("animated-text");
        const pTexts = [
            "study materials",
            "Notes",
            "old questions",
            "course codes",
            "syllabus"
        ];
        let pIndex = 0;
        let pCharIndex = 0;
        let pIsDeleting = false;

        function typePText() {
            const currentPText = pTexts[pIndex];
            if (!pIsDeleting) {
                animatedText.textContent = `All ${currentPText}`;
                pCharIndex++;
                if (pCharIndex === currentPText.length) {
                    pIsDeleting = true;
                    setTimeout(typePText, 1000); // Pause before deleting
                } else {
                    setTimeout(typePText, 100); // Typing speed
                }
            } else {
                // Add a non-breaking space (&nbsp;) to prevent layout shift
                animatedText.textContent = `All ${currentPText.slice(0, pCharIndex - 1) || '\u00A0'}`; // Use &nbsp; to maintain space
                pCharIndex--;
                if (pCharIndex === 0) {
                    pIsDeleting = false;
                    pIndex = (pIndex + 1) % pTexts.length; // Move to the next text
                }
                setTimeout(typePText, 50); // Deleting speed
            }
        }

        // Start the animation for the <p> tag
        typePText();
    </script>
</body>
</html>