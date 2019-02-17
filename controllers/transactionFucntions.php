<?php include "../models/transactionModel.php";
$db = new transactionModel();
$prod = new productModel();
$submit = isset($_REQUEST['submit'])?$_REQUEST['submit']:NULL;
$page = isset($_SESSION['page'])?$_SESSION['page']:NULL;

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
	$addorder = $db->addorder($order);
	$getorder = $db->getorder();
	$gettotal = $db->gettotal();
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
	
?>