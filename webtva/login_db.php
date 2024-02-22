<?php
    session_start();
    include('sever.php');
    $errors = array();

    if(isset($_POST['log_user'])){
        // รับค่าตัวแปร
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
         // เช็คError
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }

        if(count($errors) == 0){
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['memberlevel'] = $row['memberlevel'];

                // เช็คเมมเบอร์
                if($_SESSION['memberlevel'] == 'a'){
                    header("location: admin_index.php");
                }else{
                    header("location: user_index.php");
                }
            }else{
                array_push($errors, "<script>alert('Wrong Username or Password Incorrect');</script>");
                $_SESSION['error'] = "<script>alert('Wrong Username or Password Incorrect');</script>";
                header("location: log-reg.php");
            }
        }
    }
?>