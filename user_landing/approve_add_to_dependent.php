<?php
  session_start();

  $dependent_u_name = $_GET['dependent_u_name'];

  //add fund to the account
  $conn = new mysqli('localhost', 'root', '', 'registration_storage');
  $sql = "INSERT INTO fund (fund_name, dependent_u_name, amount, stores) VALUES ('$_POST[fund_name]', 
  '$dependent_u_name', '$_POST[amount]', '$_POST[store]')";
  mysqli_query($conn, $sql);

  header("Location: parent.php");