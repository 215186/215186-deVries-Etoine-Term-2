<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>End game</title>
    <link rel="stylesheet" href="game.css?<?=rand()?>">
  </head>
  <body>
    <h1>Good job!</h1>
    <a href="gamemenu.php"> <button type="button" name="button">Go back to menu screen</button> </a>
  </body>
</html>

<?php
require "CLASS_card.php";
include_once "database(dummy).php";
$cards_used =  Card::$check_ID;
$score_p1 = $_POST['score_p1'];
$score_p2 = $_POST['score_p2'];
$time = $_POST['sectime'];

$sql = "INSERT INTO `project upload`(`score_player_one`, `score_player_two`, `time_played` `cards_used`) VALUES ('$score_p1', '$score_p2', '$time', '$cards_used')";
mysqli_query($link, $sql);

// echo "Score p1: $score_p1<br>\n";
// echo "Score p2: $score_p2<br>\n";
// echo "Time: $time<br>\n";
