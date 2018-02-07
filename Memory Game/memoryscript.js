/* ÉTOINE DID EVERYTHING IN THIS FILE */

var flip_count = 0; // Used in flip().
var id_array = []; // ^^
var element_array = []; // ^^
var busy = 0; // ^^
var selectedplayer; // Used in coinflip(), compare() and update_score().
var p1score = 0; // Used in update_score() & setTime() (game.php).
var p2score = 0; // ^^
var moves = 0; // Used in update_moves().

// This function decides which player starts.
function coinflip(elmnt) {
  var coin_choice = Math.random();
  var rotate;
  if (coin_choice >= 0.5) {
    rotate = 'rotateY(2520deg)';
    selectedplayer = 1;
  }
  else if (coin_choice < 0.5) {
    rotate = 'rotateY(2700deg)';
    selectedplayer = 2;
  }
  elmnt.style.transform = rotate; // Flips the coin.
  setTimeout(function(){ coin.style.display="none";}, 4000); // Sets a timer so it takes a while before you can actually start playing.

  // Changes the color of the players for indication whose turn it is.
  if (selectedplayer == 1) setTimeout(function(){document.getElementById("player1").style.color = "red";}, 4000);
  else setTimeout(function(){document.getElementById("player2").style.color = "red";}, 4000);
}

// This function flips the card you clicked on.
function flip(elmnt, id) {
  if (busy == 0) {
    busy = 1; // Prevention for clicking multiple cards.
    id_array[flip_count] = id;
    element_array[flip_count] = elmnt;
    elmnt.style.transform = 'rotateY(180deg)';

    if (element_array[0] == element_array[1]) { // If you press the same card twice...
      flip_count = 1; // ... resets the function to a state that it will accept a 2nd card.
      busy = 0; // Changes so it can accept a new card as entry.
    }
    else {
      flip_count++;
      console.log(flip_count);

      if (flip_count == 2) { // If two different cards are clicked...
        compare(id_array); // ...compare the two cards.
      }
      else {
        busy = 0; // Accept a new card.
      }
    }
  }
}

// This function compares the two cards you selected.
function compare() {
  console.log(id_array);
  var id1 = id_array[0]; // These store the entries of the id_array and element_array into variables.
  var id2 = id_array[1]; // ^^
  var elmnt1 = element_array[0]; // ^^
  var elmnt2 = element_array[1]; // ^^
  id_array = []; // Resets the id_array.
  update_moves();
  if (id1 == id2) {
    elmnt1.setAttribute('id','disable-click');
    elmnt2.setAttribute('id','disable-click');
    flip_count = 0;
    busy = 0; // Accept a new card.
    update_score();
  }
  else {
    // Changes the color of the players for indication whose turn it is & changes the selected player.
    switch (selectedplayer) {
      case 1:
      selectedplayer = 2;
      document.getElementById("player1").style.color = "white";
      document.getElementById("player2").style.color = "red";
      break;
      case 2:
      selectedplayer = 1;
      document.getElementById("player1").style.color = "red";
      document.getElementById("player2").style.color = "white";
      break;
    }
    setTimeout(reset_cards, 800, elmnt1, elmnt2);
  }
}

// This function flips the cards back if the two are not the same.
function reset_cards(elmnt1, elmnt2) {
  element_array = [];
  elmnt1.style.transform = 'rotateY(0deg)';
  elmnt2.style.transform = 'rotateY(0deg)';
  busy = 0;
  flip_count = 0;
}

// This function updates the score for the current selected player if that player matches two cards.
function update_score() {
  if (selectedplayer == 1) p1score++;
  else p2score++;

  document.getElementById("p1score").innerHTML = p1score;
  document.getElementById("p2score").innerHTML = p2score;
}

// This function keeps track of the amount of moves there are made.
function update_moves() {
  moves++;
  document.getElementById("moves").innerHTML = "Moves: " + moves.toString();
}

// This function changes the max-width of the card deck so it will center nicely when screen is resized.
function carddecksize() { // Needs improvement, doesn't work well with apple products.
  var deck = document.getElementById("carddeck");
  if (window.innerWidth >= 1560) {
    deck.style.maxWidth = '1560px';
  }
  else if (window.innerWidth >= 1365) {
    deck.style.maxWidth = '1365px';
  }
  else if (window.innerWidth >= 1170) {
    deck.style.maxWidth = '1170px';
  }
  else if (window.innerWidth >= 975) {
    deck.style.maxWidth = '975px';
  }
  else {
    deck.style.maxWidth = '780px';
  }
}
