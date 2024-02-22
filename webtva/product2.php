<?php
    include('sever.php');
    $sqls = "SELECT * FROM lg_P";
    $result = $conn->query($sqls);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Product Page</title>
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

        function a(){
            alert("กรุณา Login ก่อนสั่งซื้อ");
            window.location.href="log-reg.php";
        }
</script>
<body onload="now();" class="body-p">
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- End Navbar -->

    <!-- Product -->
    <section class="container">
        <!-- Maquee -->
        <div class="textmarq">
            <marquee direction="left" loop="-1" class="textq" style=" padding:  5px; font-family: Anakotmai; font-size: 20px; width: 1280x;" id="dPanel"></marquee>
        </div>

        <!-- Product box -->
        <h2>สินค้า LG ทั้งหมด</h2>
        <div class="container2">
            <div class="product-con">
                <!-- product-item -->
                <?php
                    while($row = mysqli_fetch_array($result)){
                        $imageURL = 'uploads/'.$row['image'];
                    ?>
                    <div class="product-item">
                        <div class="product-img">
                            <img src="<?php echo $imageURL; ?>" alt="" height="150px" width="170px">
                        </div>
                        <div class="product-detail">
                            <?php echo $row['namep']; ?>
                        </div>
                        <div class="product-price">
                            <div class="product-left">
                                <?php echo $row['price']; ?>
                            </div>
                            <div class="product-right">
                                <a onclick="a();">สั่งซื้อ</a>
                            </div>
                        </div>
                    </div>
                <?php     
                    }
                ?>
            </div>
        </div>
    </section>

     <!-- script -->
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>