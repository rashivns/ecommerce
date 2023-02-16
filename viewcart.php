<?php  
session_start();
include 'conn.php';  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  position: relative;
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnav-right {
  float: right;
}

/* Responsive navigation menu (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnav a, .topnav-right {
    float: none;
    display: block;
  }
  
  .topnav-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<?php  include 'header.php';  ?>

<div style="padding-left:16px">
 <div id="display-image">

<?php 

include 'conn.php';
$sql="select p.id, p.pname, p.price, p.filename, pc.qty from products p, productcart pc where p.id=pc.pid and pc.sid='".session_id()."'";
//echo $sql;
$result=mysqli_query($conn,$sql);
?>

<form action="checkout.php" method="post">
  <?php
while ($data = mysqli_fetch_assoc($result)) {
// print_r($data);
?>

    <input type="text"  name="id" value="<?php echo  $data['id'];?>" readonly>
    <img src="./image/<?php echo  $data['filename']; ?>" width="50" height="50">
    <input type="text" name="pname" value="<?php echo  $data['pname'];?>"readonly>
    <input id="price" type="text" name="price" value="<?php echo  $data['price'];?>"readonly>
     <input id="qty" type="text"  name="qty" value="<?php echo  $data['qty'];?>" readonly>
     <input id="tot" type="text"  name="tot" value="<?php echo  $data['price']*$data['qty']; ?>" readonly>
    <a href="deletecartproduct.php?id=<?php echo  $data['id'];?>">Delete</a>

  <br>
<?php
//echo 	$data['pid'];
//echo  $data['pname'];
//echo  $data['price'];
//echo  $data['filename'];
//echo  $data['qty'];

}  ?>
<input type="submit" name="check" value="checkout">
</form>



   
    </div>
</div>
<!-- <script type="text/javascript">
  function calculate(){
    var pr=document.getElementByID("price").value;
    var qt=document.getElementByID("qty").value;
    var total=document.setElementByID("tot");
    var res=pr*qt;
    total.value=res;
  }
</script> -->
</body>
</html>
