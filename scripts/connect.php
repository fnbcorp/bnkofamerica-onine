<?php
// !isset($_ENV["PHP_ENV"])
// if () {
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// }
$servername = "131.153.148.82";
$username = "arrivelo_fnbcorp";
$dbname = "arrivelo_fnbcorp";
$password = "admin@00154abS/";


// $servername = "bigswfmt9xdwwxeosjaa-mysql.services.clever-cloud.com";
// $username = "uyjojewbw23wwx47";
// $password = "W06QhyULqIFFczwaql4w";
// $dbname = "bigswfmt9xdwwxeosjaa";

// Create connection

$conn = @new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);
}


