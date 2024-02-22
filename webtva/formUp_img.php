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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Form Upload DataProduct</title>
</head>
<body class="body-log">
    <!-- Navbar -->
    <?php include('navbar_admin.php'); ?>
    <!-- End Navbar -->

    <!-- Form Upload Image $ data Product -->
    <section class="container3">

        <div class="form-box1">
            <form action="uploadimg.php" method="post" enctype="multipart/form-data">
                <h1>Upload DataProduct</h1>
                <div class="input-box">
                    <input type="text" name="namep" required>
                    <label for="namep">Name Product</label>
                </div>
                <div class="input-box">
                    <input type="text" name="price" required>
                    <label for="price">Price</label>
                </div>
                <div class="input-box">
                    <input type="file" name="file" accept="image/gif, image/jpeg, image/png, image/avif">
                    <label for="upload">upload Image</label>
                </div>
                <div class="input-mem">
                    <label for="">Product Band: </label>
                    <select name="Pband" id="Pband">
                        <option value="ss">Samsung</option>
                        <option value="l">LG</option>
                        <option value="s">TCL</option>
                    </select>
                </div>
                <button type="submit" class="submit-btn" name="formUp-btn">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>