<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category - BuBu</title>
    <link rel="stylesheet" href="../css1/category.css">
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
    $sql = "SELECT * FROM category";
    $stmt = $dblink->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_BOTH);

    if(isset($_SESSION['Email']))
    {   
        $email = $_SESSION['Email'];
        $staff_id = $_SESSION['ID'];
        if(isset($_POST['btn-category']))
        {
        $c = new Connect();
        $cat_name = $_POST['cat_name'];
        $cat_id = $_POST['cat_id'];

        $sql = "INSERT INTO `category`(`cat_id`, `cat_name`) VALUES (?,?)";
        $re = $dblink->prepare($sql);

        $stmt = $re->execute(array("$cat_id","$cat_name"));
        if($stmt){
                echo "Success";
        }
        else{
                echo "Error";
        }
        }
    }
    else 
    {
        header("Location: login.php");
    }
?>

<div class="container">
    <h1 class="fw-bold mb-0 text-black">Category Management</h1>
    <table class="table table-bordered category-inf">
        <tr>
            <th scope="col">Category ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
        </tr>
        <hr>
    </table>
    <div class="cat-input">
        <form action="#" method="post">
            <input type="text" class="form-control" id="cat_id" name="cat_id" placeholder="Category ID" required>
            <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Category Name" required>
            <button type="submit" class="btn btn-primary" id="btn-category" name="btn-category">Add Category</button>
        </form>
    </div>
    <hr>
    <?php
    foreach ($rows as $row) 
    {
    ?>
    <div class="table table-bordered category-list">
        <form action="updateCat.php" method="post">
            <input class="form-control" type="text" name="cat_id" value="<?=$row['cat_id']?>" disabled>
            <input type="hidden" name="cat_id" value="<?=$row['cat_id']?>">
            <input class="form-control" type="text" name="cat_name" value="<?=$row['cat_name']?>" required>
            <button type="submit" name="update_cat" value="<?=$row['cat_id']?>" class="form-control">Update</button>
            <a href="deleteCategory.php?del_id=<?=$row['cat_id']?>" class="delete"><i class="bi bi-trash-fill"></i></a>
        </form>
    </div>
    <?php
    }
    ?>
    <hr style="margin-bottom: 35px;">
    <div class="btn-back"><a href="brand.php">Back to Category</a></div>
</div>
<br>
<?php
    include_once 'footer.php';
?>