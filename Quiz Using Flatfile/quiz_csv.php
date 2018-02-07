<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="style.css?<?=rand()?>">
</head>

<body>
  <?php
    require_once("CSV.class.php");

    if (isset($_GET["q"])) {
      $question_id = $_GET["q"];
    }
    else {
      $question_id = 1;
    }

    if ($question_id == 0) {
      echo "Something wrong.";
    }

    else if ($question_id < 0) {
        echo "You completed the quiz!";
    }

    else {
      $csv = new CSV("quiz_flatfile.csv"); /* MAKE CSV OBJECT */

      $question = $csv->get_cell($question_id, 1);
      $id_yes = $csv->get_cell($question_id, 2);
      $id_no = $csv->get_cell($question_id, 3);
      $id_idk = $csv->get_cell($question_id, 4);

      echo "<section class=\"container-fluid\">";
      echo "  <div class=\"row text-center\">";
      echo "    <h1>$question</h1>";
      echo "    <div class=\"col-sm-4\">";
      echo "      <a href=\"quiz_csv.php?q=$id_yes\">Yes</a>";
      echo "    </div>";
      echo "    <div class=\"col-sm-4\">";
      echo "      <a href=\"quiz_csv.php?q=$id_no\">No</a>";
      echo "    </div>";
      echo "    <div class=\"col-sm-4\">";
      echo "      <a href=\"quiz_csv.php?q=$id_idk\">Idk</a>";
      echo "    </div>";
      echo "  </div>";
      echo "</section>";
    }
  ?>
</body>
</html>
