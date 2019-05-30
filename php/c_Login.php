<?php

  //$con = mysqli_connect("localhost", "root", "", "Dmersdatabase");
  $con = mysqli_connect("localhost", "dmers0529", "tmi0529!", "dmers0529");

  $userID = $_POST["userID"];
  $userPassword = $_POST["userPassword"];
  // $userName = $_POST["userName"];
  // $userPhone = $_POST["userPhone"];
  // $userEmail = $_POST["userEmail"];
  // $userNick = $_POST["userNick"];


  $statement = mysqli_prepare($con, "SELECT * FROM USER WHERE userID = ? AND userPassword = ?");
  mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
  mysqli_stmt_execute($statement);

  mysqli_stmt_store_result($statement);
  mysqli_stmt_bind_result($statement, $userID, $userPassword, $userName, $userPhone, $userEmail, $userNick);

  $response = array();
  $response["success"] = false;

  while(mysqli_stmt_fetch($statement)){
    $response["success"] = true;
    $response["userID"] = $userID;
    $response["userPassword"] = $userPassword;
    $response["userName"] = $userName;
    $response["userPhone"] = $userPhone;
    $response["userEmail"] = $userEmail;
    $response["userNick"] = $userNick;  
  }

  echo json_encode($response);
?>