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

            <!-- Faculties Section -->
            <div class="faculties-container">
                <div class="faculty-card">
                    <i class="fas fa-briefcase"></i>
                    <h3>BBA (Bachelor of Business Administration)</h3>
                    <p>Explore courses in Business Administration, Finance, Marketing, and Management.</p>
                </div>
                <div class="faculty-card">
                    <i class="fas fa-laptop-code"></i>
                    <h3>BCA (Bachelor of Computer Applications)</h3>
                    <p>Learn programming, software development, and computer applications.</p>
                </div>
                <div class="faculty-card">
                    <i class="fas fa-laptop"></i>
                    <h3>Computer Engineering</h3>
                    <p>Study computer systems, software engineering, and hardware design.</p>
                </div>
                <div class="faculty-card">
                    <i class="fas fa-building"></i>
                    <h3>Civil Engineering</h3>
                    <p>Explore structural design, construction, and infrastructure development.</p>
                </div>
                <div class="faculty-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>MBA (Master of Business Administration)</h3>
                    <p>Advanced studies in business strategy, leadership, and management.</p>
                </div>
                <div class="faculty-card">
                    <i class="fas fa-flask"></i>
                    <h3>Electrical Engineering</h3>
                    <p>Learn about electrical systems, circuits, and power generation.</p>
                </div>
            </div>
        </section>
    </main>

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