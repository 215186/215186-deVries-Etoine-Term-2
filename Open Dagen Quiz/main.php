<!-- WAY OF COMMENTING: EVERYTHING UNDER A COMMENT IS FROM THE PERSON IN THAT COMMENT -->
<!-- BASIC HTML IS NOT CREDITED TO ANYONE -->
<!-- MATHIJS & WENHAO: (all of the CSS + naming of ids/classes in html)-->

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css?<?=rand()?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</style>
</head>

<body>
  <!-- MATHIJS & WENHAO -->
  <div id="center_wrapper">
  <a class="centerlink" href="http://edportal.myddns.rocks/opendag/index.php"> <div id="quiz"></div> </a>
  </div>

  <div id="center_wrapper">
  <a class="centerlink" href="http://edportal.myddns.rocks/opendag/index.php"> <div id="top_bar"></div> </a>
  </div>

<!-- JELLE -->
<?php
  include_once ("../../DBfunctions.php");
  session_start();
  $counter = $_SESSION["counter"];
  $question_amount = $_SESSION['question_amount'];
  $question_amount -= $counter;
  $name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];

  $score = $_SESSION["score"];

  /* TOX */
  $_SESSION["score"] = $_SESSION["score"] / $question_amount;
  $score_mv = $_SESSION["score"] < 0 ? abs($_SESSION["score"]) : 0;
  $score_ib = $_SESSION["score"] > 0 ? $_SESSION["score"] : 0;
  $score_ao = 1 - abs($_SESSION["score"]);

  $score_ao = round($score_ao * 100);
  $score_ib = round($score_ib * 100);
  $score_mv = round($score_mv * 100);

  /* JELLE */
  $sql = "INSERT INTO `quiz_opendag_database`(`name`, `last_name`, `score`, `score_ao`, `score_ib`, `score_mv`) VALUES ('$name', '$last_name', '$score', '$score_ao', '$score_ib', '$score_mv')";
  mysqli_query($link, $sql);

?>
  <div id="question_area">
    <center>
      <h1>Bedankt voor het meedoen met de quiz<?= ($_SESSION['anonymous'] == true) ? "!" : " " . $name . "!";?></h1>
      <!-- ÉTOINE -->
      <?php
      echo "<h1>Je score:</h1>";
      echo "<h2>AO: ".$score_ao."%</h2>";
      echo "<h2>IB: ".$score_ib."%</h2>";
      echo "<h2>MV: ".$score_mv."%</h2>";
      ?>
      <p>Neem de resultaten niet te serieus, deze resultaten zijn met wat nummers weergegeven maar uiteindelijk ligt de opleidingskeuze toch bij jezelf. Er zijn ook beleefdagen (30 jan & 23 ma) voor ROC friese poort, als je interesse hebt, vraag voor meer info bij een van de studenten met een labelkaartje.
      <p>Veel succes met kiezen van een opleiding en fijne dag nog! -AO17</p>
      <br><a href="index.php"> <button type="button" name="button">Voltooi quiz</button> </a>
    </center>
  </div>
</body>
</html>
