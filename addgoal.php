<?php

if (!$id) {
    header("location: accounts.php");
}

$sql = "UPDATE accounts SET goal = '$amount' WHERE id = '$id';";
mysqli_query($conn, $sql);

header("location: accounts.php");

?>