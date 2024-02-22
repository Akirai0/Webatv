<?php
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['fullname']);
    unset($_SESSION['address']);
    unset($_SESSION['email']);
    unset($_SESSION['memberlevel']);
    header("location: index.php");
?>