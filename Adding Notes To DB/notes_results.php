<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
  </head>

  <body>
    <?php
      require_once("DBconnect.php");
      $search_title = $_POST["search_title"];
      $from_date = $_POST["from_date"];
      $to_date = $_POST["to_date"];
      $check_date = $_POST["check_date"];
      // $check_tag = $_POST["check_tag"];
      // $tag = $_POST["tag"];
      $table = "Notes";
      $empty = true;

      if (!($check_date) && !($check_tag)){
        $sql = "SELECT * FROM $table WHERE (`title` LIKE '%$search_title%')";
      }
      elseif ($check_date) {
        $sql = "SELECT * FROM $table WHERE (`title` LIKE '%$search_title%') AND (`date` >= '$from_date') AND (`date` <= '$to_date')";
      }
      /* elseif ($check_tag && !($tag == null)) {
        $sql = "SELECT * FROM $table WHERE (`title` LIKE '%$search_title%') AND (`id` = (SELECT `note_id` FROM `Pivot` WHERE (`tag_id` = (SELECT `Tags.id` FROM `Tags` WHERE (`tag` = '$tag')))))";
      } */

      $result = mysqli_query($link, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
        // Puts matches in variables //
        $title = $data["title"];
        $content = $data["content"];
        $id = $data["id"];
        $date = $data["date"];
        $empty = false;

        // Shows the matches //
        echo "Title: ";
        print_r($title);
        echo "</br> Content: ";
        print_r($content);
        echo "</br> Date: ";
        print_r($date);
        echo "<br/><a href=\"notes_start.php?action=edit&id=$id\" role=\"button\">Edit</a><br/>";
        echo "<a href=\"notes_search.php?action=remove&id=$id\" role=\"button\">Remove</a><br/><br/>";
      }
      close_connection($link);

      if ($empty) {
        echo "<a href=\"notes_search.php\" role=\"button\">No match found, return to search engine.</a>";
      }
      else {
        echo "<a href=\"notes_search.php\" role=\"button\">Return to search engine.</a>";
      }
    ?>
  </body>
</html>
