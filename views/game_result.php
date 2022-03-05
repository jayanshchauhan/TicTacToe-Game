<?php
require_once "templates/header.php";

if (! playersRegistered()) {
    header("location: ../index.php");
}

resetBoard();
?>

<table class="wrapper" cellpadding="0" cellspacing="0">
    <tr>
        <td>

            <div class="welcome">

             <strong>   <h1>
                    <?php
                    if(!$_SESSION['username'])
                    header("location:../index.php");

                    require_once '../controllers/Users.php';
    
                    if ($_GET['player']) {
                        echo currentPlayer() . " won!";

                            if(currentPlayer()==$_SESSION['username']){

                                $userid=$_SESSION['userid'];

                                $updatewin=new Users;
                                $updatewin->updatewins($userid);
    
                            }else{
                              
                                $userid=$_SESSION['userid'];

                                $updateloss=new Users;
                                $updateloss->updateloss($userid);

                            }
                            
                        }
                        
                    else {
                        echo "It's a tie!";
                            $id=$_SESSION['userid'];

                            $updatetie=new Users;
                            $updatetie->updatetie($userid);

                    }
                    ?>
                </h1></strong>

                <div class="player-name">
                 <h3>   <?php echo playerName('x')?>'s score: <b><?php echo score('x')?></b></h3>
                </div>

                <div class="player-name">
                  <h3>  <?php echo playerName('o')?>' score: <b><?php echo score('o')?></b></h3>
                </div>

                <a href="../views/playgame.php">Play again</a><br />

            </div>

        </td>
    </tr>
</table>

</body>
</html>

