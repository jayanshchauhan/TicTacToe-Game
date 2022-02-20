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
        <h1>Start playing Tic Tac Toe!</h1>
        <h2>Please fill in your names</h2>


        <div class="p-name">
            <label for="player-x"> YOU </label>
            
            <input type="text" id="player-x" name="player-x" value= "<?php echo $_SESSION['namee']?>" />
            
        </div>

        <div class="p-name">
            <label for="player-o"> Opponent Player </label>
            <input type="text" id="player-o" name="player-o" required />
        </div>

        <button type="submit">Start</button>
    </div>
</form>
</body>
</html>

