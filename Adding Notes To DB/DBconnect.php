<?php
$host = "localhost";
$root = ""; // hostname
$pass = ""; // password
$DBname = ""; // database name
$link = mysqli_connect($host, $root, $pass, $DBname);

/* DISCONNECTING FROM DATABASE */
  function close_connection($link) {
    $link ->close();
  }
?>
