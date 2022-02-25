<?php
session_start()
?>
<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Update Details</title>

      <style>
          body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    text-align: left;
    width: 100%;
    height:100vh;
    overflow: hidden;
    background: linear-gradient(to right,#9c27b0,#8ecdff);
}
    div {
  margin-top: 40px;
  margin-left: 580px;
}
    button{
        font-size: .9rem;
        margin-top: 20px;
        margin-left: 50px;
        color:white;
        background-color: black;

}
    
   </style>
   
</head>

    <body>
        

      <?php
      $servername="localhost";
      $username="root";
      $password="";
      $database="userdetails";

    $connector=mysqli_connect($servername,$username,$password,$database);
    if(!$_SESSION['userid']){
      echo '<div class="alert alert-success">
              <strong>Sorry!</strong> Your Details has not been Updated !
            </div>';
            header("location: index.php");
    }
    $var= $_SESSION['userid'];

      $sql="select Name,Email_Id,Phone_No from user where User_Id='$var'";
      $result = mysqli_query($connector,$sql);
      $row = mysqli_fetch_array($result);

      if(isset($_POST['submitt'])&&$var!=NULL){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $name=$_POST['namee'];
            $email=$_POST['emaill'];
            $phone=$_POST['phonee'];
            $var= $_SESSION['userid'];
            $sql1="update user set Name='$name',Email_Id='$email',Phone_No='$phone' WHERE User_Id='$var'";
            $result=mysqli_query($connector,$sql1);
            if($result){
      
              echo '<div class="alert alert-success">
              <strong>Success!</strong> Your Details has been Updated Successfully!
            </div>';
              
                  }

        }
    }
      ?>

     
     <div class="updatee">
     <h1>Update Form</h1>
     <form method="post" action="update.php" >
        <h2>Name:</h2>
        <input type="name" name="namee"  value="<?php echo $row['Name']; ?>">
        <br>
        <h2>Email_Id:</h2>
        <input type="email" name="emaill" value="<?php echo $row['Email_Id']; ?>">
        <br>
        <h2>Phone_No:</h2>
        <input type="phone" name="phonee" value="<?php echo $row['Phone_No']; ?>">
        <br><br><br>
    
        <button type="submit" name ="submitt" >Update</button>
    </form>

        <form action="welcome.php" method="post">
           <button type="back">Back</button>
        </form>
       
     </div>
    </body>
</html>