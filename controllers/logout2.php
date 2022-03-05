<?php
require_once "models/forlogout.php";

class Usersforlogout {

    private $userModel;
    
    public function __construct(){
        $this->userModel = new User;
    }

    public function logout2(){

        $ostatus="Online";
        $nstatus="Offline";
        $row=$this->userModel->updateoffline($ostatus,$nstatus);
        
        unset($_SESSION['username']);
        unset($_SESSION['useremail']);
        unset($_SESSION['userid']);
        unset($_SESSION['userphoneno']);
        session_unset();
        session_destroy();
       }
    }

    $logout=new Usersforlogout;
    $logout->logout2(); 
   
?>



















