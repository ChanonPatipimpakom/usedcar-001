<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Car</h1>
    </div>
    <p>
    <a href="index.php?category=post" class="btn btn-info pull-right">Post</a>
    </p>
</div>
<?php
        $sql = "SELECT * FROM car ORDER BY id";
        //include($page);
        $result = $conn->query($sql);
        if(!$result){
            echo "Error During Retrival";
        }
        else{
            //ดึงข้อมูล
            while($prd=$result->fetch_object()){
                $prd->id; //$prd["id]
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="thumbnail">
                    <a href="productdetail.php?pid=<?php echo $prd->id;?>">
                        <img src="image/<?php echo $prd->carpic;?>" alt="">
                    </a>
                    <div class="caption">
                    <h3><?php echo $prd->brand;?></h3>
                    <p><?php echo $prd->modelYear;?></p>
                    <p><?php echo $prd->license;?></p>
                    <p><Strong>Price: </Strong><?php echo $prd->price;?><Strong> Bath</Strong></p>
                    <p>
                        <a href="index.php?category=edit&pid=<?php echo $prd->id?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="deleteproduct.php?pid=<?php echo $prd->id?>" class="btn btn-danger linkDelete"><i class="glyphicon glyphicon-trash"></i></a>
                    </p>
                    </div>
                </div>
            </div>
            <?php
                }
            }
        ?>