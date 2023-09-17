<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<body>
    <h1> Transactions </h1>
    <?php
    include_once "connect.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM transactions";
    $result = mysql_query($query);
    while($row = mysql_fetch_assoc($result)){
        foreach($row as $key => $val){
            echo $key . ": " . $val . "<BR />";
        }
    }
    ?>
</body>
</html>