<?php
session_start();



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

<div style="padding-left:16px">
 <div id="display-image">
   <form method="post" action="cartproduct.php" >    
        <?php
        include 'conn.php';
        $query = " select * from products ";
        $result = mysqli_query($conn, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {


          $id=$data["id"];
          $pname=$data["pname"];
          $price=$data["price"];
          $filename=$data["filename"];

      
        
        ?>





        
               <img src="./image/<?php echo $filename; ?>" width="180" height="150">
          Product Name:<?php echo $pname;?>\
          Price:<?php echo $price;?>
      <a href="cartproduct.php?id=<?php  echo $id;  ?>">Cart</a>

 
         <?php


}
         ?>
    </div>
</div>

</body>
</html>
