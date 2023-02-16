<?php  
session_start();
include 'conn.php'; 


 ?>
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
form {
	margin-top: 150px;
	margin-left: 400px;
}
table, th, th {
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
$sql="select p.id,p.pname,p.price,pc.qty from products p , productcart  pc where p.id=pc.pid and pc.sid='".session_id()."'";
// echo $sql;
$ts=mysqli_query($conn,$sql);
$sum=0;
while ($data = mysqli_fetch_assoc($ts)) {
?>
	<label>Id</label>
	<input type="text"  name="id" value="<?php echo  $data['id'];?>" readonly>
	   <label>Product Name</label>
    <input type="text" name="pname" value="<?php echo  $data['pname'];?>"readonly>
    <label>Price</label>
    <input id="price" type="text" name="price" value="<?php echo  $data['price'];?>"readonly>
    <label>Quantity</label>
     <input id="qty" type="text"  name="qty" value="<?php echo  $data['qty'];?>" readonly>
     <label>Total Price</label>
     <input id="tot" type="text"  name="tot" value="<?php echo  $data['price']*$data['qty']; ?>" readonly><br>
    <?php $sum=$sum +$data['price']*$data['qty']; ?>


<?php
}

echo "<br>Total=".$sum;



 	?>
<!-- <form action="/action_page.php">
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>
   <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <input type="submit" value="Submit">
  <input type="submit" formaction="/action_page2.php" value="Submit as Admin">
</form>

   -->
<div id="paypal-payment-button"></div>

    </div>
</div>
<!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=AQsbgPXLY4Q0to9qH0fp_ZY-BP-4DMG6aD6eRIwOc1TzEmkbS_jUHNnVnGkIItRTbyg8_jepPwoExIio&disable-funding=credit,card"></script>
  <!-- Set up a container element for the button -->
 <script src="checkout.js"></script>
</body>
</html>
