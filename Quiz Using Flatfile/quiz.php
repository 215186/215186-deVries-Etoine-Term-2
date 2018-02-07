<!DOCTYPE html>
<html>
<head>
  <title>EdPortal</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css?<?=rand()?>">
</head>
  <style>
  .quizans {
    background-color: ForestGreen;
    padding: 20px;
    border-radius: 5px;
    margin: 6px;
  }
  .quizans a {
    color: white;
    font-size: 150%;
  }
  </style>

  <body>
  <?php
    require_once "CSV.class.php";

    if (isset($_GET["q"])) {
      $question_id = $_GET["q"];
    }
    else {
      $question_id = 1;
    }

    if ($question_id == 0) {
      $question = "Something wrong.";
    }

    else if ($question_id < 0) {
      $question = "You completed the quiz!";
    }
    else {
      $csv = new CSV("quiz_flatfile.csv");
      $question = $csv->get_cell($question_id, 1);
      $id_yes = $csv->get_cell($question_id, 2);
      $id_no = $csv->get_cell($question_id, 3);
      $id_idk = $csv->get_cell($question_id, 4);
    }
  ?>
    <section class="container-fluid">
      <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6"><h1><?=$question?></h1></div>
        <div class="col-sm-3"></div>
      </div>
      <div class="row text-center" style="margin: 20px;">
        <div class="col-sm-2"></div>
        <div class="col-sm-3"><button class="quizans"><h1><a href="quiz.php?q=<?=$id_yes?>">Yes</a></h1></button></div>
        <div class="col-sm-2"><button class="quizans"><h1><a href="quiz.php?q=<?=$id_no?>">Nope</a></h1></button></div>
        <div class="col-sm-3"><button class="quizans"><h1><a href="quiz.php?q=<?=$id_idk?>">Idk</a></h1></button></div>
        <div class="col-sm-2"></div>
      </div>
    </section>
  </body>
</html>
