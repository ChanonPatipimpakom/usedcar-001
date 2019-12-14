<?php 
    session_start();
    include("connect.php");
    $pid = $_POST['hdnProductId'];
    $type =  $_POST['txtType'];
    $brand = $_POST['txtBrand'];
    $model = $_POST['txtModel'];
    $year = $_POST['txtYear'];
    $color = $_POST['txtColor'];
    $license = $_POST['txtLicense'];
    $pro = $_POST['txtPro'];
    $price = $_POST['txtPrice'];
    $filename = $_FILES["filePic"]["name"];
    $post = 1;
    $date = "2010-09-17";
    //$filename = $_FILES["filePic"]["name"];

    $sql = "UPDATE car SET carType='$type', brand='$brand', model='$color', color='$license', license='$license', province='$pro', modelYear='$year', price='$price', carpic='$filename', postedBy='$post', postedDate='$date' WHERE id = $pid";
    //echo $sql;
    $result = $conn->query($sql);
        if(!$result){
            echo "Error during update product: ".$conn->error;
        }
        else{
            header("Location: index.php");
        }
?>