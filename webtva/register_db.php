<?php
    session_start();
    include ('sever.php');

    $errors = array();

    if(isset($_POST['reg_user'])){
        // รับค่าตัวแปร
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $memberlevel = mysqli_real_escape_string($conn, $_POST['memberlevel']);


        // เช็คError
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($email)){
            array_push($errors, "Email is required");
        }
        if(empty($password_1)){
            array_push($errors, "Password is required");
        }
        if($password_1 != $password_2){
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['username'] === $username){
                array_push($errors, "Username already exists");
            }

            if($result['email'] === $email){
                array_push($errors, "Email already exists");
            }
        }

        // ถ้า Error = 0 ให้เพิ่มข้อมูลไปในฐานข้อมูล
        if(count($errors) == 0){
            $password = $password_1;

            $sql = "INSERT INTO user (username, password, fullname, address, email, memberlevel) VALUES ('$username', '$password', '$fullname', '$address', '$email', '$memberlevel')";
            mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['address'] = $address;
            $_SESSION['email'] = $email;
            $_SESSION['memberlevel'] = $memberlevel;
            $_SESSION['success'] = "You are now logged in";
            header('location: log-reg.php');
        }else{
            array_push($errors, "<script>alert('Wrong Username or Email already exists');</script>");
            $_SESSION['error'] = "<script>alert('Wrong Username or Email already exists');</script>";
            header("location: log-reg.php");
        }
        
    }
?>