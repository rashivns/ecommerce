
<?php
//error_reporting(0);
session_start();
// echo session_id();
include 'conn.php';
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$ex = pathinfo($filename, PATHINFO_EXTENSION);
  	$fwe = substr($filename, 0, strrpos($filename, "."));
  	$filename=$fwe.time().".".$ex;
	$folder = "./image/" . $filename;

	// $db = mysqli_connect("localhost", "root", "", "vedasu");

	// Get all the submitted data from the form
	// $sql = "INSERT INTO image (filename) VALUES ('$filename')";
	$sql="INSERT INTO `products`(`pname`, `price`, `filename`) VALUES ('$pname','$price','$filename')";
	//echo $sql;
	//$sql="INSERT INTO `products`(`pname`, `price`, `image`) VALUES ('$pname','$price','$filename')";

	// Execute query
	if(mysqli_query($conn, $sql)){
		//echo $sql;
		move_uploaded_file($tempname, $folder);
	}
	// Now let's move the uploaded image into the folder: image
	// if (move_uploaded_file($tempname, $folder)) {
	// 	echo "<h3> Image uploaded successfully!</h3>";
	// } else {
	// 	echo "<h3> Failed to upload image!</h3>";
	// }
}
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

</style>
</head>
<body>

<?php  include 'header.php';  ?>

<div style="padding-left:390px;margin-top: 300px;">
	<form method="post" action="" enctype="multipart/form-data">
		
<label>Add Product</label>
<input type="text" name="pname" placeholder="Product Name" required="required"><br><br>
<label>Add Price</label>
<input type="text" name="price" placeholder="Product Price" required="required"><br><br>
<label>Add Image</label>
<input type="file" name="uploadfile"><br><br>
<input type="submit" name="upload" value="upload">
<input type="reset" value="reset">


	</form>
 
</div>
<div id="display-image">
        <?php
        $query = " select filename from products ";
        $result = mysqli_query($conn, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./image/<?php echo $data['filename']; ?>" width="300" height="300">
 
        <?php
        }
        ?>
    </div>
</body>
</html>
