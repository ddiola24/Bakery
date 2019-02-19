<?php include "../models/transactionModel.php";
$db = new transactionModel();
$usr = new userModel();
$prod = new productModel();
$submit = isset($_REQUEST['submit'])?$_REQUEST['submit']:NULL;
$page = isset($_SESSION['page'])?$_SESSION['page']:NULL;

$getproducts = $prod->getproducts();
//$getusers = $usr->getuser($id);



if($page == "cash_home.php"):
	$getbread = $prod->getbread();
	$getdrink = $prod->getdrink();
	$getothers = $prod->getothers();
	$getorder = $db->getorder();
	$gettotal = $db->gettotal();
endif;


if($submit == "addorder"):
	$order['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
	$order['qty'] = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
	$order['uid'] = isset($_REQUEST['uid'])?$_REQUEST['uid']:NULL;
	$order['promo'] = isset($_REQUEST['promo'])?$_REQUEST['promo']:NULL;

	$addorder = $db->addorder($order);
	$prodprice = $db->checkprodprice($order['pid']);	
	$price = $prodprice[0]['price'];

	//echo $order['promo']." ".$price." ".$order['qty'];

	$multiple = ($order['qty'] % 20);

	if($order['promo'] == 'PAN20' && $price == '5.00' && $multiple != 0 ){
		//echo "promo";
		$getorder = $db->getorderpromo();
		//print_r($getorder);
		$gettotal = $db->gettotalpromo();
	}else{
		$getorder = $db->getorder();
		$gettotal = $db->gettotal();
	}
	
endif;

if($submit == "removeorder"):
	$order['pid']= isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
	$removeorder = $db->removeorder($order);
	$getorder = $db->getorder();
	$gettotal = $db->gettotal();
endif;

if($submit == "pay"){
	$pay['payment'] = isset($_REQUEST['payment'])?$_REQUEST['payment']:NULL;
	$pay['grandtotal'] = isset($_REQUEST['grandtotal'])?$_REQUEST['grandtotal']:NULL;
	$pay['customername'] = isset($_REQUEST['customername'])?$_REQUEST['customername']:NULL;
	$pay['uid'] = isset($_REQUEST['uid'])?$_REQUEST['uid']:NULL;
	$pay['tax'] = $pay['grandtotal']*.12;
	$pay['change'] = $pay['payment']-$pay['grandtotal'];
	$pay['salesid'] = substr(md5(uniqid()),0,5);
	$pay['desc'] = isset($_REQUEST['customername'])?$_REQUEST['customername']:NULL;

	$addsales = $db->addsales($pay);
	while($addsales == '1062'){
		$pay['salesid'] = substr(md5(uniqid()),0,5);
		$addsales = $db->addsales($pay);
		if($addmember == '101'){
			break;
		}
	}
	$getorder = $db->getorder();
	$sid = $pay['salesid'];
	//print_r($getorder);
	error_reporting(E_ERROR | E_PARSE); foreach ($getorder as $index => $order):
	//print_r($order['prodid']);
	$addsalesdetail = $db->addsalesdetail($sid,$order);
	endforeach;

	if($addsales && $addsalesdetail){
		$prod = new productModel();
		$getorder = $db->getorder();
		error_reporting(E_ERROR | E_PARSE); foreach ($getorder as $index => $order):
		$updatestock = $prod->updatestock($order);
		endforeach;
		$emptyorder = $db->turncateorder();
		$getorder = $db->getorder();
		$gettotal = $db->gettotal();
		
		
	}
	//$db->turncateorder();
}
//ADD PRODUCTS
if($submit == "addprod"){
	$product['pname'] = isset($_REQUEST['pname'])?$_REQUEST['pname']:NULL;
	$product['pdescs'] = isset($_REQUEST['pdescs'])?$_REQUEST['pdescs']:NULL;
	$product['price'] = isset($_REQUEST['price'])?$_REQUEST['price']:NULL;
	$product['qty'] = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
	$product['category'] = isset($_REQUEST['category'])?$_REQUEST['category']:NULL;

	$addprod = $prod->addproduct($product);
	$getproducts = $prod->getproducts();
}

if($submit == "deleteprod"){
	$product['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;

	$deleteprod = $prod->deleteproduct($product['pid']);
	$getproducts = $prod->getproducts();
}

if($submit == "adduser"){

	$user['uname'] = isset($_REQUEST['uname'])?$_REQUEST['uname']:NULL;
	$user['fname'] = isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
	$user['lname'] = isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
	$user['mname'] = isset($_REQUEST['mname'])?$_REQUEST['mname']:NULL;
	$user['pwd'] = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:NULL;
	$user['role'] = isset($_REQUEST['role'])?$_REQUEST['role']:NULL;

	$adduser = $usr->adduser($user);
}

if($submit == "updateuser"){
	$user['uname'] = isset($_REQUEST['uname'])?$_REQUEST['uname']:NULL;
	$user['fname'] = isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
	$user['lname'] = isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
	$user['mname'] = isset($_REQUEST['mname'])?$_REQUEST['mname']:NULL;
	$user['pwd'] = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:NULL;
	$user['role'] = isset($_REQUEST['role'])?$_REQUEST['role']:NULL;
}



	
?>
<script>
$(function() {
$("#updateuser").modal();//if you want you can have a timeout to hide the window after x seconds
});
</script>