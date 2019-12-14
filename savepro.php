<?php
    include("connect.php");
    //echo ini_get("upload_max_filesize")."<br>";
    $allowType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filePic"]["type"]);
    $size = $_FILES["filePic"]["size"]/1024/1024;
    
    if(!in_array($fileType[1],$allowType)){
        //เมื่ออัพโหลดไฟล์ที่ไม่ตรงกัน
        echo "Non-image file is not allowed";
    }
    else if($size>1.00){
        echo "file size exceeds the maximun treshold.";
    }
    else{
        $type = $_POST['txtType'];
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
        /*echo "Name: ".$_FILES["filePic"]["name"] . "<br>";
        echo "Size: ".$_FILES["filePic"]["size"] . "<br>";
        echo "Temp name: ".$_FILES["filePic"]["tmp_name"] . "<br>";
        echo "Error: ".$_FILES["filePic"]["error"] . "<br>";*/

        move_uploaded_file($_FILES["filePic"]["tmp_name"],"image/".$_FILES["filePic"]["name"]);

        $sqlInsert = "INSERT INTO car (carType,brand,model,color,license,province,modelYear,price,carpic,postedBy,postedDate) VALUE('$type', '$brand', '$model', '$color', '$license', '$pro', '$year', '$price', '$filename', '$post', '$date')";

        //echo $sqlInsert;
        $result = $conn->query($sqlInsert);
            if($result){
                echo "<script> alert('Inser Product Complete'); </script>"; 
                header("Location: index.php");
            }
            else{
                echo "Error during insert product: ".$conn->error;
            }
    }
?>