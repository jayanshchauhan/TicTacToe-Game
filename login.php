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
        <style>
            button{
        font-size: .9rem;
        margin-top: 60px;
        margin-left: 650px;
        color:white;
        background-color: black;
}
</style>
        <link rel="stylesheet" href="login.css">
    </head>

<body> 

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    
 
    $servername="localhost";
    $username="root";
    $password="";
    $database="userdetails";

    $conn=mysqli_connect($servername,$username,$password,$database);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwrd = mysqli_real_escape_string($conn, $_POST['passwrd']);
    $passwrd = md5($passwrd);
    $_SESSION['namee']="$email";

    if(empty($_POST["email"])){
        echo '<script>alert("You must enter your Email")</script>';
       die();
        
    }
    if(empty($_POST["passwrd"])){
        echo '<script>alert("You must enter your Password.")</script>';
       die();
        
    }

    if(!$conn)
    {
        die("Sorry We failed to connect ".mysqli_connect_error());
    }
    else{
        $sql="SELECT * FROM `user` WHERE Email_Id='$email' and '$passwrd'";
        $result=mysqli_query($conn,$sql);
        
       

        if($result->num_rows>0){
            $row = mysqli_fetch_array($result);

            $userId=$row['User_Id'];
            $_SESSION['userid']=$userId;

            $_SESSION['namee']=$row['Name'];
    echo '<div class="alert alert-success">
    <strong>Success!</strong>
  </div>';
       
    header("location: welcome.php");

    
        }
        else{
            echo "<strong>Invalid Credentials!</strong>";
        }
    }
}
?>

<!-- Handling of login form -->
<div class="login-form">
    <h1>Login Form</h1>
        <form action="login.php" method="post">
            <p>Email Id</p>
            <input type="text" name="email" placeholder="Enter your Email Id" required>
            <p>Password</p>
            <input type="password" name="passwrd" placeholder="Enter your Password" required>
            <button type="submit">Login</button>
        </form>
        <form action="index.php" method="post">
           <button type="home">Home</button>
        </form>
</div>
</body>
</html>
                    
