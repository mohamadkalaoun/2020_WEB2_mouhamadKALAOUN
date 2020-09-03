<!doctype html>
<?php
session_start();
if(!isset($_SESSION['phone_nbr']) || $_SESSION['phone_nbr']!='1029384756'){
	
	header("location: log_admin.php");

}
else{ ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/lobbym.css">
<title>idea_lobby</title>
</head>
<body>
<div class="main">
 <table width="622px" border="0" cellspacing="29px" cellpadding="" >
  <tbody>
    <tr>
      <th scope="col"><a href="ingredients.php" ><img src="images/indie.png" width="500" height="480" alt=""/></a></th>
	</tr>
    <tr><th scope="col"><a href="products.php"><img src='images/prudud.png' width='500' height='480' alt=''/></a></th></tr> 
    <tr><td  style="text-align: center;"><a href="logout.php">Exit</a></td></tr>
  </tbody>
</table>
</div>
</body>
</html>
<?php } ?>