<?php
    include('sever.php');
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
    <title>Web Akirai TVaaaa</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('navbar_user.php'); ?>
    <!-- End Navbar -->
    </div>
    
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
                <a href="#" class="btn-sm">Click Here!!</a>
            </div>
        </div>
        <!--LG Banner-->
        <div class="lgb">
            <div class="lg-thead">
                <h1>#Oledที่โอ<span>จริงกว่า10ปี</span></h1>
            </div>
            <div class="btn-lgb">
                <a href="#" class="btn-lg">Click Here!!</a>
            </div>
        </div>
        <!--TCL Banner-->
        <div class="tclb">
            <div class="tcl-thead">
                <h1>TCL TV</h1>
            </div>
            <div class="btn-tclb">
                <a href="#" class="btn-tcl">Click Here!!</a>
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
</body>
</html>