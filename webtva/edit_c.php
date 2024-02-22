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

    $sqls = "SELECT * FROM user";
    $result = $conn->query($sqls);
?>
<!-- html showmember -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Edit Customer</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('navbar_admin.php'); ?>
    <!-- End Navbar -->

    <section class="container3">
        <h2>Show Member</h2>
        <form action="" method="post">
            <?php 
                if(isset($_POST['s-btn'])){
                    $emp_name = $_POST['emp_fullname'];
                    $sql = "SELECT * FROM user WHERE fullname LIKE '%$emp_name%'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                }
            ?>
            <div class="input-s">
                <input type="text" class="box-e" name="emp_fullname" placeholder="กรอกชื่อเพื่อค้นหา" required>
                <button type="submit" name="s-btn" class="s-btn">ค้นหา</button>
                <button type="reset" name="s-btn" class="s-btn"><a href="edit_c.php">Reset</a></button>
            </div>
        </form>
        <table >
                <tr>
                    <th width="3%">ID</th>
                    <th width="20%">Username</th>
                    <th width="10%">Password</th>
                    <th width="30%">Fullname</th>
                    <th width="30%">Address</th>
                    <th width="10%">Email</th>
                    <th>Edit</th>
                    <th >Delete</th>
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
    </section>
</body>
</html>