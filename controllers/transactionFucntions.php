<?php include "../models/transactionModel.php";
$db = new transactionModel();
$prod = new productModel();
$submit = isset($_REQUEST['submit'])?$_REQUEST['submit']:NULL;
$page = isset($_SESSION['page'])?$_SESSION['page']:NULL;

if($page == "cash_home.php"):
$getbread = $prod->getbread();
$getorder = $db->getorder();
$gettotal = $db->gettotal();

print_r($gettotal);
endif;


if($submit == "addorder"):
$order['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
$order['qty'] = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
$addorder = $db->addorder($order);
$getorder = $db->getorder();

endif;


	
?>