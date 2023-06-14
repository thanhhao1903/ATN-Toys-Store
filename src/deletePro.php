<?php
    include_once 'connectProduct.php';
    $c = new Connect();
    $dblink = $c->connectToPDO();
	$pro_del = $_GET['del_id'];
    $query = "DELETE FROM product WHERE `product_id` =?";
    $stmt = $dblink->prepare($query);
    $success = $stmt->execute(array($pro_del));
	if($success)
	{
		header("location: proManagement.php");
	}
?>