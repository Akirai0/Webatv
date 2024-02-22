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

    $sql = "SELECT * FROM samsung_p";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    extract($row);

    if(isset($_POST['B_btn'])){
        $N1 = $row['s_price'];
        $N2 = $_POST['item_order'];
        $sum_N = $N1 * $N2;

        $_SESSION['s_price'] = $N1;
        $_SESSION['item_order'] = $N2;
        $_SESSION['order_price'] = $sum_N;
        $_SESSION['order_text'] = "<p>จำนวนสินค้า $N2 ชิ้น ราคารวมทั้งหมด $sum_N บาท</p>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Order Page</title>
</head>
<body onload="now();" class="body-p">
    <!-- Navbar -->
    <?php include('navbar_admin.php'); ?>
    <!-- End Navbar -->

    <!-- Product -->
    <section class="container">
        <!-- Maquee -->
        <div class="textmarq">
            <marquee direction="left" loop="-1" class="textq" style=" padding:  5px; font-family: Anakotmai; font-size: 20px; width: 1280x;" id="dPanel"></marquee>
        </div>

        <!-- Product box -->
        <h2>สินค้า Samsung ทั้งหมด</h2>
        <div class="container2">
            <div class="product-con2">
                <!-- product-item -->
                <?php
                    $imageURL = 'uploads/'.$row['image'];
                ?>
                    <div class="product-item2">
                        <div class="product-img2">
                            <img src="<?php echo $imageURL; ?>" alt="" height="150px" width="170px">
                        </div>
                        <div class="product-detail2">
                            <?php echo $row['namep']; ?>
                        </div>
                        <div class="product-price2">
                            <div class="product-left2">
                                <?php echo $_SESSION['order_text'];?>
                                <?php echo $_SESSION['username']; ?><br>
                                <?php echo $_SESSION['username']; ?><br>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
</body>
</html>