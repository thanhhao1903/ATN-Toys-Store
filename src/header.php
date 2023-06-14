<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../css1/header.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>
<style>

</style>
<body>
    <header>
        <a href="homepage.php"><img src="../img/logo.png  " alt="" class="logo"></a>
        <ul>    
            <li><a href="homepage.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="brand.php">Category</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="proManagement.php">Product Management</a></li>
            <li>
                <div class="cart" style="font-size: 23px;"><a href="#"><i class='bx bx-cart-add'></i></a></div>
            </li>
        </ul>
        <div class="search">
            <form class="searchbox" action="search.php" method="#">     
                <input type="text" class="form-control" placeholder="Search for toys..." name="search">
                <button class="search_button" name="btnSearch"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="navbar-nav account">
            <?php
                if(isset($_SESSION['Email'])):
            ?>
                <p href="#" class="content">Welcome, <?=$_SESSION['Email']?></p>
                <div id="logout" ><a href="logout.php" class="logout">Logout</a></div>
            <?php
                else:
            ?>
                <div class="header_right">
                    <div>
                        <a href="login.php">Account</a>
                    </div>
                </div>
            <?php
                endif;
            ?>
        </div>
    </header>
</body>
</html>