<!-- JELLE FORMS + PHP, ÉTOINE HTML + CSS + JS -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Memory Game</title>
    <link rel="stylesheet" href="memorygamemenu.css?<?=rand()?>">
  </head>

  <body>
    <header>
      <h1>Jelle & Etoine's amazing memory game!</h1>
    </header>

    <button onclick="getPreset()" id="presetbutton">PRESET GAME</button>
    <div id="presetform">
      <form class="presetform" action="game.php" method="POST">
        <h1>CHOOSE THE AMOUNT OF CARDS</h1>
        <button name="preset" class="preset" value="16">16 cards</button>
        <button name="preset" class="preset" value="24">24 cards</button>
        <button name="preset" class="preset" value="32">32 cards</button>
        <button name="preset" class="preset" value="40">40 cards</button>
        <button name="preset" class="preset" value="48">48 cards</button>
        <button name="preset" class="preset" value="56">56 cards</button>
        <button name="preset" class="preset" value="64">64 cards</button>
        <button name="preset" class="preset" value="72">72 cards</button>
        <button name="preset" class="preset" value="80">80 cards</button>
      </form>
      <br><button onclick="hidePreset()">Back</button>
    </div>

    <button onclick="getCustom()" id="custombutton">CUSTOM GAME</button>
    <div id="customform">
      <form name="customform" action="game.php" method="POST">
        <input type="radio" name="choiceX" id="choiceX1" value="4"><label for="choiceX1">4</label>
        <input type="radio" name="choiceX" id="choiceX2" value="6"><label for="choiceX2">6</label>
        <input type="radio" name="choiceX" id="choiceX3" value="8"><label for="choiceX3">8</label>
        <input type="radio" name="choiceX" id="choiceX4" value="10" required><label for="choiceX4">10</label><br>
        <p><b>Times</b></p>
        <input type="radio" name="choiceY" id="choiceY1" value="4"><label for="choiceY1">4</label>
        <input type="radio" name="choiceY" id="choiceY2" value="6"><label for="choiceY2">6</label>
        <input type="radio" name="choiceY" id="choiceY3" value="8"><label for="choiceY3">8</label>
        <input type="radio" name="choiceY" id="choiceY4" value="10" required><label for="choiceY4">10</label><br><br>
        <input type="submit" value="Continue!">
      </form>
      <button onclick="hideCustom()">Back</button>
    </div>
  </body>
</html>

<script>
var presetform = document.getElementById("presetform");
var customform = document.getElementById("customform");

// These functions hide/show the forms
function getPreset() {
  presetform.style.display = "block";
}

function hidePreset() {
  presetform.style.display = "none";
}

function getCustom() {
  customform.style.display = "block";
}

function hideCustom() {
  customform.style.display = "none";
}
</script>
