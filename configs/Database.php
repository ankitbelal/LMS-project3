<?php 
    class Database{
        private $host= "localhost";
        private $user="user";
        private $password="password";
        private $database="LMS_DB";
        private $conn;

        public function __construct(){
            try{
                $this->$conn= new PDO('mysql:host=localhost;dbname=LMS_DB','root','password');
                $this->$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOEXCEPTION $e){
                die("Database Connection Error: ".$e->getMessage());
            }
        }

        public function getConnection(){
            return $this->$conn;
        }
    }

?>