<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Faculty</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/faculty.css" />

    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
    <?php include_once('includes/sidebar.php'); ?>
        <div class="main-section">
            <!-- Right section at the top -->
            <div class="right">
                <div class="top">
                    <!-- Menu button, theme toggler, and profile on the right -->
                    <div class="right-elements">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp">dark_mode</span>
                        </div>
                        <div class="profile">
                            <div class="info">
                                <p>Hey, <b>Daniel</b></p>
                                <small class="text-muted">Admin</small>
                            </div>
                            <div class="profile-photo">
                                <span class="material-icons-sharp">
                                    account_circle
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--MAIN SECTION-->
            <main>
                <!-- Faculty Table -->
                <div class="table-container">
                    <h2>Faculty List</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Faculty ID</th>
                                <th>Faculty Name</th>
                                <th>Total Semester</th>
                                <th>Total Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td>F001</td>
                                <td>BE Comp</td>
                                <td>8</td>
                                <td>40</td>
                                <td>
                                    <button class="edit-btn">Edit</button>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Subject Table -->
                <div class="table-container">
                    <h2>Subject List</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <th>Semester</th>
                                <th>Faculty</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td>S001</td>
                                <td>Data Structures</td>
                                <td>3</td>
                                <td>BE Comp</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Faculty and Subject Forms Container -->
<div class="forms-container">
    <!-- Faculty Form Section -->
    <div class="faculty-form">
        <h2>Add Faculty</h2>
        <form id="facultyForm">
            <div class="form-group">
                <label for="faculty-id">Faculty ID</label>
                <input type="text" id="faculty-id" name="faculty-id" required />
            </div>
            <div class="form-group">
                <label for="faculty-name">Faculty Name</label>
                <input type="text" id="faculty-name" name="faculty-name" required />
            </div>
            <div class="form-group">
                <label for="total-semester">Total Semester</label>
                <input type="number" id="total-semester" name="total-semester" required />
            </div>
            <div class="form-group">
                <label for="total-subject">Total Subject</label>
                <input type="number" id="total-subject" name="total-subject" required />
            </div>
            <button type="submit" class="btn-primary">Add Faculty</button>
        </form>
    </div>

    <!-- Subject Form Section -->
    <div class="subject-form">
        <h2>Add Subject</h2>
        <form id="subjectForm">
            <div class="form-group">
                <label for="subject-id">Subject ID</label>
                <input type="text" id="subject-id" name="subject-id" required />
            </div>
            <div class="form-group">
                <label for="subject-name">Subject Name</label>
                <input type="text" id="subject-name" name="subject-name" required />
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="number" id="semester" name="semester" required />
            </div>
            <div class="form-group">
                <label for="faculty">Faculty</label>
                <select id="faculty" name="faculty">
                    <option value="BE Comp">BE Comp</option>
                    <option value="BE IT">BE IT</option>
                    <option value="BE Mech">BE Mech</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Add Subject</button>
        </form>
    </div>
</div>
            </main>
        </div>
    </div>
    <script src="./index.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const facultyForm = document.getElementById('facultyForm');
    const subjectForm = document.getElementById('subjectForm');
    const facultyTableBody = document.querySelector('.table-container:first-of-type tbody');
    const subjectTableBody = document.querySelector('.table-container:last-of-type tbody');

    facultyForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const facultyId = document.getElementById('faculty-id').value;
        const facultyName = document.getElementById('faculty-name').value;
        const totalSemester = document.getElementById('total-semester').value;
        const totalSubject = document.getElementById('total-subject').value;

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${facultyId}</td>
            <td>${facultyName}</td>
            <td>${totalSemester}</td>
            <td>${totalSubject}</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        `;
        facultyTableBody.appendChild(newRow);
        facultyForm.reset();
    });

    subjectForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const subjectId = document.getElementById('subject-id').value;
        const subjectName = document.getElementById('subject-name').value;
        const semester = document.getElementById('semester').value;
        const faculty = document.getElementById('faculty').value;

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${subjectId}</td>
            <td>${subjectName}</td>
            <td>${semester}</td>
            <td>${faculty}</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        `;
        subjectTableBody.appendChild(newRow);
        subjectForm.reset();
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('edit-btn')) {
            const row = e.target.closest('tr');
            const cells = row.querySelectorAll('td');
            if (row.closest('tbody') === facultyTableBody) {
                document.getElementById('faculty-id').value = cells[0].textContent;
                document.getElementById('faculty-name').value = cells[1].textContent;
                document.getElementById('total-semester').value = cells[2].textContent;
                document.getElementById('total-subject').value = cells[3].textContent;
                facultyForm.querySelector('h2').textContent = 'Update Faculty';
                facultyForm.querySelector('button').textContent = 'Update Faculty';
            } else {
                document.getElementById('subject-id').value = cells[0].textContent;
                document.getElementById('subject-name').value = cells[1].textContent;
                document.getElementById('semester').value = cells[2].textContent;
                document.getElementById('faculty').value = cells[3].textContent;
                subjectForm.querySelector('h2').textContent = 'Update Subject';
                subjectForm.querySelector('button').textContent = 'Update Subject';
            }
        }

        if (e.target.classList.contains('delete-btn')) {
            const row = e.target.closest('tr');
            row.remove();
        }
    });
});
    </script>
</body>

</html>