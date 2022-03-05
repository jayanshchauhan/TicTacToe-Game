<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tic-Tac-Toe</title>
        <style>
            button{
        font-size: .9rem;
        margin-top: 60px;
        margin-left: 650px;
        color:white;
        background-color: black;}

        </style>
        <link rel="stylesheet" href="index.css">
    </head>
    
    <body>
        <div class="main-form"> 
            <h1>Welcome to the world of TIC TAC TOE Game:</h1>
            <nav>
                <ul>
                    <form method="post">
                 <li>   <button name ="login" type="login">Login </button>   </li>
                    <?php
                    if(isset($_POST["login"])){
                    header("location:views/login.php");
                    }
                    ?>
                 <li>   <button name="registration" type="register">Register </button>   </li>
                    <?php
                    if(isset($_POST["registration"])){
                    header("location:views/register.php");
                    }
                    ?>
                    </form>
                    <form action="views/userdetails.php" method="post">
                 <li>   <button type="home">User Details</button>     </li>
                    </form>
                </ul>
            </nav>
        </div>
    </body>
</html>