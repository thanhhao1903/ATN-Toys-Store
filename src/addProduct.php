<?php
    session_start();
    $a = false;
    if(isset($_POST['btn-add']))
    {
        $user_id = $_SESSION['ID'];
        $product_id = $_POST['pid'];
        $quantity = $_POST['cart_quantity'];
        include_once 'connectProduct.php';
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM cart WHERE product_id =? and user_id =?";
        $re = $dblink->prepare($sql);
        $re->execute(array($product_id, $user_id));
        $row = $re->fetchAll(PDO::FETCH_BOTH);
        foreach($row as $r)
        {
            if($r['product_id'] == $product_id)
            {
                $a = true;
                break;
            }
            else
            {
                $a = false;
            }
        }
        if($a==false)
        {
            if ($quantity <= 0) 
            {
                $quantity = 0;
                $quantity += 1;
            }
            include_once 'connectProduct.php';
            $c = new Connect();
            $dblink = $c->connectToPDO();
            $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `count_quantity`) VALUES(?,?,?)";
            $re = $dblink->prepare($sql);
            $st = $re->execute(array($user_id, $product_id, $quantity));
            if($st)
            {
                header("location: cart.php");
            }
        }
        else
        {
            $update = "UPDATE cart SET count_quantity = count_quantity + ? where user_id =? and product_id =?";
            $stmt = $dblink->prepare($update);
            $stmt->execute(array($quantity, $user_id, $product_id));
            if($stmt)
            {
                header("location: cart.php");
            }
        }
    }
?>