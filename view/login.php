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
        background-color: black;}
        </style>
        <link rel="stylesheet" href="login.css">
    </head>

    <body> 

        <!-- Handling of login form -->
        <div class="login-form">
            <h1>Login Form</h1>
                <form action="index.php?action=blog-all" method="post">
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
                    
