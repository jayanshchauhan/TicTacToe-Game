<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tic-Tac-Toe</title>
        <link rel="stylesheet" href="indexx.css">
    </head>
    <body>
        <div class="main-form"> 
            <h1>Welcome to the world of TIC TAC TOE Game:</h1>
<?php
            session_unset();
            session_destroy();
            ?>

         <!--   <form action="login.php" method="post">
                <button type="login">Login </button>
            </form>
            
            <form action="registration.php" method="post">
                <button type="register">Register</button>
            </form>
-->
<!--   <form action="login.php" method="post">
                <button type="login">Login </button>
            </form>
            
            <form action="registration.php" method="post">
                <button type="register">Register</button>
            </form>
-->
<form method="post">
<button name ="login" type="login">Login </button>
<?php
if(isset($_POST["login"])){
header("location:login.php");
}
?>
<button name="registration" type="register">Register </button>

<?php

if(isset($_POST["registration"])){
header("location:registration.php");
}
?>
</form>
<form action="userdetails.php" method="post">
<button type="home">User Details</button>
</form>
        </div>
    </body>
</html>