<?php
session_start();

if(!$_SESSION['username'])
header("location:../index.php");

require_once "../controllers/game_functions.php";

registerPlayers($_POST['player-x'], $_POST['player-o']);

if (playersRegistered()) {
    header("location:playgame.php");
}
