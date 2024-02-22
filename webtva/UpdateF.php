<?php
    include("sever.php");

    if($_POST['id'] == ''){
        echo "<script>alert('Error Contact Admin');window.location = 'B.php';</script>";
    }

    $id = $_POST['id'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $position = $_POST['position'];
    $email = $_POST['email'];

    $sql = "UPDATE member SET first_name = '$firstname', last_name = '$lastname', position = '$position', email = '$email' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Update Successful'); window.location = 'B.php';</script>";
    }else{
        echo "<script>alert('Error Update Failed..'); window.location = 'B.php';</script>";
    }

?>