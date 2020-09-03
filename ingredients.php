<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['phone_nbr']) || $_SESSION['phone_nbr']!='1029384756'){
	
	header("location: log_admin.php");

}
else{ 
include('manager_functions.php') ;
	?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/managers.css">
<title>idea_lobby</title>
</head>
<body>
<div class="main">
 <form action="ingredients.php" method="post" id="f" enctype="multipart/form-data">
	<table class="essan" width="622px">
		<tbody>
	  	<tr>
	  		<td colspan="2" style="text-align: center; color:darkblue"><h2>Ingredient</h2></td>
	  	</tr>
	  	<tr>
	  		<td><label for="iname">Ingredient Name:</label></td>
        	<td><input type="text" id="iname" name="iname"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;"><label id="upload_image_button"> Upload The Ingredient Image
			<input type="file" name="upload_image" size="30" /></label><hr></td>
		</tr>
		<tr>
	  		<td colspan="2"><h4>Nutritional Facts :</h4><hr></td>
	  	</tr>
	  	<tr>
	  		<td><label for="serving">Serving Size :</label><input type="text" id="serving" name="serving"></td>
	  		<td><label for="unit">Unit :</label>
  				<select id="unit" name="unit">
  					 <option></option>
  					 <option value="milligramme">milligramme</option>
   					 <option value="gramme">gramme</option>
  				     <option value="kilogramme">kilogramme</option>
   					 <option value="tonne">tonne</option>
   					 <option value="millilitre">millilitre</option>
   					 <option value="litre">litre</option>
  				     <option value="gallon">gallon</option>
   					 <option value="unite">unite</option>
   					 <option value="serving">serving</option>
  				</select>
  			</td>
		</tr>
		<tr><td colspan="2"><br></td></tr>
	  	<tr>
	  		<td><label for="calorie">Calorie:</label></td>
        	<td><input type="text" id="calorie" name="calorie"></td>
		</tr>
		<tr>
	  		<td><label for="fat">Fat / Lipids:</label></td>
        	<td><input type="text" id="fat" name="fat"></td>
		</tr>
		<tr>
	  		<td><label for="proteine">Proteine:</label></td>
        	<td><input type="text" id="proteine" name="proteine"></td>
		</tr>
		<tr>
	  		<td><label for="others">Others :</label></td>
        	<td><input type="text" id="others" name="others"></td>
		</tr>
		<tr><td colspan="2"><hr></td></tr>
		<tr>
	  		<td style="color: crimson"><h3>Allergic facts :</h3></td>
        	<td><input type="text" id="allergic" name="allergic"></td>
		</tr>
		<tr><td colspan="2"><hr></td></tr>
		<tr>
	  		<td style="color: crimson"><h3>Additive facts :</h3></td>
        	<td><input type="text" id="additive" name="additive"></td>
		</tr>
		<tr><td colspan="2" style="text-align: center;"><button id="btn-post" name="sub">Add</button></td></tr>
		<tr><td colspan="2" style="text-align: center;"><a href="manager_lobby.php">return</a></td></tr>
	</tbody>
	</table>
	</form>
	<?php insertIngredient();?>
</div>
</body>
</html>

<?php } ?>