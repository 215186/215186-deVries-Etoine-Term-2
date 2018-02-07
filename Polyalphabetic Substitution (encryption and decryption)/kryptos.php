<?php
  if (isset($_POST["word"])) {
    $word = $_POST["word"];
    $keyword = $_POST["keyword"];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=chrome">
    <title>Kryptos</title>
  </head>
  <body>
    <form class="kryptos" action="kryptos.php" method="post">
      <h3>Word</h3> <input type="text" name="word" value="<?=$word?>" autocomplete="off"><br>
      <h3>Keyword</h3> <input type="text" name="keyword" value="<?=$keyword?>" autocomplete="off"><br><br>
      <button type="submit" name="button">SUBMIT</button>
      <br><br>
    </form>
  </body>
</html>

<?php
  if (isset($_POST["word"])) {
    $kryptos = kryptos_encrypt($word, $keyword);
    $word = kryptos_decrypt($kryptos, $keyword);
    echo "Kryptos: $kryptos<br>\n";
    echo "Word: $word";
  }

  function kryptos_alphabet() {
    $bigarray = array();
    $alphabet = range('a', 'z');
    $bigarray[0] = $alphabet;

    for ($idx = 1; $idx <= 25; $idx++) {
      $firstletter = $alphabet[0];
      $alphabet = array_slice($alphabet,1);
      array_push($alphabet, $firstletter);
      $bigarray[$idx] = $alphabet;
    }
    return $bigarray;
  }

  function kryptos_encrypt($word, $keyword) {
    $bigarray = kryptos_alphabet();
    print_r($bigarray);
    echo "<br><br>\n";
    $kryptos = '';

    $j = 0;
    for ($i = 0; $i < strlen($word); $i++) {
      if ($i % strlen($keyword) == 0 && $j != 0) {
        $j = 0;
      }
      $rowletter = $keyword[$j];
      $colletter = $word[$i];
      $rowposition = ord(strtolower($rowletter)) - ord("a");
      $colposition = ord(strtolower($colletter)) - ord("a");
      $kryptosletter = $bigarray[$rowposition /* == keyword */][$colposition /* == word */];
      $kryptos = $kryptos . $kryptosletter;
      echo "j: $j, Rowletter: $rowletter, Rowposition: $rowposition<br>\n";
      echo "i: $i, Colletter: $colletter, Colposition: $colposition <br>\n";
      echo "kryptosletter: $kryptosletter<br><br>\n";
      $j++;
    }
    return $kryptos;
  }

  function kryptos_decrypt($kryptos, $keyword) {
    $bigarray = kryptos_alphabet();
    $word = '';
    $j = 0;
    for ($i = 0; $i < strlen($kryptos); $i++) {
      if ($i % strlen($keyword) == 0 && $j != 0) {
        $j = 0;
      }
      $rowletter = $keyword[$j];
      $kryptosletter = $kryptos[$i];
      $rowposition = ord(strtolower($rowletter)) - ord("a");
      $wordarray = $bigarray[$rowposition];
      // print_r($wordarray);
      $wordposition = array_search($kryptosletter, $wordarray);
      $wordletter = $bigarray[0][$wordposition];
      $word = $word . $wordletter;
      $j++;
    }
    return $word;
  }
 ?>
