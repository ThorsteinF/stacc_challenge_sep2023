<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savings</title>
</head>
<body>
    <h1> Savings </h1>
    <?php
    include_once "connect.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM accounts";
    $result = mysql_query($query);
    while($row = mysql_fetch_assoc($result)){
        foreach($row as $key => $val){
            echo $key . ": " . $val . "<BR />";
        }
    }
    ?>
</body>
</html>