<!-- WAY OF COMMENTING: EVERYTHING UNDER A COMMENT IS FROM THE PERSON IN THAT COMMENT -->
<!-- BASIC HTML IS NOT CREDITED TO ANYONE -->
<!-- MATHIJS & WENHAO: (all of the CSS + naming of ids/classes in html)-->

<HTML>
<head>
  <link rel="stylesheet" type="text/css" href="style.css?<?=rand()?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</style>
<title> AO Quiz!</title>
</head>

<body>
  <!-- MATTHIJS & WENHAO -->
  <div id="center_wrapper">
    <a class="centerlink" href="http://edportal.myddns.rocks/opendag/index.php"> <div id="quiz"></div> </a>
  </div>

  <div id="center_wrapper">
    <a class="centerlink" href="http://edportal.myddns.rocks/opendag/index.php"> <div id="top_bar"></div> </a>
  </div>

  <!--JELLE -->
  <?php session_start(); $_SESSION['anonymous'] = false; ?>

  <div id="question_area">
    <center>
      <!-- ÉTOINE -->
      <h1>Welkom bij de open dag van ROC Friese Poort!</h1><br>
      <p>Deze quiz geeft je een beetje een idee of je geschikt zou zijn voor:<p>
      <div id="list">
        <p> > ApplicatieOntwikkelaar</p>
        <p> > ICT Beheer</p>
        <p> > MediaVormgeving</p>
      </div>

      <!-- JELLE -->
      <h3>Als je wilt kun je je voor- en achternaam invullen als je anoniem wil blijven, druk dan op overslaan.</h3>
      <form id="form" action="anonymous.php" method="POST">
        <input type="text" name="first_name" placeholder="voornaam">
        <input type="text" name="last_name" placeholder="achternaam">
        <button type="submit" name="submit">Ga door</button>
      </form>

      <a href="anonymous.php"><button type="button" name="button">overslaan</button></a>
    </center>
  </div>

</body>
</HTML>
