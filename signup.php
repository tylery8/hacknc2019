<?php
session_start();
//create connection
$conn = new mysqli('localhost', 'root', '', 'registration_storage');

// if(!$conn) {
//     echo '<h1>Connected to MySQL</h1>';
// } else {
//     echo '<h1>not to MySQL</h1>';
//     echo mysqli_connect_error();
// }

// echo "reached";
// if(isset($_POST['submit'])){
  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $type = "P";
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $re_password = mysqli_real_escape_string($conn, $_POST['re_password']);

  echo $first;

  

  if($password != $re_password){
    echo '<script> alert("Your passwords do not match"); window.location.href=\'index.html\'; </script>';
    exit();
  }

    // $sql ="SELECT * FROM users WHERE user_email = '$email'";
    // $result = mysqli_num_rows(mysqli_query($conn, $sql));
    // $row = mysqli_fetch_assoc($result);

    $sql ="SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck != 0){ //check if user has been taken
      echo '<script> alert("Error, this email already has been registered"); window.location.href=\'index.php\'; </script>';
      exit();
    }
    //hash Password
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (first, last, username, type, phone, password) VALUES ('$first', '$last', '$username', '$type', '$phone', '$hashedPass');";
    mysqli_query($conn, $sql);


    $sql ="SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['first'] = $first;
    $_SESSION['last'] = $last;
    $_SESSION['username'] = $username;
    $_SESSION['type'] = $type;
    $_SESSION['phone'] = $phone;
    
    echo " signup succesful!";

    header("Location: user_landing/parent.php");


