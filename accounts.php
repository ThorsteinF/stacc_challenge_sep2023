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
    <table>
    <tr>
        <th>ID</th>
        <th>acc_number</th>
        <th>acc_type</th>
        <th>Balance</th>
        <th>Currency</th>
        <th>Owner</th>
        <th>Savings goal</th>
        <th>Progress</th>
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
        <td><?php $progress = $row["balance"]/$row["goal"];

                  if ($row["goal"] == 0) {
                      echo "-";
                  }
                  elseif ($progress >= 1) {
                      echo "<p>Goal reached!</p>";
                      echo "<img src = 'img/cat6.jpg' height = '100px' width = '100px'>";
                  }
                  elseif ($progress > 0.8) {
                      echo round($progress*100) . "% <br>";
                      echo "<img src = 'img/cat5.jpg' height = '150px' width = '150px'>";
                  }
                  elseif ($progress > 0.6) {
                      echo round($progress*100) . "% <br>";
                      echo "<img src = 'img/cat4.jpg' height = '100px' width = '100px'>";
                  }
                  elseif ($progress > 0.4) {
                      echo round($progress*100) . "% <br>";
                      echo "<img src = 'img/cat3.jpg' height = '150px' width = '150px'>";
                  }
                  elseif ($progress > 0.2) {
                      echo round($progress*100) . "% <br>";
                      echo "<img src = 'img/cat2.jpg' height = '100px' width = '100px'>";
                  }
                  else {
                      echo "<p>OVER 0.0</p>";
                      echo "<img src = 'img/cat1.jpg' height = '100px' width = '100px'>";
                  }

?></td>
        </tr>
    <?php
    }
    ?>
    </table>

    <form action="addgoal.php" method="POST">
        <input type="number" name="id" id="id" required placeholder = "Account ID">
        <input type="number" name="amount" id="amount" required placeholder="Savings goal">
        <input type="submit" id = "button" value="Update savings goal">
    </form>
    </main>
</body>
</html>
