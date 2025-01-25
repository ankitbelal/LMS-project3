<?php
    require_once '../configs/Database.php';
    class Contribution{
        public $conn;
        public $connection;

        public function __construct(){
            $this->connection=new Database();
            $this->conn=$this->connection->getConnection();
        }
        
        public function getContributed(){
            $result=$this->conn->prepare("select c.course_id,c.semester,c.subject_id,c.content_type,c.description,c.file_name,c.email,c.uploaded_at,c.status,s.subject_name from contribution c join subject s on c.subject_id=s.subject_id"); 
            $result->execute();
            return $result->fetchAll();   
        }
    }
?>