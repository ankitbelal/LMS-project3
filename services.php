<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/nav.css">
    <!-- Additional CSS for services page -->
    <link rel="stylesheet" href="./css/services.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Services - Anynote</title>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <!-- Services Section -->
        <section class="services-section">
            <div class="container">
                <h1>Our Services</h1>
                <p>Anynote provides a wide range of academic resources to help students excel in their studies. Below are the services we offer:</p>

                <div class="services-grid">
                    <!-- Service 1: Notes -->
                    <div class="service-card">
                        <i class="fas fa-book-open"></i>
                        <h2>Subject Notes</h2>
                        <p>Access comprehensive notes for various subjects under Pokhara University. Our notes are curated by experts to help you understand complex topics easily.</p>
                    </div>

                    <!-- Service 2: Old Questions -->
                    <div class="service-card">
                        <i class="fas fa-question-circle"></i>
                        <h2>Old Questions</h2>
                        <p>Get access to previous years' question papers to help you prepare for your exams effectively. Practice with real exam questions and improve your performance.</p>
                    </div>

                    <!-- Service 3: Course Codes -->
                    <div class="service-card">
                        <i class="fas fa-code"></i>
                        <h2>Course Codes</h2>
                        <p>Find the course codes for all subjects offered by Pokhara University. Easily locate the courses you need for your academic journey.</p>
                    </div>

                    <!-- Service 4: Syllabuses -->
                    <div class="service-card">
                        <i class="fas fa-clipboard-list"></i>
                        <h2>Syllabuses</h2>
                        <p>Download the latest syllabuses for different faculties and subjects. Stay updated with the course content and plan your studies accordingly.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Anynote. All rights reserved.</p>
    </footer>
</body>
</html>