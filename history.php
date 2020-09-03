<!DOCTYPE html>
<?php
session_start();
include("header.php");
include("functions.php");
?>
<?php

if(!isset($_SESSION['phone_nbr'])){

	header("location: login.php");

}
else{ ?>
<html>
<head>
	<title>History</title>
	<link rel="stylesheet" type="text/css" href="css/result.css">
	<meta charset="utf-8">

</head>
<body>

		<?php get_history();?>

</body>
</html>
<?php } ?>