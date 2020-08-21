<?php

$server = "sql300.epizy.com";
$username = "epiz_26547292";
$password = "lz7Sh35i3dp";
$dbname = "epiz_26547292_mydata";

// define variables and set to empty values
$FnameErr = $LnameErr = $emailErr = $phoneErr = "";
$fname = $lname = $email = $phone = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $FnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $FnameErr = "Only letters and white space allowed";
    }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $LnameErr = "Name is required";
    } else {
      $lname = test_input($_POST["lname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $LnameErr = "Only letters and white space allowed";
      }
    }
  
    
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match("[0-9]",$phone)) {
        $PhoneErr = "Only numbers are allowed";
      }
    }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $comment = test_input($_POST["message"]);
  }

 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$conn = mysqli_connect($server, $username, $password, $dbname);

if(!$conn){
  die("connection failed : " .mysqli_connect_error());
}

?>