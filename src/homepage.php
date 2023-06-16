<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN-Toys Store</title>
    <link rel="stylesheet" href="./css1/homepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <section>
        
        <!-- Header -->
        <?php
        require_once 'header.php';
        ?>

        <!-- Content -->
        <div class="texts">
            <h1>ATN <span>Toys Store</span></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, facilis amet nisi ad ipsum rem pariatur possimus ratione accusantium sed optio illo. Maxime sint suscipit iste iure. Magni, iure voluptates.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae itaque soluta illo, praesentium culpa molestiae eveniet, alias non autem deserunt maiores animi quidem sapiente ad dicta? Animi necessitatibus esse reiciendis?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae itaque soluta illo
            </p>
        </div>
        <div class="background_image">
            <img src="./img/background.png" alt="">
        </div>
    </section>
    <div class="about">
        <hr>
        <div class="container mx-auto">
            <h1>All product</h1>
            <div class="row mx-auto d-flex">
                <?php
                    include_once 'connectProduct.php';
                    $c=new connect();
                    $dblink = $c->connectToMYSQL();
                    $sql= "select * from product"; // where $_GET['id'];
                    $re = $dblink->query($sql);
                    $row1 = $re->fetch_row();
                    echo"<br>";
                    $re->data_seek(0);
                    if($re->num_rows>0):
                    while($row=$re->fetch_assoc()):
                ?>
                    <div class="toy_box col-md-3 pd-3 mx-auto">
                        <div class="toy_card">
                            <a href="detailProduct.php?product_id=<?=$row['product_id']?>">
                            <img src="./img/<?=$row['image']?>" alt=""></a>
                            <h2 class="card-title"><?=$row['product_name']?></h2>
                            <p class="card-subtitle mb-2 text-muted"><?=$row['product_price']?> $</p>
                        </div>
                    </div>

                    <?php
                    endwhile;
                    else:
                    echo "Not found";
                    endif;
                    ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require_once 'footer.php';
    ?>
</body>
</html>