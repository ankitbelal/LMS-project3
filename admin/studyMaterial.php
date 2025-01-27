<?php 
     require_once('../configs/config.php');
     require_once('../classes/materialCRUD.php');
     require '../classes/User.php';
     session_start();
     if(!isset($_SESSION['username']) && !isset($_SESSION['is_admin'])){
         header("Location:".BASE_PATH."/admin");
     }
     $info = new User();
    $username = $_SESSION['username'];
    $userData = $info->getData($username);

    // Split full name into first name
    $fullName = $userData['name'];
    $names = explode(' ', $fullName);
    $firstName = isset($names[0]) ? $names[0] : '';
    $material=new materialCRUD();
    $materialinfo=$material->getMaterials();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!--STYLESHEET-->
    <link rel="stylesheet" href="./css/studyMaterial.css"/>
    <script src="./htmx.js"></script>   
    <!--MATERIAL  CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>

<body>
    <div class="container">
    <?php include_once('includes/sidebar.php');?>
        <div class="main-section">
            <!-- Right section at the top -->    
        <div class="right">
          <div class="top">
            <h1>Study Materials</h1>
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
                  <p>Hey, <b><?php echo htmlspecialchars($firstName); ?></b></p>
                  <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                  <span class="material-icons-sharp">account_circle</span>
                </div>
              </div>
            </div>
          </div>
        </div>

            <!--MAIN SECTION-->
            <main>
                    <!-- Study Material Table -->
                    <div class="table-container">
                        <div class="table-header">
                        <h2>Study Materials</h2>
                        <button class="add-btn" onclick="window.location.href='./addMaterial.php'">Add Material</button>
                    </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Semester</th>
                                        <th>Subject</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>File Name</th>
                                        <th>Uploaded At</th>
                                        <th>Edit | Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-1">
                                    <?php
                                    $i=1;
                                    foreach($materialinfo as $material){
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($material['course_id']);?></td>
                                        <td><?php echo htmlspecialchars($material['semester']);?></td>
                                        <td><?php echo htmlspecialchars($material['subject_name']);?></td>
                                        <td><?php echo htmlspecialchars($material['material_type']);?></td>
                                        <td class="description">
                                            <?php
                                            $description = htmlspecialchars($material['file_desc']);
                                            $preview = strlen($description) > 20 ? substr($description, 0, 20) . '...' : $description;
                                            echo $preview;
                                            ?>
                                            <a href="#" class="read-more" data-full-description="<?php echo htmlspecialchars($material['file_desc']); ?>">Read More</a>
                                        </td>
                                        <td><?php echo htmlspecialchars($material['file_name']);?></td>
                                        <td><?php echo htmlspecialchars($material['uploaded_at']);?></td>
                                        <td>
                                    <div class="button-container">
                                        <button class="edit-btn" onclick="window.location.href='./updateMaterial.php?id=<?php echo $material['material_id'];?>&courseId=<?php echo $material['course_id'];?>'">Edit</button>
                                        <button class="delete-btn" hx-delete="deleteMaterials.php?id=<?php echo $material['material_id'];?>" hx-target="#tbody-1" hx-swap="outerHTML"  hx-confirm="Are you sure you want to delete this row?">Delete</button>
                                    </div>
                                </td>
                                    </tr>
                                    <?php $i++;}?>    
                                </tbody>
                            </table>
                    </div>
                
            </main>
        </div>
    </div>
    <div id="descriptionModal" class="modal">
    <div class="modal-content">
        <p id="modalDescription"></p>
    </div>
    </div>
    <script src="./index.js"></script>
    <script>
       
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('descriptionModal');
        const modalDescription = document.getElementById('modalDescription');
        

        // Open modal when "Read More" is clicked
        document.querySelectorAll('.read-more').forEach(link => {   
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default link behavior
                const fullDescription = link.getAttribute('data-full-description');
                modalDescription.textContent = fullDescription;
                modal.style.display = 'block';
            });
        });

        // Close modal when clicking outside the modal
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });

    </script>
</body>

</html>