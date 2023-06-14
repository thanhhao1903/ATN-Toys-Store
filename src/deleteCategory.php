<?php
    include_once 'connectProduct.php';
    $c = new Connect();
    $dblink = $c->connectToPDO();
	$cat_del = $_GET['del_id'];
    $query = "DELETE FROM category WHERE `cat_id` =?";
    $stmt = $dblink->prepare($query);
    $success = $stmt->execute(array($cat_del));
	if($success)
	{
		header("location: category.php");
	}
?>