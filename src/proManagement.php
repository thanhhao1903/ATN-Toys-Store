<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="./css1/proManagement.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

</body>
</html>
<?php
include_once 'header.php';
include_once 'connectProduct.php';
$c = new Connect();
if(!isset($_SESSION))
{
    session_start();
}
$dblink = $c->connectToMySQL();
$sql = "SELECT p.product_id, p.product_name, p.product_price, p.image, storage.quantity FROM `storage` INNER JOIN product AS p ON p.product_id = storage.product_id";
$stmt = $dblink->query($sql);
// $stmt->execute();
// $rows = $stmt->fetch(PDO::FETCH_BOTH);

if (isset($_SESSION['Email'])) {
    $email = $_SESSION['Email'];
    $staff_id = $_SESSION['ID'];
} else {
    header("Location: login.php");
}
?>

<div class="container">
    <div class="title">
        <h1 class="fw-bold mb-0 text-black">Product Management</h1>
        <span class="btn-add"><a href="addPro_page.php">Add new products</a></span>
    </div>
    <table class="table table-bordered product-inf">
        <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            <hr>
        </tr>
    </table>
    <hr>
    <?php
    // foreach ($rows as $row) {
        if($stmt->num_rows > 0) :
            while($row=$stmt->fetch_assoc()) :
    ?>
        <div class="table table-bordered product-list">
            <input class="form-control" type="text" id="id" name="product_id" value="<?= $row['product_id'] ?>" disabled>
            <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
            <input class="form-control" type="text" id="name" name="product_name" value="<?= $row['product_name'] ?>" required>
            <input class="form-control" type="text" id="price" name="price" value="<?= $row['product_price'] ?>" required>  
            <input class="form-control" type="text" id="quantity" name="quantity" value="<?= $row['quantity'] ?>" required>
            <img src="./img/<?=$row['image']?>" name="image" id="image" alt=""></a> 
            <button type="submit" name="update_pro" value="<?= $row['product_id'] ?>" class="form-control">Update</button>
            <a href="deletePro.php?del_id=<?= $row['product_id'] ?>" class="delete"><i class="bi bi-trash-fill"></i></a>
        </div>
        <hr>
    <?php
    endwhile;
    else :
        echo 'Not found';
    endif;
    ?>
</div>
<br>
<?php
include_once 'footer.php';
?>