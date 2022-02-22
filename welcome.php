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
</head>
<body>
 
<form method="post" action="register-players.php">
    <div class="welcome">
        
    <h1> Welcome <?php echo $_SESSION['namee'];?> </h1>
        <h2>Start playing Tic Tac Toe!</h2>
        


        <div class="p-name">
            <label for="player-x"> YOU </label>
            
            <input type="text" id="player-x" name="player-x" value= "<?php echo $_SESSION['namee']?>" />
            
        </div>

        <div class="p-name">
            <label for="player-o"> Opponent Player </label>
            <input type="text" id="player-o" name="player-o" required />
        </div>

        <button type="submit">Start</button><br>
        <a href="index.php" class="reset-btn"><h3><strong> LOG OUT</strong></h3></a>
    </div>
</form>
</body>
</html>

