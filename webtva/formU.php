<?php
    include("sever.php");
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: log-reg.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['fullname']);
        unset($_SESSION['address']);
        unset($_SESSION['email']);
        header('location: log-reg.php');
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    extract($row);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Form Update Customer</title>
</head>
<body class="body-log">
    <!-- Navbar -->
    <?php include('navbar_admin.php'); ?>
    <!-- End Navbar -->

    <!-- Form Upload Image $ data Product -->
    <section class="container3">

        <div class="form-box">
            <form action="UpdateF.php" method="post">
                <h1>Update Customer</h1>
                <div class="input-text">
                    <label for="id">ID: </label>
                    <input type="text" name="id" value="<?php echo $id;?>" disabled='disabled'>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                </div>
                <div class="input-text">
                    <label for="username">Username: </label>
                    <input type="text" name="username" value="<?php echo $username;?>">
                </div>
                <div class="input-text">
                    <label for="password">Password: </label>
                    <input type="password" name="password" value="<?php echo $password;?>">
                </div>
                <div class="input-text">
                    <label for="fullname">Fullname: </label>
                    <input type="text" name="fullname" value="<?php echo $fullname;?>">
                </div>
                <div class="input-text">
                    <label for="address">Address: </label>
                    <input type="text" name="address" value="<?php echo $address;?>">
                </div>
                <div class="input-text">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo $email;?>">
                </div>
            <button type="submit" class="submit-btn" name="formU-btn">Submit</button>
            </form>
        </div>
    </section>
    
</body>
</html>