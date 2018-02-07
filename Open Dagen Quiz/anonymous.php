<!-- JELLE -->
<?php
session_start();
$_SESSION['anonymous'] = "?";
print_r($_SESSION['anonymous']);
if (isset($_POST['first_name'])){
  echo "hello";
  $_SESSION['first_name'] = ($_POST['first_name']);
  $_SESSION['last_name'] = ($_POST['last_name']);
  $_SESSION['anonymous'] = false;
}
echo $_POST['first_name'];
if ($_SESSION['anonymous'] == "?") {
  $_SESSION['first_name'] = "anonymous_F";
  $_SESSION['last_name'] = "anonymous_L";
  $_SESSION['anonymous'] = true;
}
$_SESSION['score'] = 0;
header("location: opendagquiz.php?q=1");
