<?php
  /* PUTS ALL THE FILES OF A FOLDER IN AN ARRAY */
  function scanfolder($filepath, $tag) {
    $files_array = scandir(($filepath . $tag));
    array_splice($files_array, 0, 2);
    foreach ($files_array as &$file) {
      $file = ["file" => $file, "tag" => $tag];
    }
    return $files_array;
  }

  /* MAKES ONE BIG ARRAY */
  function bigarray($filepath) {
    $main = array();
    $main = array_merge($main, scanfolder($filepath, "text"));
    $main = array_merge($main, scanfolder($filepath, "image"));
    $main = array_merge($main, scanfolder($filepath, "coding"));
    return $main;
  }

  /* SORT THE BIG ARRAY */
  function sksort(&$array, $subkey="file", $sort_descending=false, $keep_keys_in_sub = false) {
    $temp_array = $array;

    foreach ($temp_array as $key => &$value) {

      $sort = array();
      foreach ($value as $index => $val) {
          $sort[$index] = $val[$subkey];
      }

      natcasesort($sort);

      $keys = array_keys($sort);
      $newValue = array();
      foreach ($keys as $index) {
        if($keep_keys_in_sub)
            $newValue[$index] = $value[$index];
          else
            $newValue[] = $value[$index];
      }

      if($sort_descending)
        $value = array_reverse($newValue, $keep_keys_in_sub);
      else
        $value = $newValue;
    }

    $array = $temp_array;
  }

  /* COMPARES THE INPUTTED FILE WITH THE FILES IN THE FOLDER */
  function compare_files($filepath, $filename) {
    $tags = array();
    $tags = ["text", "image", "coding"];
    foreach ($tags as $tag) {
      $files_comp = scandir(($filepath . $tag));
      array_splice($files_comp, 0, 2);
      print_r($files_comp);
      foreach ($files_comp as $file) {
        if ($file == $filename) {
          $message = "notunique";
          return $message;
        }
      }
    }
    return null;
  }
?>
