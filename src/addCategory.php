<?php
    session_start();
    if(isset($_POST['btn-addCategory']))
    {
        $user_id = $_SESSION['ID'];
        $cat_id = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
        include_once 'connectProduct.php';
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "INSERT INTO `category`(`CAT_ID`, `catName`) VALUES(?,?)";
        $re = $dblink->prepare($sql);
        $st=$re->execute(array($cat_id, $cat_name));
        if($st)
        {
            header("location: category.php");
        }
    }
?>