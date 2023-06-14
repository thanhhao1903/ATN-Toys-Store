<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - BuBu</title>
    <link rel="stylesheet" href="../css1/search.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    
</body>
</html>
<!-- Header -->
<?php
require_once 'header.php';
?>
    <h1>Result for "<?= $_GET['search']?>"</h1>
    
<?php
    include_once 'connectProduct.php';
    $c = new Connect();
    $dblink = $c->connectToPDO();
    $nameP = $_GET['search'];
    $sql = "SELECT * FROM product where product_name LIKE ?";
    $re = $dblink->prepare($sql);
    $re->execute(array("%$nameP%"));
    $rows = $re->fetchAll(PDO::FETCH_BOTH);
    foreach ($rows as $r):
?>
    <div class="t-shirt_box">
        <div class="t-shirt_card">
            <a href="detailProduct.php?product_id=<?=$r['product_id']?>" class="text-decoration-none">
            <img src="../img/<?=$r['image']?>" alt=""></a>
            <h2 class="card-title"><?=$r['product_name']?></h2>
            <p class="card-subtitle mb-2 text-muted"><?=$r['product_price']?><span>&#8363;</span></p>
        </div>
    </div>
<?php
endforeach;
?>

<?php
    include_once 'footer.php';
?>