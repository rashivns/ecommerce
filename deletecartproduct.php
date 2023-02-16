<?php

session_start();
include 'conn.php';
 $ids=$_GET["id"];
 $sql1="select qty from productcart where pid='".$ids."' and sid='".session_id()."'";
 echo $sql1;
 $myq=mysqli_fetch_assoc(mysqli_query($conn,$sql1))['qty'];
if($myq>1){
	$myq=$myq-1;
	$sql="update productcart set qty='".$myq."' where pid='".$ids."' and sid='".session_id()."'";
}	
else $sql="Delete  from productcart where pid='".$ids."' and sid='".session_id()."'";
//echo $sql;
echo $sql;
$res=mysqli_query($conn,$sql);
// echo $res;
if(is_bool($res)==true)
{
	//echo "True";
	header("Location:viewcart.php");
}


















?>