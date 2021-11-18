<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./sendMoney.css">
    <link rel="stylesheet" type="text/css" href="./navigationBar.css">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <link rel="stylesheet" type="text/css" href="./footer.css">
</head>

<body>

<?php
    include 'navigationBar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4">Transactions</h2>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                
                <th class="text-center ">Debit Account</th>
                <th class="text-center">Credit Account</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'connection.php';
            $sql ="select * from transaction";
            $query =mysqli_query($connection, $sql);
            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
            <tr>
                <td class="py-2"><?php echo $rows['sender']; ?></td>
                <td class="py-2"><?php echo $rows['receiver']; ?></td>
                <td class="py-2"><?php echo $rows['balance']; ?> </td>
                <td class="py-2"><?php echo $rows['datetime']; ?> </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

    </div>
    <div class="center">
        <button class="downlaod px-2 py-1" style="background-color: #343a40;" onclick="print()">Download Transactions</button>
    </div>
</div>

    <?php
        include 'footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>