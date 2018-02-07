<?php
  session_start();
  if (!(isset($_SESSION['loggedIn'])) || $_SESSION['loggedIn'] == false) {
    $error = "notlogged";
    header("Location: index.php?error=$error");
  }
 ?>
