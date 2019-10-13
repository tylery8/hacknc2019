<?php
  session_start();

  $dependent_u_name = $_GET['dependent_u_name'];

  //add fund to the account
  $conn = new mysqli('localhost', 'root', '', 'registration_storage');

  $sql = "UPDATE dependents 
            SET banned_stores='$_POST[banned]',
                approved_stores='$_POST[approved]'
            WHERE username='$dependent_u_name' ";


  mysqli_query($conn, $sql);
  echo mysqli_error($conn);

  header("Location: parent.php");