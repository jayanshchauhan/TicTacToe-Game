<?php

session_start();
    require_once '../models/User.php';

    class Users {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        public function register(){
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'username' => trim($_POST['username']),
                'useremail' => trim($_POST['useremail']),
                'userphoneno' => trim($_POST['userphoneno']),
                'userpwd' => trim($_POST['userpwd']),
            ];

            //Validate inputs
            if(empty($data['username']) || empty($data['useremail']) || empty($data['userphoneno']) || 
            empty($data['userpwd'])){
                echo '<script>alert("Please fill out all inputss")</script>';
                die();
            }

            if(!filter_var($data['useremail'], FILTER_VALIDATE_EMAIL)){
                echo '<script>alert("Invalid Email")</script>';
                die();
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmailOrUsername($data['useremail'])){
                echo '<script>alert("Email already taken")</script>';
                die();
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['userpwd'] = md5($data['userpwd']);

            //Register User
            if($this->userModel->register($data)){
                header("location:../Views/login.php");
            }else{
                die("Something went wrong");
            }
        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'useremail' => trim($_POST['useremail']),
            'userpwd' => trim($_POST['userpwd'])
        ];

        if(empty($data['useremail']) || empty($data['userpwd'])){
            echo '<script>alert("Please fill out all inputs")</script>';
                die();
            header("location:../Views/login.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['useremail'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['useremail'], $data['userpwd']);
    
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
            }else{
                echo '<script>alert("Password is Incorrect")</script>';
                die();
            }
        }else{
            echo '<script>alert("No User Found!")</script>';
                die();
        }
    }

    public function createUserSession($user){
        $_SESSION['username'] = $user->Name;
        $_SESSION['useremail'] = $user->Email_Id;
        header("location:../Views/welcome.php");
    }

    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['useremail']);
        session_destroy();
        header("location:../index.php");
    }
}

    $init = new Users;

    //Ensure that user is sending a post request
    if(isset($_POST['register'])||isset($_POST['login'])||isset($_POST['logout'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            case 'logout':
                $init->logout();
                break;
            default:
            header("location:../index.php");
        }
    }  
    }