<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Savings</title>
</head>
<body>
    <header>
        <h1> Stacc challenge 2023 </h1>
    </header>
    <main>
        <div id = "links">
            <a href = "index.php"> HOME </a>
            <a href = "accounts.php" id = "current"> ACCOUNTS </a>
            <a href = "transactions.php"> TRANSACTINOS </a>
        </div>
        <h1 id = "title"> Accounts </h1>
        
    <table>
    <tr>
        <th>ID</th>
        <th>acc_number</th>
        <th>acc_type</th>
        <th>Balance</th>
        <th>Currency</th>
        <th>Owner</th>
        <th>Savings goal</th>
    </tr>

    <?php
    include_once "connect.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM accounts";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["account_number"]; ?></td>
        <td><?php echo $row["account_type"]; ?></td>
        <td><?php echo $row["balance"]; ?></td>
        <td><?php echo $row["currency"]; ?></td>
        <td><?php echo $row["owner"]; ?></td>
        <td><?php echo $row["goal"]; ?></td>
        </tr>
    <?php
    }
    ?>
    </table>

    <form action="add.php" method="POST">
        <input type="text" name="id" id="id" required placeholder = "Account ID">
        <input type="number" name="amount" id="amount" required placeholder="Savings goal">
        <input type="submit" id = "button" value="Update savings goal">
    </form>
    </main>
</body>
</html>
