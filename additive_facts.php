<!DOCTYPE html>
<?php 
session_start();
include('header.php') ;
?>
<html>
<head>
	<title>Additive Ingredients Facts</title>
</head>
<body>
<table width="100%" style="background-color:#e8fa0a; height: 80px; font-size: 39px" cellspacing="10" >
	<tr>
		<td><a href="#a">A</a></td>
		<td><a href="#b">B</a></td>
		<td><a href="#c">C</a></td>
		<td><a href="#d">D</a></td>
		<td><a href="#e">E</a></td>
		<td><a href="#f">F</a></td>
		<td><a href="#g">G</a></td>
		<td><a href="#h">H</a></td>
		<td><a href="#i">I</a></td>
		<td><a href="#j">J</a></td>
		<td><a href="#k">K</a></td>
		<td><a href="#l">L</a></td>
		<td><a href="#m">M</a></td>
		<td><a href="#n">N</a></td>
		<td><a href="#o">O</a></td>
		<td><a href="#p">P</a></td>
		<td><a href="#q">Q</a></td>
		<td><a href="#r">R</a></td>
		<td><a href="#s">S</a></td>
		<td><a href="#t">T</a></td>
		<td><a href="#u">U</a></td>
		<td><a href="#v">V</a></td>
		<td><a href="#w">W</a></td>
		<td><a href="#x">X</a></td>
		<td><a href="#y">Y</a></td>
		<td><a href="#z">Z</a></td>
	</tr>
</table><br>
<?php 
include('functions.php') ;
get_iadditive_facts();
?>
</body>
</html>
