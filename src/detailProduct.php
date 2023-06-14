<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - BuBu</title>
    <link rel="stylesheet" href="../css1/detailProduct.css">
</head>
<body>
<?php
    require_once 'header.php';
?>
<article>
    <div class="row pb-3">
        <?php
        include_once 'connectProduct.php';
        $c=new Connect();
        $dblink = $c->connectToMySQL();
        $pid= $_GET ['product_id'];
        $sql = "select * from product WHERE product_id ='$pid'";
        $re = $dblink->query($sql);
        $row = $re->fetch_assoc();
        ?>

        <img src="../img/<?=$row['image']?>" class="col-sm-6 col-form-label">
        <div class="col-sm-6 inf ">
            <h1><?=$row['product_name']?></h1>
            <hr>
            <h2>Price: <?=$row['product_price']?> vnd</h2>

            <form action="#" method="post">
                <input type="hidden" name="pid" value="<?=$pid?>">
                <p>Quantity: <input type="number" class="form-control" id="quantity" name="cart_quantity" value="1" placeholder="Quantity" min="1" max="<?=$row['quantity']?>"></p>
                <button type="submit" class="btn btn-primary" id="btn-cart" name="btn-add">Add to Cart</button>
            </form>
        </div>               
    </div>
</article>

<?php
require_once 'footer.php';
?>
</body>
</html>