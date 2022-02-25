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
        <title>Registration Form</title>
        <style>
            button{
                
        font-size: .9rem;
        margin-top: 60px;
        margin-left: 650px;
        color:white;
        background-color: black;
}
</style>
        <link rel="stylesheet" href="registration.css">
    </head>

<body>

<?php 
if(isset($_POST['submitt'])){

if($_SERVER['REQUEST_METHOD']=='POST'){
  
    $servername="localhost";
    $username="root";
    $password="";
    $database="userdetails";

    $conn=mysqli_connect($servername,$username,$password,$database);

   
    $name_error="";
    $email_error="";

    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwrd = mysqli_real_escape_string($conn, $_POST['passwrd']);
    $passwrd = md5($passwrd);

    if(empty($_POST["name"])){
        echo '<script>alert("You must enter your Name")</script>';
       die();
        
    }
    if(empty($_POST["phone"])){
        echo '<script>alert("You must enter your Phone No.")</script>';
       die();
        
    }
    if(empty($_POST["email"])){
        echo '<script>alert("You must enter your Email")</script>';
       die();
        
    }
    if(empty($_POST["passwrd"])){
        echo '<script>alert("You must enter your Password")</script>';
       die();
        
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $name_error = "Name must contain only alphabets and space";
        }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
        }
    
    if($name_error!=""){
        echo '<script>alert("Name must contain only alphabets and space")</script>';
        die();
    }else if($email_error!=""){
        echo '<script>alert("Please Enter Valid Email ID")</script>';
        die();
    }

    if(!$conn)
    {
        die("Sorry We failed to connect ".mysqli_connect_error());
    }
    else{

        $sql="INSERT INTO `user` (`Name`, `Email_Id`, `Phone_No`, `Password`) VALUES ('$name', '$email', '$phone', '$passwrd')";
        $result=mysqli_query($conn,$sql);

        $sql1="SELECT * FROM `user` WHERE Email_Id='$email' and '$passwrd'";
        $result=mysqli_query($conn,$sql1);
        $row = mysqli_fetch_array($result);

        $userId=$row['User_Id'];
        $_SESSION['userid']=$userId;

        $sql2="INSERT INTO `game_table` VALUES ('$userId', 0, 0, 0)";
        $result1=mysqli_query($conn,$sql2);

        if($result){
      
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Your Details has been Submitted Successfully!
  </div>';
    
        }
        else{
            echo "The record was not inserted because of this error <br>--> ". mysqli_error($conn);
        }
    }
}
}
?>

<div class="registration-form">
    <h1>Registration Form</h1>
        <form action="/tictactoegame/registration.php" method="post">
            <p><b>Name</b></p>
            <input type="name" name="name" placeholder="Enter Your Name" required>
            <p><b>Email Id</b></p>
            <input type="email" name="email" placeholder="Enter Your Email-Id" required>
            <p><b>Phone No.</b></p>
            <input type="phone" name="phone" placeholder="Enter Your PhoneNo." required>
            <p><b>Password</b></p>
            <input type="password" name="passwrd" placeholder="Create your Password" required>
            <button type="submit" name="submitt">Submit</button>
        </form>
        <form action="index.php" method="post">
           <button type="home">Home</button>
        </form>
</div>
</body>
</html>
                    
