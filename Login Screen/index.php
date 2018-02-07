<?php
  session_start();
  $_SESSION['loggedIn'] = false;
 ?>
 
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=chrome">
  <link rel="stylesheet" href="loginscreen.css?<?=rand()?>">
  <style>
  </style>
</head>

<?php
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
    switch($error) {
      case "notfilled":
        $message = "Not all fields have been filled in.";
        break;
      case "nomatches":
        $message = "Invalid login credentials, please try again.";
        break;
      case "notlogged":
        $message = "Please log in to access the site.";
        break;
    }
    echo "<body onload='getForm()'>";
  }
  else {
    echo "<body>";
  }
?>
  <button onclick="document.getElementById('loginForm').style.display='block'" id="formButton">Login</button>

  <form action="login.php" method="POST" id="loginForm">
    <div class="animate">
      <div id="information">
        <h1>EDPORTAL</h1>
        <p>Welcome to my portal, please fill in the correct login credentials to access the contents of this site.</p>
        <h3 id="message"><?$message?></h3>
      </div>
      <div id="input">
        <input type="text" name="user" placeholder="Your username">
        <input type="password" name="pass" placeholder="Your password">
        <button type="submit" id="loginSubmit">Login</button>
      </div>
    </div>
  </form>

  <script>
  function getForm() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('message').style.display = 'inline';
    document.getElementById('message').innerHTML = '<?=$message?>';
  }
  </script>
</body>
</html>
