<?php
session_start();

function getDependentRow($d_username){
    $conn = new mysqli('localhost', 'root', '', 'registration_storage');
    $sql ="SELECT * FROM dependents WHERE username = '$d_username' ";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result);
}
$dependent_row = getDependentRow($_SESSION['username']);


$amount = $_POST['amount'];
$store = $_POST['store'];
$banned_stores = $dependent_row['banned_stores'];
$approved_stores = $dependent_row['approved_stores'];

//for loop through each fund

$conn = new mysqli('localhost', 'root', '', 'registration_storage');
$sql ="SELECT * FROM fund WHERE dependent_u_name = '$_SESSION[username]' ";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);


for ($x = 0; $x < $numRows; $x++) {

    $fund_row = mysqli_fetch_array($result);

    //you can now access elements on the row by using $fund_row['stores'];

}


