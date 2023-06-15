<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="./css1/addPro_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

</body>

</html>
<?php
include_once 'header.php';
include_once 'connectProduct.php';
$dblink = $c->connectToPDO();
$sql = "SELECT * FROM product";
$stmt = $dblink->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_BOTH);

if (isset($_SESSION['Email'])) {
    $email = $_SESSION['Email'];
    $staff_id = $_SESSION['ID'];
    $shop = $_SESSION['Shop_id'];
    if (isset($_POST['btn-add'])) {
        $c = new Connect();
        $pro_id = $_POST ['pro_id'];
        $pro_name = $_POST['pro_name'];
        $price = $_POST['pro_price'];
        $cat_id = $_POST['cat_id'];
        $sup_id = $_POST['sup_id'];
        $image = $_POST['image'];
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];

        $sql = "INSERT INTO `product`(`product_id`, `product_name`, `product_price`, `cat_id`, `sup_id`, `image`) VALUES (?,?,?,?,?,?)";
        $re = $dblink->prepare($sql);
        $stmt = $re->execute(array("$pro_id","$pro_name", "$price", "$cat_id", "$sup_id", "$image"));
        $sql_1 = "INSERT INTO `storage`(`shop_id`, `product_id`, `quantity`, `staff_id`, `date`) VALUES (?,?,?,?,?)";
        $re = $dblink->prepare($sql_1);
        $stmt1 = $re->execute(array("$shop", "$pro_id", "$quantity", "$staff_id", "$date"));
        if ($stmt) {
            echo "Success";
        } else {
            echo "Error";
        }
    }
} else {
    header("Location: login.php");
}
?>

<div class="container">
    <div class="addPro">
        <h2>Add new product</h2>
        <form action="#" method="post">
            <div class="col-sm-10"><input type="text" name="pro_id" id="pro_id" class="form-control" placeholder="Enter product ID..." value="" required /></div>
            <div class="col-sm-10"><input type="text" name="pro_name" id="pro_name" class="form-control" placeholder="Enter product name..." value="" required /></div>
            <div class="col-sm-10"><input type="text" name="pro_price" id="price" class="form-control" placeholder="Enter product price..." value="" required /></div>
            <div class="col-sm-10 category">
                <select name="cat_id" id="cat_id">
                    <?php
                    include_once 'connectproduct.php';
                    $c = new connect();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM `category`";
                    $re = $dblink->query($sql);
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) :
                    ?>
                            <option value="<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></option>
                    <?php
                        endwhile;
                    else :
                        echo "Not found";
                    endif;
                    ?>
                </select>
            </div>
            <div class="col-sm-10">
                <select name="sup_id" id="sup_id">
                    <?php
                    include_once 'connectproduct.php';
                    $c = new connect();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM `supplier`";
                    $re = $dblink->query($sql);
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) :
                    ?>
                            <option name="sup_id" id="supplier" value="<?= $row['sup_id'] ?>"><?= $row['sup_name'] ?></option>
                    <?php
                        endwhile;
                    else :
                        echo "Not found";
                    endif;
                    ?>
                </select>
            </div>
            <div class="col-sm-10"><input type="file" name="image" id="image" class="form-control" value="" required /></div>
            <div class="col-sm-10"><input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity..." value="" required /></div>
            <div class="col-sm-10"><input type="date" name="date" id="date" class="form-control" value="" required /></div>
            <div class="add-btn"><input type="submit" class="btn btn-primary" name="btn-add" id="btnAdd" value="Add new product" /></div>
            <div class="back-btn"><a href="proManagement.php">Back to Product Management</a></div>
            <br>
        </form>
    </div>
</div>

<?php
include_once 'footer.php';
?>