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
    $sql = "SELECT * FROM samsung_p WHERE id = '$id'";
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
    <title>Buy Product</title>
</head>
<script>
    var year, month, date, hour, minute, second, today;
        
        //อาเรย์เก็บชื่อวัน
        var dayString = new Array();
        dayString[0] = "อาทิตย์"; 
        dayString[1] = "จันทร์"; 
        dayString[2] = "อังคาร"; 
        dayString[3] = "พุธ"; 
        dayString[4] = "พฤหัสบดี"; 
        dayString[5] = "ศุกร์"; 
        dayString[6] = "เสาร์"; 
        //อาเรย์เก็บชื่อเดือน
        var monthString = new Array();
        monthString[0] = "มกราคม"; 
        monthString[1] = "กุมภาพันธ์";
        monthString[2] = "มีนาคม"; 
        monthString[3] = "เมษายน";
        monthString[4] = "พฤษภาคม"; 
        monthString[5] = "มิถุนายน";
        monthString[6] = "กรกฎาคม"; 
        monthString[7] = "สิงหาคม";
        monthString[8] = "กันยายน"; 
        monthString[9] = "ตุลาคม";
        monthString[10] = "พฤศจิกายน"; 
        monthString[11] = "ธันวาคม";
    
        function convert(input){
            var output = "0" + input;
            return (output.substring(output.length-2, output.length));
        }
        function now(){
            dt = new Date();
            year = dt.getFullYear();
            month = dt.getMonth();
            day = dt.getDay();
            date = dt.getDate();
            hour = dt.getHours();
            minute = dt.getMinutes();
            second = dt.getSeconds();
            today = "วัน" + dayString[day] + "ที่ " + date + " เดือน" + monthString[month] + " พ.ศ. " + (year+543) + "   เวลา " + convert(hour) + ":" + convert(minute) + ":" + convert(second) + " นาฬิกา";
            document.getElementById('dPanel').innerHTML=today;
            setTimeout("now()",1000);
        }
        function b(){
            alert("สั่งซื้อสำเร็จ ขอบคุณ");
            window.location.href="user_index.php";
        }
</script>
<body onload="now();" class="body-p">
    <!-- Navbar -->
    <?php include('navbar_user.php'); ?>
    <!-- End Navbar -->

    <!-- Maquee -->
    <div class="textmarq">
        <marquee direction="left" loop="-1" class="textq" style=" padding:  5px; font-family: Anakotmai; font-size: 20px; width: 1280x;" id="dPanel"></marquee>
    </div>

    <!-- Product box -->
    <div class="container2">
        <h2 class="buy-t">เลือกจำนวนสินค้า</h2>
        <form action="" method="post">
            <div class="product-con1">
                <!-- product-item -->
                <?php
                    $imageURL = 'uploads/'.$row['image'];
                ?>
                <div class="product-item1">
                    <div class="product-img1">
                        <img src="<?php echo $imageURL; ?>" alt="" height="150px" width="170px">
                    </div>
                    <div class="product-detail1">
                        <?php echo $row['namep']; ?>
                    </div>
                    <div class="product-price1">
                        <div class="product-left1">
                            <?php echo $row['price']; ?>
                        </div>
                        <div class="product-right1">
                            <input type="number" name="item_order" required>
                            <button type="submit" class="bb-btn" name="B_btn">เพิ่มจำนวน</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <hr>
        <div class="form-boxx">
            <form action="" method="post" class="form-b">
                <?php
                    if(isset($_POST['B_btn'])){
                        $N1 = $row['s_price'];
                        $N2 = $_POST['item_order'];
                        $sum_N = $N1 * $N2;
                
                        $_SESSION['s_price'] = $N1;
                        $_SESSION['item_order'] = $N2;
                        $_SESSION['order_price'] = $sum_N;
                        $_SESSION['order_text'] = "<p>จำนวนสินค้า $N2 ชิ้น ราคารวมทั้งหมด $sum_N บาท</p>";
                        echo $_SESSION['order_text'];
                    }
                ?>
                
                <div class="input-t">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" required>
                </div>
                <div class="input-t">
                    <label for="address">address</label>
                    <input type="text" name="address" required>
                </div>
                <div class="input-t">
                    <label for="email">Email</label>
                    <input type="text" name="email" required>
                </div>
                <div class="input-t">
                    <button type="submit" class="bb-btn" name="Ba_btn">สั่งซื้อ</button>
                </div>
            </form>
            <form action="" method="post" class="form-c">
                <?php
                    if(isset($_POST['Ba_btn'])){
                        $fullname = $_POST['fullname'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                ?>
                
                <div class="input-t">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" value="<?php echo $fullname; ?>" required>
                </div>
                <div class="input-t">
                    <label for="address">address</label>
                    <input type="text" name="address" value="<?php echo $address; ?>" required>
                </div>
                <div class="input-t">
                    <label for="email">Email</label>
                    <input type="text" name="email"  value="<?php echo $email; ?>" required>
                </div>
                <div class="input-t">
                    <img src="img/qr/qr1.jpg" alt="" width="232px" height="310px">
                </div>
                <div class="input-t">
                    <button type="submit" class="bb-btn" name="Baa_btn" onclick="b();">ยืนยัน</button>
                </div>
                <?php }?>
            </form>
        </div>
    </div>
</body>
</html>