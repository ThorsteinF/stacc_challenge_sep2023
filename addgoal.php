<?php
include_once "connect.php";
$id = $_POST["id"];
$amount = $_POST["amount"];

$sql = "UPDATE accounts SET goal = '$amount' WHERE id = '$id';";
mysqli_query($conn, $sql);

header("location: accounts.php");

?>
