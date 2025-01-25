<aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/logo.png" />
                    <h2>ANY <span class="danger">NOTES</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp"> close </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./dashboard.php"><span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./users.php"><span class="material-icons-sharp"> person_outline</span>
                    <h3>Users</h3>
                </a>
                <a href="./studyMaterial.php">
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Study Materials</h3>
                </a>
                <a href="./course.php">
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Courses</h3>
                </a>
                <a href="./contribute.php">
                   <span><i class="fas fa-hand-holding-heart"></i></span> 
                    <h3>Contribution</h3>
                </a>
                <a href="./messages.php"><span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <?php if(isset($newCount) && $newCount > 0): ?>
                    <span class="message-count"><?php echo $newCount; ?></span>
                    <?php endif; ?>
                </a>

                <a href=""><span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                <a href=""><span class="material-icons-sharp">settings</span>
                    <h3>setting</h3>
                </a>
                <a href="./logout.php"><span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>