<?php
  //$con = mysqli_connect("localhost", "root", "", "Dmersdatabase");
  $con = mysqli_connect("localhost", "dmers0529", "tmi0529!", "dmers0529");

  $userID = $_POST["userID"];
  $userPassword = $_POST["userPassword"];
  $userName = $_POST["userName"];
  $userPhone = $_POST["userPhone"];
  $userEmail = $_POST["userEmail"];
  $userNick = $_POST["userNick"];

  $statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?,?,?,?,?,?)");
  mysqli_stmt_bind_param($statement, "ssssss", $userID, $userPassword, $userName, $userPhone, $userEmail, $userNick);
  mysqli_stmt_execute($statement);

  $response = array();
  $response["success"] = true;

  echo json_encode($response);

?>

