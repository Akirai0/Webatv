<?php
    session_start();
    include ('sever.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Login&Register Page</title>
</head>

<body class="body-log" onload="now();">
    <!-- Navbar -->
    <?php include('navbar_log.php'); ?>
    <!-- End Navbar -->
    <div class="textmarq">
        <marquee direction="left" loop="-1" class="textq" style="color: whitesmoke; padding:  5px; font-family: Anakotmai; font-size: 20px; width: 1280x;" id="dPanel"></marquee>
    </div>
    <!-- Login&Register Box-->
    <section class="container3">

        <div class="form-box">
            <!-- Login form -->
            <form class="login-form" action="login_db.php" method="post">
                <?php include('errors.php'); ?>
                <?php if(isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label for="username">Password</label>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </div>
                <div class="checkbox">
                    <span>
                        <input type="checkbox" id="login-checkbox">
                        <label for="login-checkbox">Remember Me</label>
                    </span>
                    <h5>Forget password ?</h5>
                </div>
                <button type="submit" class="submit-btn" name="log_user">Login</button>
                <h5 class="register-btn">Dont have an account ? <span style="color: red;">Register</span></h5>
            </form>
        
            <!-- Register Form -->
            <form class="register-form" action="register_db.php" method="post">
                <?php include('errors.php'); ?>
                <?php if(isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                <h1>Register</h1>
                        
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="password" name="password_1" required>
                    <label for="password_1">Password</label>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="password" name="password_2" required>
                    <label for="password_2">Confirm Password</label>
                    <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="text" name="fullname" required>
                    <label for="fullname">Fullname</label>
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="text" name="address" required>
                    <label for="address">Address</label>
                    <ion-icon name="home-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                    <ion-icon name="at-outline"></ion-icon>
                </div>
                <div class="input-mem">
                    <label for="">Member Level: </label>
                    <select name="memberlevel" id="memberlevel">
                        <option value="a">Admin</option>
                        <option value="m">User</option>
                    </select>
                </div>
                <div class="btn">
                    <button type="submit" name="reg_user" class="submit-btn">Register</button>
                    <h5 class="login-btn">Register before ? <span style="color: red;">Login</span></h5>
                </div>
            </form>
        </div>
    </section>
    

    <!-- script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
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
</body>
</html>