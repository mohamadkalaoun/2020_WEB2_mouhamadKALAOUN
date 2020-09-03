<?php
session_start();

	session_destroy();
  	unset($_SESSION['phone_nbr']);
  	header("location: login.php");
?>