<?php
  require_once("DBconnect.php");
  $remove = $_GET["action"];
  $id = $_GET["id"];
  $table = "Notes";
  if ($remove) {
    $sql = "DELETE FROM $table WHERE (`id` = '$id')";
    mysqli_query($link, $sql);
    echo "Removed succesfully";
  }
  close_connection($link);
 ?>

<!DOCTYPE html>
<html>
<head>
  <title> My search engine </title>
</head>

<body>
  <form action='notes_results.php' method='POST'>
    <center>
      <h1>My Search Engine</h1>
      <input type='text' size='90' name='search_title'></br></br> From
      <input type='date' name='from_date'> To
      <input type='date' name='to_date'>
      <input type="checkbox" name="check_date">Check if you want to search by date.</br></br>
      <select name="tag" disabled>
        <option value="school">school</option>
        <option value="portal">portal</option>
        <option value="home">home</option>
        <option value="tox">tox</option>
        <option value="ao17">ao17</option>
      </select>
      <input type="checkbox" name="check_tag" disabled>Filtering by tag is currently disabled, we are working on it.</br></br>
      <input type='submit' name='submit' value='Search source code'> </br></br>
      <a href="notes_start.php">Go to start!</a>
    </center>
  </form>


</body>
</html>
