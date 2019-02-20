<?php include "../models/transactionModel.php";
$db = new transactionModel();
$usr = new userModel();
$prod = new productModel();
$submit = isset($_REQUEST['submit'])?$_REQUEST['submit']:NULL;
$page = isset($_SESSION['page'])?$_SESSION['page']:NULL;
$getproducts = $prod->getproducts();
$getusers = $usr->getallusers();
unset($_SESSION['modal']);



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

	$getproductid = $prod->getproductid($order['pid']);


	if($order['qty'] <= $getproductid){
		
		if($order['promo'] == 'PAN20' ){
			$addorder = $db->addorder($order);
			$prodprice = $db->checkprodprice($order['pid']);	
			$price = $prodprice[0]['price'];
			$getorder = $db->getorder();

			$remainder = $getorder[0]['orderqty'] % 5;
			$discounted = abs($remainder-$getorder[0]['orderqty']);
			$totalremainder = ($remainder*$price);
			$totaldiscounted = ($discounted*($price-1));
			$grandtotal = ($totaldiscounted+$totalremainder);
			$getorder[0]['subtotal'] = $grandtotal;
			$gettotal = $db->gettotal();

		print_r($getorder);
		}else{
			$addorder = $db->addorder($order);
			$getorder = $db->getorder();
			$gettotal = $db->gettotal();
		}
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
	$product['uid'] = isset($_REQUEST['uid'])?$_REQUEST['uid']:NULL;
	$product['pname'] = isset($_REQUEST['pname'])?$_REQUEST['pname']:NULL;
	$product['pdescs'] = isset($_REQUEST['pdescs'])?$_REQUEST['pdescs']:NULL;
	$product['price'] = isset($_REQUEST['price'])?$_REQUEST['price']:NULL;
	$product['qty'] = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
	$product['category'] = isset($_REQUEST['category'])?$_REQUEST['category']:NULL;

	$addprod = $prod->addproduct($product);
	if($addprod){
		$logs['uid'] = $product['uid'];
		$logs['action'] = "ADD PRODUCT";
		$logs['description'] = "Product Name: ".$product['pname']." Price: ".$product['price']." Quantity: ".$product['qty']." Category: ".$product['category'];
		$addlogs = $prod->addlogs($logs);
	}
	$getproducts = $prod->getproducts();
}

if($submit == "deleteprod"){
	$product['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
	$product['uid'] = isset($_REQUEST['uid'])?$_REQUEST['uid']:NULL;
	$product['pname'] = isset($_REQUEST['pname'])?$_REQUEST['pname']:NULL;
	$product['pdescs'] = isset($_REQUEST['pdescs'])?$_REQUEST['pdescs']:NULL;
	$product['price'] = isset($_REQUEST['price'])?$_REQUEST['price']:NULL;
	$product['qty'] = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
	$product['category'] = isset($_REQUEST['category'])?$_REQUEST['category']:NULL;

	print_r($product);

	$deleteprod = $prod->deleteproduct($product['pid']);
	if($deleteprod){
		$logs['uid'] = $product['uid'];
		$logs['action'] = "DELETED PRODUCT";
		$logs['description'] = "Product Name: ".$product['pname']." Price: ".$product['price']." Quantity: ".$product['qty']." Category: ".$product['category'];
		$addlogs = $prod->addlogs($logs);
	}
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
	$getusers = $usr->getallusers();
}

if($submit == "updateusermodal"){
	$user['uid'] = isset($_REQUEST['uid'])?$_REQUEST['uid']:NULL;
	$getuserid = $usr->getuserid($user['uid']);
	print_r($getuserid);
	$_SESSION['modal'] = "#updateuser";
}
if($submit == "updateuser"){
	$user['username'] = isset($_REQUEST['uname'])?$_REQUEST['uname']:NULL;
	$user['uid'] = isset($_REQUEST['uid'])?$_REQUEST['uid']:NULL;
	$user['fname'] = isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
	$user['lname'] = isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
	$user['mname'] = isset($_REQUEST['mname'])?$_REQUEST['mname']:NULL;
	$user['password'] = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:NULL;
	$user['role'] = isset($_REQUEST['role'])?$_REQUEST['role']:NULL;

	$updateuser = $usr->updateuser($user);
	$getusers = $usr->getallusers();
}

if($submit == "restockmodal"){
	$product['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
	$getproduct = $prod->getproduct($product['pid']);
	$_SESSION['modal'] = "#restock";

}
if($submit == "restockprod"){
	$product['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
	$product['prodqty'] = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
	$product['stkqty'] = isset($_REQUEST['stkqty'])?$_REQUEST['stkqty']:NULL;
	$product['total'] = ($product['prodqty']+$product['stkqty']);
	$password = isset($_REQUEST['password'])?$_REQUEST['password']:NULL;

	if($password != $_SESSION['password']){
		echo "error";
	}else{
		$updateprod = $prod->updateprodstock($product);
		$getproducts = $prod->getproducts();
	}	
}



	
?>

