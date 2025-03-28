<?php
// !isset($_ENV["PHP_ENV"])
// if () {
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// }
// $servername = "131.153.148.82";
// $username = "arrivelo_fnbcorp";
// $dbname = "arrivelo_fnbcorp";
// $password = "admin@00154abS/";


// PROD
if (isset($_ENV["PHP_ENV"])) {
  $servername = "b4j2h3z2ug93gzgsiof2-mysql.services.clever-cloud.com";
  $username = "umqxqvcvjyxbyisb";
  $dbname = "b4j2h3z2ug93gzgsiof2";
  $password = "NAuganoaeaNLwwqpIGpZ";
}
// DEV
if (!isset($_ENV["PHP_ENV"])) {
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


