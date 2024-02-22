<?php
    session_start();
    include_once 'sever.php';
    $statusMsg = "";

    // 
    $targetDir =  "uploads/";

    if(isset($_POST['formUp-btn'])){
        $namep = mysqli_real_escape_string($conn, $_POST['namep']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $Pband = mysqli_real_escape_string($conn, $_POST['Pband']);

        if(!empty($_FILES["file"]["name"])){
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'avif');
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                    if($Pband == 'ss'){
                        $insert = $conn->query("INSERT INTO samsung_p(image, namep, price) VALUES ('".$fileName."', '$namep', '$price')");
                        if($insert){
                            header("location: product_admin.php");
                        }
                    }elseif($Pband == 'l'){
                        $insert = $conn->query("INSERT INTO lg_p(image, namep, price) VALUES ('".$fileName."', '$namep', '$price')");
                        if($insert){
                            header("location: product_admin2.php");
                        }
                    }else{
                        $insert = $conn->query("INSERT INTO tcl_p(image, namep, price) VALUES ('".$fileName."', '$namep', '$price')");
                        if($insert){
                            header("location: product_admin3.php");
                        }
                    }
                }
            }
        }
        
    }
?>