<?php
    include("sever.php");
    
    $D_id = $_REQUEST['id'];
    $sql = "DELETE FROM user WHERE id = '$D_id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>window.location = 'edit_c.php';</script>";
    }

?>