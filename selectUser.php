<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./sendMoney.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <link rel="stylesheet" type="text/css" href="./navigationBar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Select Benificiary For Transaction</title>
</head>
<body>
    
    <?php
        include 'navigationBar.php';
    ?>

    <div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
        <?php
        include 'connection.php';
        $sid=$_GET['id'];
        $sql = "SELECT * FROM  users where id=$sid";
        $result=mysqli_query($connection,$sql);
        if(!$result)
        {
            echo "Error : ".$sql."<br>".mysqli_error($connection);
        }
        $rows=mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext" ><br>
            
            <div class="row container">
                <div class="col">
                    <label>From:</label>
                    <h5><?php echo $rows['email'] ?> (Rs <?php echo $rows['balance'] ?>)</h5>
                </div>
                <div class="col">
                    <label>Transfer To:</label>
                    <select name="to" class="form-control" required>
                        <option value="" disabled selected>Choose</option>
                        <?php
                        include 'connection.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM users where id!=$sid";
                        $result=mysqli_query($connection,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($connection);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option class="table" value="<?php echo $rows['id'];?>" >

                                <?php echo $rows['name'] ;?> (Email:
                                <?php echo $rows['email'] ;?> )

                            </option>
                            <?php
                        }
                        ?>
                        <div>
                    </select>
                </div>
                <div class="col">
                    <label>Amount:</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>
            </div>
            <div class="col" >
                <button class="btn mt-4 py-2 px-4" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>

<?php
include 'connection.php';


if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($connection,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($connection,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
    {
        ?>
        <script>
            alert( "Negative amount cannot be transferred");
        </script>

        <?php
    }


    // constraint to check insufficient balance.
    else if($amount > $sql1['balance'])
    {

        ?>
        <script>
            alert("Insufficient Balance Transaction Not  Successful!",);
        </script>

        <?php
    }



    // constraint to check zero values
    else if($amount == 0)
    {
        ?>
        <script>
            alert("Zero amount cannot be transferred");
        </script>

        <?php
    }


    else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($connection,$sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($connection,$sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($connection,$sql);

        if($query){
            ?>
            <script>
                alert("Done! , Transaction Successful!!");
                setTimeout(function (){
                    window.location='transaction.php';
                },1000);
            </script>

            <?php

        }

        $newbalance= 0;
        $amount =0;
    }

}
?>