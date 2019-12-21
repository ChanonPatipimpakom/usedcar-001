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

    $picture = $_POST["hdnProductPic"];
    //$filename = $_FILES["filePic"]["name"];

    if($_FILES['filePic']['name']!=""){
        //อัปโหลดไฟล์โดยเอาชื่อเข้ามาด้วย
        $picture = $_FILES["filePic"]["name"];
        //move file
        move_uploaded_file($_FILES["filePic"]["tmp_name"],"image/".$_FILES["filePic"]["name"]);
    }

    $sql = "UPDATE car SET carType='$type', brand='$brand', model='$color', color='$license', license='$license', province='$pro', modelYear='$year', price='$price', carpic='$picture', postedBy='$post', postedDate='$date' WHERE id = $pid";
    //echo $sql;
    $result = $conn->query($sql);
        if(!$result){
            echo "Error during update product: ".$conn->error;
        }
        else{
            header("Location: index.php");
        }
?>