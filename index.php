<?php
session_start();
$action = $_GET['action'] ?? $_POST['action'] ?? 'home';

if ($action == 'blog-all') {
    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $password =  $_POST['password'];
        include_once 'model/user.php';
        $user_login = new user();
        $rows = $user_login->getuserbyemail($username);
        if (!empty($rows)) {
            $cnt = 0;
            foreach ($rows as $row) {
                if (password_verify($password, $row['password'])) {
                    $cnt = 1;
                    $_SESSION['USER_LOGIN'] = 'yes';
                    $_SESSION['USER_USERNAME'] = $username;
                    // include_once 'models/user.php';
                    // $user = new user();
                    // $user->updateuserstatus(true, $username);
                    if (isset($_POST['remember'])) {
                        setcookie("username", $username, time() + 1 * 60 * 60);
                    } else {
                        if (isset($_COOKIE['username'])) {
                            setcookie("username", "");
                        }
                    }
                }
            }
            if ($cnt === 0) {
                $msg = "Password is Incorrect";
                header('location:index.php?action=login&Message=' . $msg);
            }
        } else {
            $msg = "Please Enter Correct login details <br> If you are new then Register Yourself First!";
            header('location:index.php?action=login&Message=' . $msg);
        }
    } elseif (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
        
        require_once 'view/welcome.php';
    } else {
        require_once 'view/login.php';
    }
} elseif ($action == 'registration') {
    require_once 'view/registration.php';
} elseif ($action == 'add-user') {
    require_once 'controller/usercontroller.php';
    $usertrue = add_user();
    $message = "User Added";
    if ($usertrue === $message) {
        $msg = urlencode('Account Created LogIn Now');
        header('location:index.php?action=login&Message=' . $msg);
    } else {
        if (!empty($usertrue[0])) {
            $nameErr = $usertrue[0];
        }
        if (!empty($usertrue[1])) {
            $emailErr = $usertrue[1];
        }
        if (!empty($usertrue[2])) {
            $phoneErr = $usertrue[2];
        }
        if (!empty($usertrue[3])) {
            $passwordErr = $usertrue[3];
        }

        require_once 'view/registration.php';
    }
} elseif ($action == 'login') {
    require_once 'view/login.php';
}else {
    if (isset($_POST['login'])) {
        header('location:index.php?action=login');
        if (isset($_POST['submit'])) {
        }
    } elseif (isset($_POST['register'])) {
        header('location:index.php?action=registration');
    } else {
        require_once 'view/home.php';
    }
}