<?php  include "../models/DBconnection.php";
class transactionModel extends DBconnection {
	function addorder($order){


		$query="INSERT INTO `orders`(`uid`,`pid`, `qty`) VALUES (".$order['uid'].",".$order['pid'].",".$order['qty'].")";
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;	
	}
	function removeorder($order){
		$query="DELETE FROM `orders` WHERE pid = \"".$order['pid']."\"";
		//print_r($query);
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
	function getorder(){

		$query = "SELECT oid,orders.pid as prodid,SUM(orders.qty) as orderqty,pname,pdesc,price,((price)*SUM(orders.qty)) as subtotal,products.qty as prodqty,promo FROM `orders` JOIN products ON products.pid = orders.pid GROUP BY prodid";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;	
	}
	function getorderpromo(){

		$query = "SELECT oid,orders.pid as prodid,SUM(orders.qty) as orderqty,pname,pdesc,price,(price-1)*SUM(orders.qty) as subtotal,products.qty as prodqty,promo FROM `orders` JOIN products ON products.pid = orders.pid GROUP BY prodid";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;	
	}
	function checkprodprice($id){
		$query = "SELECT price FROM products WHERE pid = $id";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;	
	}
	function gettotal(){
		$query = "SELECT SUM(subtotal) as grandtotal FROM (SELECT oid,orders.pid as prodid,SUM(orders.qty) as orderqty,pname,pdesc,price*SUM(orders.qty) as subtotal,products.qty as prodqty FROM `orders` JOIN products ON products.pid = orders.pid GROUP BY prodid) as aa";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;	
	}
	function gettotalpromo(){
		$query = "SELECT SUM(subtotal) as grandtotal FROM (SELECT oid,orders.pid as prodid,SUM(orders.qty) as orderqty,pname,pdesc,(price-1)*SUM(orders.qty) as subtotal,products.qty as prodqty FROM `orders` JOIN products ON products.pid = orders.pid GROUP BY prodid) as aa";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;	
	}
	function addsales($sales){
		$query="INSERT INTO `sales`(`sid`, `uid`, `total`, `tax`, `payment`, `paymentChange`, `description`) VALUES (\"".$sales['salesid']."\",\"".$sales['uid']."\",\"".$sales['grandtotal']."\",\"".$sales['tax']."\",\"".$sales['payment']."\",\"".$sales['change']."\",\"".$sales['desc']."\")";
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			//die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return mysqli_error($this->conn);
		}return "101";
	}
	function addsalesdetail($sid,$order){
		// if($order['promo'] == "lima20"){
		// 	if($order['orderqty'] >)
		// }
		$query="INSERT INTO `sales_detail`(`sid`, `pid`, `qty`) VALUES (\"".$sid."\",".$order['prodid'].",".$order['orderqty'].")";
		print_r($query);
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
	function turncateorder(){
		$query="TRUNCATE TABLE orders";
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
	
}
class userModel extends DBconnection {
	//user function
	function adduser($user){
		$query="INSERT INTO `user`(`username`,`password`, `fname`, `mname`, `lname`, `role`) 
		VALUES (\"".$user['uname']."\",\"".$user['pwd']."\",\"".$user['fname']."\",\"".$user['mname']."\",\"".$user['lname']."\",\"".$user['role']."\")";
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
	function deleteuser($id){
		$query="DELETE FROM users WHERE uid = $id";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
            return FALSE;
        }return TRUE;
	}
	function updateuser($user){
		$query="UPDATE `users` 
		SET `username`=\"".$user['username']."\",`password`=\"".$user['password']."\",`fname`=\"".$user['fname']."\",`mname`=\"".$user['mname']."\",`lname`=\"".$user['mname'].",`role`=\"".$user['role']." WHERE uid = \"".$user['uid']."";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
            return FALSE;
        }return TRUE;
	}
	function getuser($username){
        $query = "SELECT * FROM user
				WHERE username = \"".$username."\" LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        if(!$result) {
            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
        }
        $row = $result->fetch_object();
        return $row;
    }
}
class productModel extends DBconnection {
	//PRODUCTS
	function addproduct($product){
		$query="INSERT INTO `products`(`pname`, `pdesc`, `price`, `qty`, `category`) VALUES (\"".$product['pname']."\",\"".$product['pdescs']."\",\"".$product['price']."\",\"".$product['qty']."\",\"".$product['category']."\")";
		print_r($query);
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
	function deleteproduct($id){
		$query="DELETE FROM products WHERE pid=$id";
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
	function updateproduct($product){
		$query="UPDATE `products` SET `pname`=".$user['pname'].",`pdesc`=".$user['pdesc'].",`price`=".$user['price'].",``dateCreated`=".$user['dateCreated']." WHERE pid = ".$user['pid']."";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
            return FALSE;
        }return TRUE;
	}
	function getproducts(){
		$query="SELECT * FROM `products`";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;	
	}

	function getbread(){
		$query="SELECT * FROM products WHERE category = 'bread'";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;
	}
	function getdrink(){
		$query="SELECT * FROM products WHERE category = 'drink'";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;
	}
	function getothers(){
		$query="SELECT * FROM products WHERE category = 'others'";
		$result = mysqli_query($this->conn, $query);
		if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
        $res = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($res, $row);
            }
            return ($result->num_rows>0)? $res: FALSE;
	}
	function updatestock($stock){
		$query="UPDATE `products` SET `qty`=".($stock['prodqty']-$stock['orderqty'])." WHERE  pid = ".$stock['prodid']."";
		print_r($query);
		$result = mysqli_query($this->conn, $query);
		if(!$result){
			die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn)); 
			return FALSE;
		}return TRUE;
	}
}
?>