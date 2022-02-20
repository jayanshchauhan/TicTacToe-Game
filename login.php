<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login Form</title>
        <link rel="stylesheet" href="loginn.css">
    </head>

<body> 

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $passwrd=$_POST['passwrd'];
    $_SESSION['namee']="$email";
 
    $servername="localhost";
    $username="root";
    $password="";
    $database="userdetails";

    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn)
    {
        die("Sorry We failed to connect ".mysqli_connect_error());
    }
    else{
        $sql="SELECT * FROM `user` WHERE Email_Id='$email' and Password='$passwrd'";
        $result=mysqli_query($conn,$sql);
        
       

        if($result->num_rows>0){
            $row = mysqli_fetch_array($result);
            $_SESSION['namee']=$row['Name'];
    echo '<div class="alert alert-success">
    <strong>Success!</strong>
  </div>';
       
    header("location: welcome.php");

    
    
    
        }
        else{
            echo "Sorry You have not registered yet! Please register yourself first";
        }
    }
}
?>

<!-- Handling of login form -->
<div class="login-form">
    <h1>Login Form</h1>
        <form action="login.php" method="post">
            <p>Email Id</p>
            <input type="text" name="email" placeholder="Enter your Email Id">
            <p>Password</p>
            <input type="password" name="passwrd" placeholder="Enter your Password">
            <button type="submit">Login</button>
        </form>
        <form action="index.php" method="post">
           <button type="home">Home</button>
        </form>
</div>
</body>
</html>
                    
