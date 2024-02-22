<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Web Akirai TV</title>
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
    </script>
</head>
<body onload="now();">
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- End Navbar -->
    <section class="container">
        <!-- Text Marquee -->
        <div class="textmarq">
            <marquee direction="left" loop="-1" class="textq" style=" padding:  5px; font-family: Anakotmai; font-size: 25px; width: 1280x;" id="dPanel"></marquee>
        </div>
        <!--Samsung Banner-->
        <div class="smb">
            <div class="smb-thead">
                <h1>ซัมซุงเครื่องใหม่จอใหญ่สุดแขน</h1>
            </div>
            <div class="smb-text">
                <p>ทีวีราคาเริ่มต้นเพียง 13,990.- <br>
                    ใส่โค้ด "TVUPGRADE" ลดเพิ่ม 5% จากราคาโปรโมชั่น<br>
                    <br>
                    โปรโมชั่นวันที่ 1 - 31 ต.ค. 2023</p>
            </div>
            <div class="btn-smb">
                <a href="product.php" class="btn-sm">Click Here!!</a>
            </div>
        </div>
        <!--LG Banner-->
        <div class="lgb">
            <div class="lg-thead">
                <h1>#Oledที่โอ<span>จริงกว่า10ปี</span></h1>
            </div>
            <div class="btn-lgb">
                <a href="product2.php" class="btn-lg">Click Here!!</a>
            </div>
        </div>
        <!--TCL Banner-->
        <div class="tclb">
            <div class="tcl-thead">
                <h1>TCL TV</h1>
            </div>
            <div class="btn-tclb">
                <a href="product3.php" class="btn-tcl">Click Here!!</a>
            </div>
        </div>
    </section>
    
    <footer>
        <div id="contactme">
            <p class="ftext">Create by Thanupat Buakamsri</p>
            <p class="ftext">Contact ME!!</p>
            <div class="footer-add">
                <a href="https://twitter.com/Akirai_0"><img src="img/logo/twitter-logo.png" alt="" class="twitter-footer"></a>
                <a href="https://www.facebook.com/akirai.0.e.x.e"><img src="img/logo/facebook-logo.png" alt="" class="facebook-footer"></a>
            </div>
            Thanupat Buakamsri &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>. All Rights Reserved
        </div>
    </footer>

    <!-- script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>