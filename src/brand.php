<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category - BuBu</title>
    <link rel="stylesheet" href="../css1/homepage.css">
    <link rel="stylesheet" href="../css1/brand.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
<?php
    require_once 'header.php';
?>
</head>

<body>
    <div class="content-container">
        <div style="width: fit-content; margin: 0 auto; padding-bottom: 10px;">
            <a href="category.php" style="text-decoration: none; font-weight: bold; color: red;">Category Management</a>
        </div>
        <div class="cate-list">
            <?php
            include_once 'connectProduct.php';
            $c = new Connect();
            $dblink = $c->connectToMySQL();
            $sql = "SELECT DISTINCT c.cat_id, c.cat_name FROM category c INNER JOIN product p ON c.cat_id = p.cat_id";
            $re = $dblink->query($sql);
            $row1 = $re->fetch_row();
            $re->data_seek(0);
            while ($row = $re->fetch_assoc()) 
            {
                $href = "?cat_id=$row[cat_id]";
                echo "<a href='$href'>$row[cat_name]</a>";
            }
            ?>
        </div>
    </div>
    <div class="about">
        <nav class="container mx-auto">
            <div class="row mx-auto d-flex">
            <?php
                include_once 'connectProduct.php';
                $c = new Connect();
                $dblink = $c->connectToMySQL();
                $cat_id = $_GET['cat_id'] ?? '';
                $sql = "SELECT * FROM product WHERE cat_id LIKE ('$cat_id')";
                $re = $dblink->query($sql);
                $row1 = $re->fetch_row();
                $re->data_seek(0);
                if ($re->num_rows > 0):
                    while ($row = $re->fetch_assoc()):
                    ?>
                        <div class="toy_box col-md-3 pd-3 mx-auto">
                            <div class="toy_card">
                                <a href="detailProduct.php?product_id=<?=$row['product_id']?>">
                                <img src="../img/<?=$row['image']?>" alt=""></a>
                                <h2 class="card-text"><?= $row['product_name'] ?></h2>
                                </a>
                                <p class="card-subtitle mb-2 text-muted"><?=$row['product_price']?> $</p>
                            </div>
                        </div>
                    <?php
                    endwhile;      
                endif;
                ?>
            </div>
        </nav>
    </div>

    <?php
    require_once 'footer.php';
    ?>
</body>
</html>
