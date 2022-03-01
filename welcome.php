<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WelcomePage</title>
        
        <link rel='stylesheet' href='style.css' type='text/css'/>
    <style>
        button{
            font-size: .9rem;
            margin-top: 20px;
            margin-left: 50px;
            color:white;
            background-color: black;}
        </style>
        
        
    </head>
        
    <body>
    
    <form method="post" action="register-players.php">
        <div class="welcome">
    <?php
        if(!$_SESSION['namee'])
        header("location: index.php");
        ?>   
        <h1> Welcome <?php echo $_SESSION['namee'];?> </h1>
            <h2>Start playing Tic Tac Toe!</h2>
            


            <div class="p-name">
                <label for="player-x"> YOU </label>
                
                <input type="text" id="player-x" name="player-x" value= "<?php echo $_SESSION['namee']?>" />
                
            </div>

            <div class="p-name">
                <label for="player-o"> Opponent Player </label>
                <input type="text" id="player-o" name="player-o" required/>
            </div>

            <button type="submit">Start</button><br>

        </div>
    </form>
        
    </body>
    <form action="logout.php" method="post">
            <button Update style= "background-color:black ; color:white;margin-top:55px;margin-right:50px;margin-left:100px;position:absolute; top:0; right:0;" type="home">Log Out</button>
            </form>
    <form action="userdetailswithonline.php" method="post">
            <button Update style= "background-color:black ; color:white;margin-top:125px;margin-right:193px;margin-left:300px;position:absolute; top:0; right:0;" type="home">User Details</button>
            </form>
    <form action="update.php" method="post">
            <button Update style= "background-color:black ; color:white;margin-bottom:500px;margin-left:500px;" type="home">Update Info. </button>
            </form>
</html>

