<?php
require_once "templates/header.php";

if (! playersRegistered()) {
    header("location: index.php");
}

resetBoard();
?>

<table class="wrapper" cellpadding="0" cellspacing="0">
    <tr>
        <td>

            <div class="welcome">

                <h1>
                    <?php

                    $servername="localhost";
                    $username="root";
                    $password="";
                    $database="userdetails";
                    $conn=mysqli_connect($servername,$username,$password,$database);

                    if ($_GET['player']) {
                        echo currentPlayer() . " won!";

                        if(!$conn)
                        {
                            die("Sorry We failed to connect ".mysqli_connect_error());
                        }
                        else{

                            if(currentPlayer()==$_SESSION['namee']){

                                $id=$_SESSION['userid'];

                  //             echo "<br>"; print_r($_SESSION);


                                $sql = "UPDATE game_table set Total_Wins=Total_wins+1,Total_Played=Total_Played+1 where User_Id='$id'";
                                $result=mysqli_query($conn,$sql);
                               
    
                            }else{
                                echo "NO";
                                $id=$_SESSION['userid'];

                                $sql = "UPDATE game_table set Total_Wins=Total_Loss+1,Total_Played=Total_Played+1 where User_Id='$id'";
                                $result=mysqli_query($conn,$sql);
                            }
                            
                        }

                        }

                        
                    else {
                        echo "It's a tie!";
                        if(!$conn)
                        {
                            die("Sorry We failed to connect ".mysqli_connect_error());
                        }
                        else{
                            $id=$_SESSION['userid'];

                                $sql = "UPDATE game_table set Total_Played=Total_Played+1 where User_Id='$id";
                                $result=mysqli_query($conn,$sql);

                        }
                    }
                    ?>
                </h1>

                <div class="player-name">
                    <?php echo playerName('x')?>'s score: <b><?php echo score('x')?></b>
                </div>

                <div class="player-name">
                    <?php echo playerName('o')?>' score: <b><?php echo score('o')?></b>
                </div>

                <a href="play.php">Play again</a><br />

                <a href="index.php" class="reset-btn">Reset</a>
            </div>

        </td>
    </tr>
</table>

</body>
</html>

