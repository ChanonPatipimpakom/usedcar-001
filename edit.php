<?php
    include("connect.php");
    if(!isset($_GET['pid']) || $_GET['pid']==""){
        header("Location:index.php");
    }
    else{
        $pid = $_GET['pid'];
    }

    $sql = "SELECT * FROM car WHERE id=$pid";
    $result = $conn->query($sql);
    if(!$result){
        echo "Error ".$conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd = NULL;
        }
    }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Car</h1>
    </div>
</div>
    <div class="row">
        <form action="updatepro.php" class="form-horizontal" method="post" enctype="multipart/form-data">
        <img src="image/<?php echo $prd->carpic;?>" alt="" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 thumbnail">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="name" class="control-label col-md-3">ประเภทรถ: </label>
                <div class="col-md-8">
                <select name="txtType" class="form-control" id="">
                    <option value="">Select...</option>
                    <option value="1">รถเก๋ง</option>
                    <option value="2">รถกระบะ</option>
                    <option value="3">รถตู้</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-md-3">ยี่ห้อรถ: </label>
                <div class="col-md-8">
                    <input type="text" name="txtBrand" class="form-control" value="<?php echo $prd->brand;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="control-label col-md-3">รุ่น: </label>
                <div class="col-md-8">
                    <input type="text" name="txtModel" class="form-control" value="<?php echo $prd->model;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="stock" class="control-label col-md-3">ปี: </label>
                <div class="col-md-8">
                    <input type="text" name="txtYear" class="form-control" value="<?php echo $prd->modelYear;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="stock" class="control-label col-md-3">สี: </label>
                <div class="col-md-8">
                    <input type="text" name="txtColor" class="form-control" value="<?php echo $prd->color;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="stock" class="control-label col-md-3">เลขทะเบียน: </label>
                <div class="col-md-8">
                    <input type="text" name="txtLicense" class="form-control" value="<?php echo $prd->license;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="stock" class="control-label col-md-3">จังหวัด: </label>
                <div class="col-md-8">
                    <input type="text" name="txtPro" class="form-control" value="<?php echo $prd->province;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="stock" class="control-label col-md-3">ราคา: </label>
                <div class="col-md-8">
                    <input type="text" name="txtPrice" class="form-control" value="<?php echo $prd->price;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="picture" class="control-label col-md-3">รูปภาพ: </label>
                <div class="col-md-6">
                    <input type="file" name="filePic" class="form-control-file" accept="image/*">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <input type="hidden" name="hdnProductId" value="<?php echo $prd->id;?>">
                    <input type="hidden" name="hdnProductPic" value="<?php echo $prd->carpic;?>">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
</div>
    </div>