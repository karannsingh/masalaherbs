<?php

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_menu($conn){
	$sql="SELECT * from menu_category WHERE status=1";
	$run=mysqli_query($conn,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($run)){
		$data[]=$row;
	}
	return $data;
}

function get_booking($conn){
	$sql="SELECT * from booking_list WHERE status=1";
	$run=mysqli_query($conn,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($run)){
		$data[]=$row;
	}
	return $data;
}

function get_safe_value($conn, $str){
	if($str!=''){
		$str = trim($str);
		return mysqli_real_escape_string($conn, $str);
	}
}

function getAdminInfo($conn, $email){
	$sql="SELECT * from admin_users WHERE email='$email'";
	$run=mysqli_query($conn, $sql);
	$data=mysqli_fetch_assoc($run);
	return $data;
}

function getImages($conn, $post_id){
	$sql="SELECT * from booking_list_img WHERE booking_list_id=$post_id";
	$run=mysqli_query($conn, $sql);
	$data=array();
	while($row=mysqli_fetch_assoc($run)){
		$data[]=$row;
	}
	return $data;
}

function getBookingImages($conn, $post_id){
	$sql="SELECT * from booking_list_img WHERE booking_list_id=$post_id";
	$run=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($run);		
	return $row;
}

function get_product($con,$limit='',$cat_id='',$product_id=''){
	$sql="select product.*,categories.categories from product,categories where product.status=1 ";
	if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	$sql.=" and product.categories_id=categories.id ";
	$sql.=" order by product.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

?>