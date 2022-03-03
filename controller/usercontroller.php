<?php
function add_user()
{
    $msg = "";
    $name = "";
    $email = "";
    $phone = "";
    $password = "";
    $nameErr = $emailErr = $phoneErr = $passwordErr = "";
    if (isset($_POST['register'])) {
        #Name Validation
        if (empty($_POST["name"])) {
            $nameErr = "Name is required.<br/>";
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["name"])) {
                $nameErr = "Only letters and white space allowed.<br/>";
            } else {
                $name =  $_POST["name"];
            }
        }
        #Email Validation
        if (empty($_POST["email"])) {
            $emailErr = "Email is required.<br/>";
        } else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format.<br/>";
            } else {
                $email = $_POST["email"];
                include_once 'models/user.php';
                $user = new user();
                $getuser = $user->getuserbyemail($email);
                if (!empty($getuser)) {
                    $emailErr = "Email already Exist";
                }
            }
        }
        #Phone Number Validation
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone Number is required.<br/>";
        } else {
            if (!preg_match('/^[0-9]{10}+$/', $_POST["phone"])) {
                $phoneErr = "Invalid Phone Number.<br/>";
            } else {
                $phone =  $_POST["phone"];
            }
        }
       
        #password validation
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required.<br/>";
        } else {
            if (strlen($_POST["password"]) <= '8') {
                $passwordErr = "Your Password Must Contain At Least 8 Characters!.<br/>";
            } elseif (!preg_match("#[0-9]+#", $_POST["password"])) {
                $passwordErr = "Your Password Must Contain At Least 1 Number!.<br/>";
            } elseif (!preg_match("#[A-Z]+#", $_POST["password"])) {
                $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!.<br/>";
            } elseif (!preg_match("#[a-z]+#", $_POST["password"])) {
                $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!.<br/>";
            } else {
                //$password = get_safe_value($con , $_POST['password']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
        }
        $error_array = [$nameErr, $emailErr, $phoneErr, $passwordErr];
        if ($nameErr == '' && $emailErr == '' && $phoneErr == '' && $passwordErr == '') {
            require_once 'model/user.php';
            $user = new user();
            $id = $user->adduser($name, $email, $phone,$password);
            if (!empty($id)) {
                $msg = "User Added";
                return $msg;
            }
        } else {
            return $error_array;
        }
    }
}

function user_login()
{
    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $password =  $_POST['password'];
        include_once 'model/user.php';
        $user_login = new user();
        $rows = $user_login->getuserbyemail($username);
        if (!empty($rows)) {
            $cnt = 0;
            foreach ($rows as $row) {
                if (password_verify($password, $row['Password'])) {
                    $cnt = 1;
                    $_SESSION['USER_LOGIN'] = 'yes';
                    $_SESSION['USER_USERNAME'] = $username;
                    // include_once 'models/user.php';
                    // $user = new user();
                    // $user->updateuserstatus(true, $username);
                   
                }
            }
            if ($cnt === 0) {
                $msg = "Password is Incorrect";
                header('location:index.php?action=login&Message=' . $msg);
            }
        } else {
            $msg = "Please Enter Correct login details <br> If you are new than Register Yourself First!";
            header('location:index.php?action=login&Message=' . $msg);
        }
    }
}