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
        background-color: black;}
        </style>
        <link rel="stylesheet" href="registration.css">
    </head>

    <body>


        <div class="registration-form">
            <h1>Registration Form</h1>
                <form action="index.php?action=add-user" method="post" name="form1">
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
                    
