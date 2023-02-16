<?php

session_start();
include 'conn.php';
$pid=$_GET['id'];
//  $sql="select * from products where id=".$pid;
//  //echo $sql;
//  $res=mysqli_query($conn,$sql);
//  if($res){
//  	$dat=mysqli_fetch_assoc($res);
 	$qry="select pid,qty from productcart where sid='".session_id()."' and pid=$pid";
 	//echo $qry;
 	$dat1=mysqli_fetch_assoc(mysqli_query($conn,$qry));
 	$qty=$dat1['qty'];
 	if($dat1['pid']==Null){
 		$qty=1;
 		$sql2="insert into productcart values('".session_id()."','".$pid."','".$qty."')";

 	}else{$qty+=1;
 		$sql2="update productcart set qty='".$qty."' where pid='".$pid."'and sid='".session_id()."'";}
	echo $sql2;
 	if(mysqli_query($conn,$sql2))
 	{
 		header("Location:index.php");
 	}
?>