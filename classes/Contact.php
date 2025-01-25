<?php
    class Contact {
        public function getUnresolvedCount() {
          $query = "SELECT COUNT(*) FROM contact_submissions 
                    WHERE status IN ('new', 'replied')";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
          return $stmt->fetchColumn();
        }
      }

?>