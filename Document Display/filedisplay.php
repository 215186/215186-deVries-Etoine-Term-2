<?php
require_once "functions.php";
echo "<section class=\"files\">";

$filepath = "uploads/";
$main = bigarray($filepath);

if (empty($main)) {
  echo "<button class=\"filebutton\" type=\"button\" onclick=\"document.getElementById('uploadForm').style.display='block'\"><img src=\"/images/add192.png\"></button>";
  echo "</section>";
}
else {
  $i = 1;

  foreach ($main as $tagfile) {
    $file = $tagfile["file"];
    $tag = $tagfile["tag"];
    $href = $filepath . $tag . "/" . $file;
    switch ($tag) {
      case "text":
        $img = "/images/text192.png";
        break;
      case "image":
        $img = "/images/image192.png";
        break;
      case "coding":
        $img = "/images/php192.png";
        break;
    }

    echo "<button class=\"filebutton\" id=\"popupBtn\" onclick=\"getFileForm('$file', '$href')\"><img src=$img></button>";

    /* If end of the array */
    if ($i % count($main) == 0) {
      echo "<button class=\"filebutton\" type=\"button\" onclick=\"document.getElementById('uploadForm').style.display='block'\"><img src=\"/images/add192.png\"></button>";
      echo "</section>";
    }
    $i = $i + 1;
  }
}
 ?>
