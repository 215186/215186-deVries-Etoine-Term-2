<?php
  require_once("functions.php");
  require_once("DBconnect.php");
  $table = "Users";

  /* IF ALL FIELDS ARE FILLED IN */
  if (isset($_POST['user']) && isset($_POST['pass']))
      {
        $logusername = $_POST['user'];
        $logpsw = $_POST['pass'];

        /* XSS-proof */
        $re = '/[\?\ # \/\ \\\ \$\<>%]+/';
        echo "Username before: " . $logusername . '<br>';
        echo "Regex: " . $re . '<br>';
        echo "Username with htmlspecialchars: " . htmlspecialchars($logusername) . '<br>';
        $logusername = preg_replace($re, '', $logusername);
        echo "Preg_replace: " . $logusername . '<br>';
        echo "Username after: " . $logusername . '<br>';

        /* GET PASSWORD FROM DATABASE */
        $result = mysqli_query($link, "SELECT * FROM $table WHERE (username = '$logusername')");
        while ($data = mysqli_fetch_assoc($result)) {
        $pswFromDatabase = $data["password"];
        close_connection($link);

        /* SEPERATE THE PASSWORD */
        $re = '/^(\d{1,3})([a-f]{1})([\da-f]+)$/imx';
        preg_match_all($re, $pswFromDatabase, $matches, PREG_SET_ORDER);
        $complete = $matches[0][0];
        $id = $matches[0][1];
        $separator = $matches[0][2];

        /* HASH PASSWORD USER SUBMITTED */
        $pswHashed = custom_hash($logpsw, $id, $separator);

        /* COMPARE PASSWORDS */
        $is_valid = ($complete == $pswHashed);
        if ($is_valid) {
          session_start();
          $_SESSION['loggedIn'] = true;
          header('Location: homepage.php');
        }
        else {
          $error = "nomatches";
          header("Location: index.php?error=$error");
        }
      }
    }
  /* IF NOT ALL FIELDS WERE FILLED IN */
  else {
    $error = "notfilled";
    close_connection($link);
    header("Location: index.php?error=$error");
  }
?>
