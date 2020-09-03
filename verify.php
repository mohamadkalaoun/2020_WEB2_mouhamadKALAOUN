<?php 
$con = mysqli_connect("localhost","root","","i_stema") or die("Connection was not established");
$token = $_GET['code'];
$update="UPDATE users SET `verified`='TRUE' WHERE verified='$token'";
$run = mysqli_query($db, $update);
if ($run) {
	echo "verified\n";
	echo "<a href='login.php'>Login Now</a>";
}
?>