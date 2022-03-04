<?php
require_once '../database/db.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findUserByEmailOrUsername($emailid){
        $this->db->query('SELECT * FROM user WHERE Email_Id = :emailid');
        $this->db->bind(':emailid', $emailid);
    //    $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public function register($data){
   //     $this->db->query('INSERT INTO user (usersName, usersEmail, usersUid, usersPwd) 
        $this->db->query('INSERT INTO user (Name, Email_Id, Phone_No, Password) 
        VALUES (:name, :email, :phoneno, :password)');
        //Bind values
        $this->db->bind(':name', $data['username']);
        $this->db->bind(':email', $data['useremail']);
        $this->db->bind(':phoneno', $data['userphoneno']);
        $this->db->bind(':password', $data['userpwd']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->Password;
        $password=md5($password);
        $password=substr($password, 0, -2);
        
        if($password==$hashedPassword){
            return $row;
        }else{
            return false;
        }
    }

}