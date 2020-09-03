<!DOCTYPE html>
<?php
session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['phone_nbr'])){
	
	header("location: login.php");

}
else{ ?>
<html>
<head>
	<title>Product Detail</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/product.css" media="all"/>
</head>
<body>
  <div class="product_details">
		<?php single_product();?>
  </div>
</body>
</html>
<?php } ?>