<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./craeteUser.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" type="text/css" href="./navigationBar.css">

    <title>Create User - Basic Banking System</title>
</head>
<body>

        <?php
            include 'connection.php';
            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $balance = $_POST['balance'];
                $sql = "insert into users(name,email,balance) values('{$name}','{$email}','{$balance}')";
                $result = mysqli_query($connection,$sql);
                if($result) {
                    echo "<script>
                            alert('Hurray! User created');
                            window.location='sendMoney.php';
                        </script>";
                }
            }
        ?>

        <?php   
            include 'navigationBar.php';
        ?>

    <div class="container create-user-header-form ">
        <div class="create-user-header">
            <h4 class=" create-user-txt text-center">Create A User</h4> 
        </div>
        <div class="col create-form-img ">
            <div class="row row-md-12 create-user-img justify-content-between">
                <img  class="user-img" src="./user.png" alt="User Logo" >  
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputAmount">Amount</label>
                    <input type="number" class="form-control" id="exampleInputAmount" name="balance" placeholder="Enter Amount" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="crt-btn btn btn-secondary center " name="submit">Create</button>
                    <button type="reset" class="clr-btn btn btn-secondary center " name="reset">Clear</button>
                </div>
            </form>
        </div>
    </div>
            
        <?php
            include 'footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>