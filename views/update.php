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
      background: linear-gradient(to right,#9c27b0,#8ecdff);}

        div {
      margin-top: 40px;
      margin-left: 580px;}

        button{
            font-size: .9rem;
            margin-top: 20px;
            margin-left: 50px;
            color:white;
            background-color: black;}  
      </style>
    </head>

    <body>

    <?php
        if(!$_SESSION['username'])
        header("location:../index.php");
    ?> 

      <div class="updatee">
      <h1>Update Form</h1>
      <form method="post" action="../controllers/Users.php" >
      <input type="hidden" name="type" value="submitt">
         <h2>UserId:</h2>
          <input type="id" name="userid" value="<?php echo $_SESSION['userid']; ?>" disabled>
          <h2>Name:</h2>
          <input type="name" name="username"  value="<?php echo $_SESSION['username']; ?>">
          <h2>User_Email:</h2>
          <input type="email" name="useremail" disabled value="<?php echo $_SESSION['useremail']; ?>" disabled>
          <h2>Phone_No:</h2>
          <input type="phone" name="userphoneno" value="<?php echo $_SESSION['userphoneno']; ?>">
          <br><br><br>
      
          <button type="submit" name ="submitt" >Update</button>
      </form>

          <form action="welcome.php" method="post">
            <button type="back">Back</button>
          </form>
        
      </div>
    </body>
</html>