<?php
include("functions.php");
if (isset($_POST)) {
  $accountnumberb = $_POST["accountnumber"];

  $queryyy = "SELECT firstname, middlename, lastname FROM users WHERE accountnumber = '$accountnumberb'";
  $qresult = $conn->query($queryyy);
  $ad = mysqli_num_rows($qresult);
  if ($ad > 0) {
    $cool = mysqli_fetch_assoc($qresult);
    $first = $cool["firstname"];
    $middle = $cool["middlename"];
    $last = $cool["lastname"];

    echo "$first $middle $last";
  } else {
    echo "";
  }
}
?>