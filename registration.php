
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registration Form</title>
        <link rel="stylesheet" href="registrationn.css">
    </head>

<body>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];

    

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

        $sql="INSERT INTO `user` (`Name`, `Email_Id`, `Phone_No`, `Country`) VALUES ('$name', '$email', '$phone', '$country')";
        $result=mysqli_query($conn,$sql);

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

?>

<div class="registration-form">
    <h1>Registration Form</h1>
        <form action="/tictactoegame/registration.php" method="post">
            <p>Name</p>
            <input type="name" name="name" placeholder="Enter Your Name">
            <p>Email Id</p>
            <input type="email" name="email" placeholder="Enter Your Email-Id">
            <p>Phone No.</p>
            <input type="phone" name="phone" placeholder="Enter Your PhoneNo.">
            <p>Country</p>
            <input type="country" name="country" placeholder="Enter Your Country Name">
            <button type="submit">Submit</button>
        </form>
        <form action="index.php" method="post">
           <button type="home">Home</button>
        </form>
</div>
</body>
</html>
                    
