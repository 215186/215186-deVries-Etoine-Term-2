<!-- JELLE -->
<?php

class Card{
  private $id;
  private $sub_id;
  public static $check_ID = [];
  public static $check_sub_ID = [];
  public static $second_array = [];


  function __construct(){
    $this->id = rand(1, 50);
    while(true){
      if(in_array($this->id, self::$check_ID)){
        $this->id = rand(1, 50);
      }
      else{
        array_push(self::$check_ID, $this->id);
        self::$second_array = self::$check_ID;
        shuffle(self::$second_array);
        break;
      }
    }
  }
  function get_card(){
    return self::$check_ID;
  }

/* ÉTOINE (html), JELLE (php)*/
  function print_card($array) {
    foreach ($array as $cardid) {
      echo '<div class="card-container">';
      echo '  <div class="card" onclick="flip((this), '.$cardid.')">';
      echo '    <div class="card-front">';
      echo '      <img class="frontimg" src="assets/background/back_of_card/cardBack.jpg">';
      echo '    </div>';
      echo '    <div class="card-back">';
      echo '      <img class="backimg" src="assets/card/'.$cardid.'.png">';
      echo '    </div>';
      echo '  </div>';
      echo '</div>';
    }
  }
}
