<?php
// !isset($_ENV["PHP_ENV"])
// if () {
// }
// $servername = "131.153.148.82";
// $username = "arrivelo_fnbcorp";
// $dbname = "arrivelo_fnbcorp";
// $password = "admin@00154abS/";


// PROD
if (isset($_ENV["PHP_ENV"])) {
  $servername = "131.153.147.178";
  $username = "dolphin8_bnkofam";
  $dbname = "dolphin8_bnkofamerica";
  $password = "dolphin8_bnkofam";
}
// DEV
if (!isset($_ENV["PHP_ENV"])) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $servername = "localhost";
  $username = "davidb";
  $dbname = "fnbcorp";
  $password = "00154abs";
}


// Create connection

$conn = @new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);
}


