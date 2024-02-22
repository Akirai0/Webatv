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

    $emp_name = $_POST['emp_fullname'];
    $sql = "SELECT * FROM user WHERE fullname LIKE '%$emp_name%'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Edit Customer</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('navbar_admin.php'); ?>
    <!-- End Navbar -->

    <section class="container3">
        <div class="clock">
        <script>
        var centerX=150; var centerY=150; //ตำแหน่ง x,y ของจุดศูนย์กลาง
        var rX=100; var rY=100;           //ค่ารัศมีแนวแกน x และ y
        var red= (Math.PI*2)/12;          //เก็บค่ามุมเรเดียน Radian
                                          //โดยใช้สูตร (2*PI*r)/12 ให้ r เป็น 1 ได้ค่าประมาณ 0.5236 คือ ค่ามุม 1 ใน12 ส่วน
        //สร้างองค์ประกอบของนาฬิกา
        function makeClock(){
            //ทำซ้ำสร้างส่วนของตัวเลขหน้าปัดนาฬิกา โดยเริ่มที่เลข 12
            m = 0;
            for(n=0-red*3; n<=6-red*3; n+=red){
                document.write("<div style='font-size: 20; font-weight: bolder;");
                document.write("position: absolute; left:" + (centerX+rX*Math.cos(n)) + "px; top:" + (centerY+rY*Math.sin(n)) + "px;'>");
                if(m==0){
                    document.write("12</div>");
                }else{
                    document.write(m+"</div>");
                }
                m++;
            }

            //สร้างจุดสีน้ำเงิน 46 จุดเพื่อใช้ต่อเป็นเข็มวินาที
            for(n=0; n<45; n++){
                document.write("<div id='s" + n +"' style='position: absolute; font-size: 1px; width: 1px; height: 1px; background-color: blue;'></div>");
            }
            //สร้างจุดสีแดง 39 จุดเพื่อใช้ต่อเป็นเข็มวินาที
            for(n=0; n<39; n++){
                document.write("<div id='m" + n +"' style='position: absolute; font-size: 1px; width: 3px; height: 3px; background-color: red;'></div>");
            }
            //สร้างจุดสีเขียว 29 จุดเพื่อใช้ต่อเป็นเข็มวินาที
            for(n=0; n<29; n++){
                document.write("<div id='h" + n +"' style='position: absolute; font-size: 1px; width: 5px; height: 5px; background-color: green;'></div>");
            }
        }
        makeClock();

        function now(){
            dt = new Date();
            hour = dt.getHours();
            minute = dt.getMinutes();
            second = dt.getSeconds();
            x = centerX+5;
            y = centerY+7;
            for(n=0; n<45; n++){//ใช้จุดสีน้ำเงินที่สร้างมาต่อเป็นเข็มวินาที
                document.getElementById("s"+n).style.left = x+2*n*Math.cos((second/5)*red-red*3)+'px';
                document.getElementById("s"+n).style.top = y+2*n*Math.sin((second/5)*red-red*3)+'px';
            }
            for(n=0; n<39; n++){//ใช้จุดสีแดงที่สร้างมาต่อเป็นเข็มยาว
                document.getElementById("m"+n).style.left = x+2*n*Math.cos((minute/5)*red-red*3)+'px';
                document.getElementById("m"+n).style.top = y+2*n*Math.sin((minute/5)*red-red*3)+'px';
            }

            if(hour>=12) hour-=12;
            for(n=0; n<29; n++){//ใช้จุดสีเขียวที่สร้างมาต่อเป็นเข็มสั้น
                document.getElementById("h"+n).style.left = x+2*n*Math.cos(((hour*60+minute)/60)*red-red*3)+'px';
                document.getElementById("h"+n).style.top = y+2*n*Math.sin(((hour*60+minute)/60)*red-red*3)+'px';
            }
            setTimeout("now()", 1000);
        }
        now();
</script>
        </div>
        <h2>Show Member</h2>
        <form action="sc.php" method="post">
            <div class="input-s">
                <input type="text" name="emp_name" placeholder="กรอกชื่อ" required>
                <input type="submit" value="Submit" name="s-btn" class="s-btn">
            </div>
        </form>
    <?php if($count >0) {?>
        <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Fullname</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            <?php
                while($row = mysqli_fetch_array($result)){ 
                    echo "<tr>";
                    echo "<td>" .$row["id"] . "</td>";
                    echo "<td>" .$row["username"] . "</td>";
                    echo "<td>" .$row["password"] . "</td>";
                    echo "<td>" .$row["fullname"] . "</td>";
                    echo "<td>" .$row["address"] . "</td>";
                    echo "<td>" .$row["email"] . "</td>";
                    echo "<td><a href='formU.php?id=$row[id]'>Edit</a></td>";
                    echo "<td><a href='deleteU.php?id=$row[id]'>Delete</a></td>";
                    echo "</tr>";
                }    
            ?>
        </table>
    <?php }?>
    </section>
</body>
</html>