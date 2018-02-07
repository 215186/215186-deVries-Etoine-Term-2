<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
  </head>

  <body>
    <?php
      require_once("DBconnect.php");
      // Collects the data from the index.php submit //
      $title = $_POST['title'];
      $content = $_POST['content'];
      $id = $_POST["id"];
      $date = $_POST["date"];
      $tag = $_POST["tag"];
      $table = "Notes";

      // Insert stuff from the note in database //
      if ($id == null) {
        $sql = "INSERT INTO $table (`date`, `title`, `content`) Values ('$date', '$title', '$content')";
        mysqli_query($link, $sql);
        $sql = "INSERT INTO `Pivots` (`note_id`, `tag_id`) Values ((SELECT `id` FROM `Notes` WHERE (`title` = '$title')), (SELECT `id` FROM `Tags` WHERE (`tag` = '$tag')))";
        mysqli_query($link, $sql);
        echo "Upload succes!" . "</br>";
      }
      // Updates stuff from the note in database //
      else {
        $sql = "UPDATE $table SET `title` = '$title', `content` = '$content', `date` = '$date' WHERE (`id` = '$id')";
        mysqli_query($link, $sql);
        $sql = "UPDATE `Pivots` SET `note_id` = (SELECT `id` FROM `Notes` WHERE (`title` = '$title')), `tag_id` = (SELECT `id` FROM `Tags` WHERE (`tag` = '$tag'))";
        mysqli_query($link, $sql);
        echo "Update succes!" . "</br>";
      }
      close_connection($link);
    ?>
    <a href="notes_search.php">Go to search.</a><br>
    <a href="notes_start.php">Upload another text.</a>
  </body>
</html>
