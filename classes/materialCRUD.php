<?php 
    require_once '../configs/Database.php';
    class materialCRUD{
        public $conn;
        public $connection;

        public function __construct(){
            $this->connection=new Database();
            $this->conn=$this->connection->getConnection();
        }

        public function saveMaterials($data,$fileName){
            $result=$this->conn->prepare("insert into study_material (course_id,semester,subject_id,material_type,file_desc,file_name) values(:courseId,:sem,:subjectId,:materialType,:desc,:path)");
            $result->bindParam(':courseId',$data['course-id']);
            $result->bindParam(':sem',$data['semester']);
            $result->bindParam(':subjectId',$data['subject-id']);
            $result->bindParam(':materialType',$data['material-type']);
            $result->bindParam(':desc',$data['file-desc']);
            $result->bindParam(':path',$fileName);
            if($result->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function getMaterials(){
            $result=$this->conn->prepare("SELECT sm.material_id,sm.course_id,sm.semester,sm.subject_id,s.subject_name,sm.material_type,sm.file_desc,sm.file_name,sm.uploaded_at FROM study_material sm JOIN subject s on sm.subject_id=s.subject_id;");
            $result->execute();
            return $result->fetchAll();
        }

        public function getMaterialById($id){
            $result=$this->conn->prepare("select * from study_material where material_id=:id");
            $result->bindParam(':id',$id);
            $result->execute();
            return $result->fetch();
        }

        public function getCourseId(){
            $result=$this->conn->prepare("select course_id from course");
            $result->execute();
            return $result->fetchAll();
        }

        public function getSem($id){
            $result=$this->conn->prepare("select total_semester from course where course_id=:id");
            $result->bindParam(':id',$id);
            $result->execute();
            return $result->fetch();
        }

        public function getSubject($courseID,$semester){
            $result=$this->conn->prepare("select * from subject where course_id=:courseID and semester=:semester");
            $result->bindParam(':courseID',$courseID);
            $result->bindParam(':semester',$semester);
            $result->execute();
            return $result->fetchAll();
        }

        public function getOneSubject($courseID,$subjectID){
            $result=$this->conn->prepare("select subject_name from subject where course_id=:CID and subject_id=:SID");
            $result->bindParam(':CID',$courseID);
            $result->bindParam(':SID',$subjectID);
            $result->execute();
            return $result->fetch(); 
        }

        public function updateMaterial($data,$file_name){
            if($file_name){
                $result=$this->conn->prepare("update study_material set course_id=:courseId,semester=:sem,subject_id=:subjectId,material_type=:materialType,file_desc=:desc,file_name=:file_name where material_id=:id");
                $result->bindParam(':courseId',$data['course-id']);
                $result->bindParam(':sem',$data['semester']);
                $result->bindParam(':subjectId',$data['subject-id']);
                $result->bindParam(':materialType',$data['material-type']);
                $result->bindParam(':desc',$data['file-desc']);
                $result->bindParam(':file_name',$file_name);
                $result->bindParam(':id',$data['material_id']);
            }else{
                $result=$this->conn->prepare("update study_material set course_id=:courseId,semester=:sem,subject_id=:subjectId,material_type=:materialType,file_desc=:desc where material_id=:id");
                $result->bindParam(':courseId',$data['course-id']);
                $result->bindParam(':sem',$data['semester']);
                $result->bindParam(':subjectId',$data['subject-id']);
                $result->bindParam(':materialType',$data['material-type']);
                $result->bindParam(':desc',$data['file-desc']);
                $result->bindParam(':id',$data['material_id']);
            }
            if($result->execute()){
                return true;
            }else{
                return false;
            }

        }

        //delete materials form deletematerials.php
        public function deleteMaterial($id){
            $result=$this->conn->prepare("DELETE from study_material where material_id=:id");
            $result->bindParam(":id",$id);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        //insert data from contribution table
        public function insertMaterial($id,$sem,$sub_id,$type,$desc,$file){
            $result=$this->conn->prepare("insert into study_material (course_id,semester,subject_id,material_type,file_desc,file_name) values(:id,:sem,:sub_id,:type,:desc,:file)");
            $result->bindParam(':id',$id);
            $result->bindParam(':sem',$sem);
            $result->bindParam(':sub_id',$sub_id);
            $result->bindParam(':type',$type);
            $result->bindParam(':desc',$desc);
            $result->bindParam(':file',$file);
             if($result->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>