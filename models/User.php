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

    public function registergame($userid){ 
        $this->db->query('INSERT INTO game_table (User_Id, Total_Wins, Total_Loss, Total_Played) 
        VALUES (:userid, :wins, :loss, :played)');

        $this->db->bind(':userid', $userid);
        $this->db->bind(':wins', 0);
        $this->db->bind(':loss', 0);
        $this->db->bind(':played', 0);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function update($data,$useremail){ 
        $this->db->query('Update user set Name= :name,Phone_No= :phoneno WHERE Email_Id= :email');
        //Bind values
        $this->db->bind(':name', $data['username']);
        $this->db->bind(':phoneno', $data['userphoneno']);
        $this->db->bind(':email', $useremail);
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

    public function userdetails(){

        $this->db->query('select User_Id,Name,Email_Id,Phone_No,Total_Wins,Total_Loss,Total_Played,Status from user natural join game_table');

        $multiplerow = $this->db->resultSet();

        if($this->db->rowCount() > 0){
            return $multiplerow;
        }else{
            return false;
        }
    }

    public function updateonline($var,$status){

        $this->db->query('UPDATE game_table SET Status=:status WHERE User_Id=:var'); 
        $this->db->bind(':status', $status);
        $this->db->bind(':var', $var);
        $this->db->execute();
    }

    public function updateoffline($ostatus,$nstatus){

        $this->db->query('UPDATE game_table SET Status=:nstatus WHERE Status=:ostatus'); 
        $this->db->bind(':nstatus',$nstatus);
        $this->db->bind(':ostatus',$ostatus);
        $this->db->execute();
    }

}