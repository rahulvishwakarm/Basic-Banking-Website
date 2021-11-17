<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money - Basic Banking System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./sendMoney.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" type="text/css" href="./navigationBar.css">
</head>
<body>

    <?php
        include 'connection.php';
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connection,$sql);
    ?>

    <?php
        include 'navigationBar.php';
    ?>

    <div class="container-fluid">
        <h2 class="text-center pt-4">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center py-2">Id</th>
                                <th scope="col" class="text-center py-2">Name</th>
                                <th scope="col" class="text-center py-2">E-Mail</th>
                                <th scope="col" class="text-center py-2">Balance</th>
                                <th scope="col" class="text-center py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="py-2"><?php echo $rows['id'] ?></td>
                                <td class="py-2"><?php echo $rows['name']?></td>
                                <td class="py-2"><?php echo $rows['email']?></td>
                                <td class="py-2"><?php echo $rows['balance']?></td>
                                <td class="center">
                                    <a href="selectUser.php?id= <?php echo $rows['id'];?>">
                                        <button type="button" class="btn">Send Money</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
    </div>

    <?php
        include 'footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

</body>
</html>