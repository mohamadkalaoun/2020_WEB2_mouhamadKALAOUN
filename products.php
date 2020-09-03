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
<script type="text/javascript">

function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;

  var iteration = lastRow -1;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode); 
  
  // right cell
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow' + iteration;
  el.id = 'txtRow' + iteration;
  el.placeholder = 'variant';
  el.size = 40;
  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);
  
  
  var cellRightSel = row.insertCell(2);
  var sel = document.createElement('input');
  sel.type = 'text';
  sel.name = 'secRow' + iteration;
  sel.id = 'secRow' + iteration;
  sel.placeholder = 'barcode';
  sel.size = 40;
  
  sel.onkeypress = keyPressTest;
  cellRight.appendChild(sel);
}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');

}
function removeRowFromTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}
</script>
<body>
<div class="main">
 <form action="" method="post" id="f" enctype="multipart/form-data">
	<table class="essan" width="622px" cellpadding="10px">
		<tbody>
	  	<tr>
	  		<td colspan="2" style="text-align: center; color:darkblue"><h2>Product</h2></td>
	  	</tr>
	  	<tr>
	  		<td><label for="pname">Product Name:</label></td>
        	<td><input type="text" required id="pname" name="pname"></td>
		</tr>
		<!-- la partie dynamique du variant-->
		<tr>
			<td colspan="2">
				<table border="0" id="tblSample">
				<tr>
		    		<th colspan="2">variants :</th>
		  		</tr>
		  		<tr>
		  			<td><input type="button" value="Add" onclick="addRowToTable();" /></td>
		  			<td><input type="button" value="Remove" onclick="removeRowFromTable();" /></td>
		  		</tr>
		  		<tr>
		    		<td>1</td>
		    		<td><input type="text" required name="txtRow1" placeholder="variant" id="txtRow1" size="40" onkeypress="keyPressTest(event, this);" />
		    			<input type="text" required name="secRow1" id="secRow1" size="40" placeholder="barcode" onkeypress="keyPressTest(event, this);" />
		    		</td>
		 		 </tr>
		 		</table>
		 	</td>
 		</tr>
 		<!-- fin de la partie dynamique du variant-->
		<tr>
	  		<td><label for="brand">Brand :</label></td>
        	<td><input type="text" required id="brand" name="brand"></td>
		</tr>
		<tr>
			<td><label for="nutriscore">Nutriscore :</label></td>
  			<td>	
  				<select id="nutriscore" name="nutriscore">
  					 <option></option>
  					 <option value="a">A</option>
   					 <option value="b">B</option>
  				     <option value="c">C</option>
   					 <option value="d">D</option>
   					 <option value="e">E</option>
  				</select>
  			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;"><label id="upload_image_button"> Upload The Poduct Images
			<input type="file" name="upload_image[]" multiple /></label></td>
		</tr>
		<tr><td colspan="2"><br></td></tr>
		<tr>
			<td colspan="2"><hr><h4>Nutritional Scale :</h4></td>
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
		<tr>
        	<td colspan="2"><input type="text" id="energie" name="energie" placeholder="energie"></td>
		</tr>
	  	<tr>
        	<td colspan="2"><input type="text" id="calorie" name="calorie" placeholder="calorie"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="fat" name="fat" placeholder="Fat / Lipids"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="saturatedfat" name="saturatedfat" placeholder="saturated fat"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="proteine" name="proteine" placeholder="Proteine"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="carbohydrate" name="carbohydrate" placeholder="carbohydrate"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="sugar" name="sugar" placeholder="sugar"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="fiber" name="fiber" placeholder="fiber"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="salt" name="salt" placeholder="salt"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="sodium" name="sodium" placeholder="sodium"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="calcium" name="calcium" placeholder="calcium"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="alcohol" name="alcohol" placeholder="alcohol"></td>
		</tr>
		<tr>
        	<td colspan="2"><input type="text" id="others" name="others" placeholder="others"></td>
		</tr>
		<tr><td colspan="2"><hr></td></tr>
		<tr>
	  		<td style="color: crimson"><h3>Original Information :</h3></td>
        	<td><input type="text" id="info" name="info"></td>
		</tr>
		<tr><td colspan="2"><hr></td></tr>
		<tr>
	  		<td style="color: crimson"><h3>Add Ingredient :</h3></td>
        	<td><input type="text" required name="pingredients" placeholder="Ingredient1_Name,Ingredient2_Name,Ingredient3_Name etc.."></td>
		</tr>
		<tr><td colspan="2" style="text-align: center;"><button id="btn-post" name="sub" onclick="setCookie('abc')" >Add</button></td></tr>
		<tr><td colspan="2" style="text-align: center;"><a href="manager_lobby.php">return</a></td></tr>
	</tbody>
	</table>
	</form>
<script> 
function setCookie(cname) {
	var totalRowCount = 0;
        var rowCount = 0;
        var table = document.getElementById("tblSample");
        var rows = table.getElementsByTagName("tr")
        for (var i = 0; i < rows.length; i++) {
            totalRowCount++;
            if (rows[i].getElementsByTagName("td").length > 0) {
                rowCount++;
            }
        }
  document.cookie = cname + "=" + totalRowCount ;
}
  //setCookie("abc");  
</script>
	<?php insertProduct();?>
</div>
</body>
</html>

<?php } ?>
