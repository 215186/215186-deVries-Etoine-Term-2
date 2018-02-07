<!-- WAY OF COMMENTING: EVERYTHING UNDER A COMMENT IS FROM THE PERSON IN THAT COMMENT -->
<!-- BASIC HTML IS NOT CREDITED TO ANYONE -->
<!-- MATHIJS & WENHAO: (all of the CSS + naming of ids/classes in html)-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css?<?=rand()?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</style>
</head>

<body>
  <!-- MATTIJS & WENHAO -->
  <div id="center_wrapper">
  <a class="centerlink" href="http://edportal.myddns.rocks/opendag/index.php"> <div id="quiz"></div> </a>
  </div>

  <div id="center_wrapper">
  <a class="centerlink" href="http://edportal.myddns.rocks/opendag/index.php"> <div id="top_bar"></div> </a>
  </div>

<!-- ÉTOINE -->
<?php
  require_once "../../CSV.class.php"; /* The functions file for flatfile storage. */
  session_start();

  $_SESSION['question_amount'] =29; // change this to acording to the amount of questions
  $question_amount = $_SESSION['question_amount'];

  /* NAME STUFF */
  /* JELLE */
  $firstnamereminder = $_SESSION['first_name'];
  $_SESSION['first_name'] = $firstnamereminder;
  $lastnamereminder = $_SESSION['last_name'];
  $_SESSION['last_name'] = $lastnamereminder;

  /* SCORE STUFF */
  /* ÉTOINE */
  if (isset($_GET['q'])) {
    $question_id = $_GET['q'];
    if (!isset($_SESSION["score"]) || $question_id == 1) {
      $_SESSION["score"] = 0; // Checks if score needs to be reset.
      $_SESSION["counter"] = 0;
    }

    $q_v = isset($_POST["value"]) ? $_POST["value"] : null; // Gets last answer value.
    if ($q_v == 9999)  // Store the amount of answers that have a value of 9999.
    {
        $_SESSION["counter"] += 1;
    }
    else {
      $_SESSION["score"] += $q_v;
    }

    if ($question_id > $question_amount) { // If @ end of the quiz.
      header("location: main.php");
    }

    $next_question = $question_id + 1;
    $csv = new CSV("vragenlijst.csv");
    $question = $csv->get_cell($question_id, 1);
    $q_a1 = $csv->get_cell($question_id, 2);
    $q_a2 = $csv->get_cell($question_id, 3);
    $q_a3 = $csv->get_cell($question_id, 4);
    $q_v1 = $csv->get_cell($question_id, 5);
  	$q_v2 = $csv->get_cell($question_id, 6);
  	$q_v3 = $csv->get_cell($question_id, 7);
?>

  <div id="question_area">
  <center <?=($question_id == 0) ? 'style="display: none"' : ''?> id="quizContent">
      <h1>Vraag <?=$question_id?>: <?=$question?> (<?=$question_id?>/<?=$question_amount?>)</h1> <!-- Shows the question you are on -->
      <form class="" action="opendagquiz.php?q=<?=$next_question?>" method="post"><br>
        <?php
          if ($q_a1 != "null") echo "    <input type=\"radio\" name=\"value\" value=\"$q_v1\" id=\"button1\" required><label for=\"button1\"> $q_a1<br></label>";
          if ($q_a2 != "null") echo "    <input type=\"radio\" name=\"value\" value=\"$q_v2\" id=\"button2\" required><label for=\"button2\"> $q_a2<br></label>";
          if ($q_a3 != "null") echo "    <input type=\"radio\" name=\"value\" value=\"$q_v3\" id=\"button3\" required><label for=\"button3\"> $q_a3<br><br></label>";
         ?>
        <br><input type="submit" value="Volgende vraag!">
      </form>
    </div>
  </center>
<h1></h1>
<?php
  }
?>
</body>
</html>
