<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Transactions</title>
</head>
<body>
<header>
    <h1> Stacc challenge 2023 </h1>
</header>
<main>
    <div id = "links">
            <a href = "index.php"> HOME </a>
            <a href = "accounts.php"> ACCOUNTS </a>
            <a href = "transactions.php" id = "current"> TRANSACTINOS </a>
    </div>
    <h1 id = "title"> Transactions </h1>
    <table>
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Acc_ID</th>
    </tr>

    <?php
    include_once "connect.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM transactions";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["date"]; ?></td>
        <td><?php echo $row["description"]; ?></td>
        <td><?php echo $row["amount"]; ?></td>
        <td><?php echo $row["currency"]; ?></td>
        <td><?php echo $row["account_id"]; ?></td>
        </tr>
    <?php
    }
    ?>
    </table>
</main>
</body>
</html>