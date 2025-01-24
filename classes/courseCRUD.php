<?php
    require_once('../configs/Database.php'); // Ensure this is require_once
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

        public function getCourseByID($data){
            $result=$this->conn->prepare("select * from course where course_id=:id");
            $result->bindParam(':id',$data);
            $result->execute();
            return $result->fetch();
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

        public function getSubjectById($data){
            $result=$this->conn->prepare("select * from subject where subject_id=:id");
            $result->bindParam(':id',$data);
            $result->execute();
            return $result->fetch();
        }

        public function getSubject(){
            $result=$this->conn->prepare("select * from subject");
            $result->execute();
            return $result->fetchAll();
        }

        public function updateCourse($data,$id){
            $result=$this->conn->prepare("update course set course_name=:name,total_semester=:totalSem,total_subject=:totalSub where course_id=:id");
           
            $result->bindParam(':name',$data['course-name']);
            $result->bindParam(':totalSem',$data['total-semester']);
            $result->bindParam(':totalSub',$data['total-subject']);
            $result->bindParam(':id',$id);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateSubject($data,$id){
            $result=$this->conn->prepare("update subject set subject_name=:name,semester=:sem,course_id=:id where subject_id=:subject_id");
            $result->bindParam(':name',$data['subject-name']);
            $result->bindParam(':sem',$data['semester']);
            $result->bindParam(':id',$data['course-id']);
            $result->bindParam(':subject_id',$id);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteRow($id){
            $result=$this->conn->prepare("delete from course where course_id=:id");
            $result->bindParam(':id',$id);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        public function deleteSubject($id){
            $result=$this->conn->prepare("delete from subject where subject_id=:id");
            $result->bindParam(':id',$id);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }
        //get subjects by semester 
        public function getSubjectsBySemester($course_id, $semester){
            $result=$this->conn->prepare("select * from subject where course_id=:course_id and semester=:semester");
            $result->bindParam(':course_id',$course_id);
            $result->bindParam(':semester',$semester);
            $result->execute();
            return $result->fetchAll();
        }
    }
?>