<!-- JELLE -->
<?php
  require "CLASS_card.php";

  if (isset($_POST["preset"])) {
    $amount = $_POST["preset"];
  }
  else if (isset($_POST["choiceX"]) && isset($_POST["choiceY"])) {
    $amount = $_POST["choiceX"] * $_POST["choiceY"];
  }

  /* Picking random IDs for which cards to use. */
  for ($i=0; $i < ($amount / 2); $i++) {
    $make_card[$i] = new Card($amount);
  }

  /* Doubling the IDs because there need to be 2 cards for each. */
  foreach (Card::$second_array as $double) {
    array_push(Card::$check_ID, $double);
  }
  /* Making sure the array is in random order. */
  shuffle(Card::$check_ID);
 ?>

<!-- ÉTOINE -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Memory game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="memorygame.css?<?=rand()?>">
    <script src="memoryscript.js?<?=rand()?>"></script>
  </head>
  <body onresize="carddecksize()">
    <header class="container">
      <div class="row">
        <div class="col-sm-2" id="player1">
          <h1>Player 1</h1>
          <h1 id="p1score">0</h1>
        </div>
        <div class="col-sm-4" id="movescounter">
          <label><h1 id="moves">Moves: 0</h1></label>
        </div>
        <div class="col-sm-4" id="timer">
          <label><h1>Timer:</h1></label><label><h1 id="minutes">00</h1></label>:<label><h1 id="seconds">00</h1></label>
        </div>
        <div class="col-sm-2" id="player2">
          <h1>Player 2</h1>
          <h1 id="p2score">0</h1>
        </div>
      </div>
    </header>

<!-- JELLE -->
    <div>
      <form action="" method="POST" style="visibility: hidden;"> <!-- Hidden for the user. -->
        <input type="number" value="" name="score_p1" id="score1">
        <input type="number" value="" name="score_p2" id="score2">
        <input type="number" value="" name="sectime" id="sectime">
        <input type="submit" id="submit">
      </form>
    </div>

<!-- ÉTOINE -->
    <div class="coin-background" id="coin">
      <div class="coin-content">
        <h1 id="whoBegins"></h1>
        <div class="coin-container">
          <div class="coin" onclick="coinflip(this)">
            <div class="coin-front">
              <img src="assets/coin/p1coin.png">
            </div>
            <div class="coin-back">
              <img src="assets/coin/p2coin.png">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jelle -->
    <div class="carddeck" id="carddeck">
      <?php Card::print_card(Card::$check_ID) ?>
    </div>

    <!-- ÉTOINE -->
    <script>
      document.getElementById("coin").style.display = "block"; // Displays the coin.

      // Everything under this is for the timer
      var minutesLabel = document.getElementById("minutes");
      var secondsLabel = document.getElementById("seconds");
      var totalSeconds = 0;
      var amount = <?= $amount ?>;
      var interval = undefined;

      // This function sets the timer.
      function setTime() {
        if (interval != undefined) {
          ++totalSeconds;
          secondsLabel.innerHTML = pad(totalSeconds % 60);
          minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
          if  ((amount / 2) == (p1score + p2score)) { // Checks if the game ended.
            clearInterval(interval); // Stops the timer.
            document.getElementById("score1").setAttribute('value', p1score); // Puts the variable in an hidden input so we can use php to add it in the database.
            document.getElementById("score2").setAttribute('value', p2score); // ^^
            setTimeout(function(){document.getElementById("submit").click();}, 4000); // Clicks the input submit button after 4 seconds after the game has ended.
          }
        }
        else {
          interval = setInterval(setTime, 1000);
        }
      }

      // This function adds a 0 before the minute label to make the timer look a little bit nicer.
      function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
          return "0" + valString;
        }
        else {
          return valString;
        }
      }
      setTime();
    </script>
  </body>
</html>
