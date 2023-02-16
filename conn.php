<?php
//connection.php


$server="localhost";
$user="root";
$password="";
$dbname="vedasu";
$conn=mysqli_connect($server,$user,$password,$dbname);
if(!$conn)
{
	die("Failed to connect".mysqli_connect_error());
}

?>