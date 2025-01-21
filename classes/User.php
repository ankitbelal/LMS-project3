<?php

    include_once("../../configs/Database.php");

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
            $name=$data['first-name'].' '.$data['last-name'];
            $password=md5($data['password']);
            $result->bindParam(':name',$name);
            $result->bindParam(':username',$data['username']);
            $result->bindParam(':password',$password);  
            $result->bindParam(':email',$data['email']);
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

        public function delete($username){
            $result=$this->conn->prepare("update tbl_users set deleted_at=now() where username=:username");
            $result->bindParam(':username',$username);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getData($username){
            $result=$this->conn->prepare("select * from tbl_users where username=:username");
            $result->bindParam(':username', $username);
            $result->execute();
            return $result->fetch();
        }

        public function update($data,$username){
            $result=$this->conn->prepare("update tbl_users set name=:name,email=:email,contact=:contact,address=:address,role=:role where username=:username");
            $name=$data['first-name'].' '.$data['last-name'];
            $result->bindParam(':name',$name);
            $result->bindParam(':email',$data['email']);
            $result->bindParam(':contact',$data['contact']);
            $result->bindParam(':address',$data['address']);
            $result->bindParam(':role',$data['role']);
            $result->bindParam(':username',$username);
            if($result->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>