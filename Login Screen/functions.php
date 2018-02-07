<?php
  /* HASHING PASSWORDS */
    function custom_hash($HashPass, $id = null, $separator = null) {
      $algos = hash_algos();
      $count = count($algos);
      if ($id == null) {
        $id = rand(0, $count - 1);
      }
      $algo = $algos[$id];
      if ($separator == null) {
        $separators = ['a', 'b', 'c', 'd', 'e', 'f'];
        $separator_id = rand(0, count($separators) - 1);
        $separator = $separators[$separator_id];
      }
      $hash = hash($algo, $HashPass);
      $pswHashed = $id . $separator . $hash;
      return $pswHashed;
    }
?>
