<?php
    // include_once("./configs/Database.php");
    require_once('../configs/Database.php');
    class User{
        public $first_name='';
        public $last_name='';
        public $username='';
        public $password='';
        public $emal='';
        public $contact='';
        public $address='';
        public $role='';
        public $conn;
        public $connection;
        public function __construct(){
            $this->connection=new Database();
            $this ->conn= $this->connection->getConnection();
        }

        public function create($data){
            $result=$this->conn->prepare("insert into tbl_users (name,username,password,email,contact,address,role) values(:name,:username,:password,:email,:contact,:address,:role)");
            $name=$data['first_name'].' '.$data['last_name'];
            $result->bindParam(':name',$name);
            $result->bindParam(':username',$data['username']);
            $result->bindParam(':password',$data['password']);
            $result->bindParam(':email',$data['password']);
            $result->bindParam(':contact',$data['contact']);
            $result->bindParam(':address',$data['address']);
            $result->bindParam(':role',$data['role']);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function list(){
            $result=$this->conn->prepare("select * from tbl_users where deleted_at is null");
            $result->execute();
            return $result->fetchAll();
        }
    }
?>