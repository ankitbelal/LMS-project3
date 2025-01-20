<?php
    require_once('../configs/Database.php');
    class courseCRUD{
        public $course_id='';
        public $course_name='';
        public $total_semester='';
        public $total_subject='';
        public $subject_id='';
        public $subject_name='';
        public $semester='';
        public $conn='';
        public $connection='';

        public function __construct(){
            $this->connection=new Database();
            $this->conn=$this->connection->getConnection();
        }

        public function createCourse($data){
            $result=$this->conn->prepare("insert into course (course_id,course_name,total_semester,total_subject) values(:id,:name,:total_sem,:total_subject)");
            $result->bindParam(':id',$data['course-id']);
            $result->bindParam(':name',$data['course-name']);
            $result->bindParam(':total_sem',$data['total-semester']);
            $result->bindParam(':total_subject',$data['total-subject']);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function list(){
            $result=$this->conn->prepare("select * from course");
            $result->execute();
            return $result->fetchAll();
        }

        public function getCourseId(){
            $result=$this->conn->prepare("select course_id from course");
            $result->execute();
            return $result->fetchAll();
        }

        public function addSubject($data){
            $result=$this->conn->prepare("insert into subject (subject_id,subject_name,semester,course_id) values(:subject_id,:subject_name,:semester,:course_id)");
            $result->bindParam(':subject_id',$data['subject-id']);
            $result->bindParam(':subject_name',$data['subject-name']);
            $result->bindParam(':semester',$data['semester']);
            $result->bindParam(':course_id',$data['course-id']);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getSubject(){
            $result=$this->conn->prepare("select * from subject");
            $result->execute();
            return $result->fetchAll();
        }

        
    }
?>