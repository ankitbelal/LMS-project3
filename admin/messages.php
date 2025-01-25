
<?php 
  session_start();
  require_once('../configs/config.php');
  require_once('../classes/User.php');
  require_once('../classes/Contact.php');
  
  if(!isset($_SESSION['username']) || !$_SESSION['is_admin']){
    header("Location:".BASE_PATH."/admin");
    exit();
  }

  $contact = new Contact();
//   $submissions = $contact->getAllSubmissions();
//   $newCount = $contact->getUnresolvedCount(); // Method to count new/unresolved messages
$submissions=23;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Messages - Admin Dashboard</title>
  <link rel="stylesheet" href="/admin/css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
</head>
<body>
  <div class="container">
    <?php include_once('includes/sidebar.php'); ?>
    <div class="main-section">
      <?php include_once('includes/right.php'); ?>
      
      <main>
        <div class="recents">
          <div class="header">
            <h2>Contact Messages (<?php echo count($submissions); ?>)</h2>
            <div class="controls">
              <div class="search-filter">
                <input type="text" placeholder="Search messages..." id="searchInput">
                <select id="statusFilter">
                  <option value="all">All Messages</option>
                  <option value="new">New</option>
                  <option value="replied">Replied</option>
                  <option value="resolved">Resolved</option>
                </select>
              </div>
              <button class="refresh-btn" onclick="location.reload()">
                <span class="material-icons-sharp">refresh</span>
              </button>
            </div>
          </div>

          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($submissions as $submission): 
                $statusClass = '';
                if($submission['status'] === 'new') $statusClass = 'primary';
                if($submission['status'] === 'replied') $statusClass = 'warning';
                if($submission['status'] === 'resolved') $statusClass = 'success';
              ?>
              <tr>
                <td><?php echo date('M d, Y', strtotime($submission['created_at'])); ?></td>
                <td><?php echo htmlspecialchars($submission['name']); ?></td>
                <td><?php echo htmlspecialchars($submission['email']); ?></td>
                <td><?php echo htmlspecialchars($submission['subject']); ?></td>
                <td class="<?php echo $statusClass; ?>"><?php echo ucfirst($submission['status']); ?></td>
                <td class="actions">
                  <a href="view_message.php?id=<?php echo $submission['id']; ?>" class="view-btn">
                    <span class="material-icons-sharp">visibility</span>
                  </a>
                  <button class="status-btn" data-id="<?php echo $submission['id']; ?>" data-status="<?php echo $submission['status']; ?>">
                    <span class="material-icons-sharp">flag</span>
                  </button>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          
          <?php if(empty($submissions)): ?>
            <div class="no-messages">
              <span class="material-icons-sharp">inbox</span>
              <p>No messages found</p>
            </div>
          <?php endif; ?>
        </div>
      </main>
    </div>
  </div>

  <script>
    // Filter functionality
    document.getElementById('statusFilter').addEventListener('change', function() {
      const status = this.value;
      window.location.href = `?filter=${status}`;
    });

    // Update message status
    document.querySelectorAll('.status-btn').forEach(button => {
      button.addEventListener('click', function() {
        const messageId = this.dataset.id;
        const currentStatus = this.dataset.status;
        // Add logic to update status via AJAX
      });
    });
  </script>
</body>
</html>
