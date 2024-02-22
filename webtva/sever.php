<?php

    $conn = new mysqli("localhost", "root", "", "webatv_db");

    if($conn->connect_error){
        die("Connect Failed..." . $conn->connect_error);
    }
?>