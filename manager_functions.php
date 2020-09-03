<?php

$con = mysqli_connect("localhost","root","","i_stema") or die("Connection was not established");

//function for inserting ingredients
function insertIngredient(){

	if(isset($_POST['sub'])){
	global $con;

	$iname = htmlentities($_POST['iname']);
	$upload_image = $_FILES['upload_image']['name'];
            $image_tmp = $_FILES['upload_image']['tmp_name'];

            $serving = htmlentities($_POST['serving']);
            $selected_val = $_POST['unit'];
            $calorie = htmlentities($_POST['calorie']);
            $fat = htmlentities($_POST['fat']);
            $proteine = htmlentities($_POST['proteine']);
            $others = htmlentities($_POST['others']);
            $allergic = htmlentities($_POST['allergic']);
            $additive = htmlentities($_POST['additive']);
            

            if(strlen($iname) <= 1){
            	echo "<script>alert('Please type a valid name')</script>";
            	echo"<script>window.open('ingredients.php','_self')</script>";
            }
            else{
            	if (strlen($upload_image) == 0) {
            		$upload_image = NULL ;	
            	}
            	else if (strlen($upload_image) >= 1) {
            		move_uploaded_file($image_tmp,"ingredients_images/$upload_image");
            	}
            	if (strlen($serving) == 0 && strlen($selected_val) == 0 && strlen($calorie) == 0 && strlen($fat) == 0 && strlen($proteine) == 0 && strlen($others) == 0) {
            		$nutritional_fact ="FALSE";   }
            	else{
            		if (strlen($serving) == 0) {
            		$serving=NULL ;
            		}
            		if (strlen($selected_val) == 0) {
            		$selected_val=NULL ;
            		}
            		if (strlen($calorie) == 0) {
            		$calorie=NULL ;
            		}
            		if (strlen($fat) == 0) {
            		$fat=NULL ;
            		}
            		if (strlen($proteine) == 0) {
            		$proteine=NULL ;
            		}
            		if (strlen($others) == 0) {
            		$others=NULL ;
            		}
            		
            		$nutritional_fact = "TRUE";
            	}
            	if (strlen($allergic) == 0) {	$allergic=NULL ;}
            	if (strlen($additive) == 0) {	$additive=NULL ;}
            		
            	$insert1 = "insert into ingredients (name , image , nutritional_facts ,serving , unit , calorie , fat , proteine , others , allergic_facts , additive_facts) values ('$iname','$upload_image','$nutritional_fact','$serving','$selected_val','$calorie','$fat','$proteine','$others','$allergic','$additive')";
            	$run = mysqli_query($con,$insert1);}
					if($run){
						echo"DONE";
						echo"<script>window.open('ingredients.php','_self')</script>";
					}
					else{
						echo "<script>alert('Error Occured')</script>";
						echo"<script>window.open('home.php','_self')</script>";
					}

            
   		 }
    }

function insertProduct(){

if(isset($_POST['sub'])){
 global $con;
 $ceril = 0 ;
 $pname = htmlentities($_POST['pname']);
 $brand = htmlentities($_POST['brand']);
 $nutriscore =$_POST['nutriscore'];
 $pingredients = htmlentities($_POST['pingredients']);

 $table_rows= $_COOKIE["abc"];
 if ($table_rows<3) {
    echo "<script>alert('you should fill at least 1 variant')</script>";
 }
 else if ($table_rows==3) {
   $variant1 = htmlentities($_POST['txtRow1']);
   $barcode1 = htmlentities($_POST['secRow1']);
   $meme=array();
   $meme[$variant1] = $barcode1;
 }
 else if ($table_rows>3) {
$meme=array();
   for ($i=2; $i < $table_rows; $i++) { 
      $x=$table_rows-$i; 
      $variant = "txtRow".$x;
      $barcode = "secRow".$x;
      $cell1 =htmlentities($_POST[$variant]);
      $cell2 =htmlentities($_POST[$barcode]);
      $meme[$cell1] = $cell2;
   }
 }

 if(strlen($nutriscore)==0){
      $ceril+=1;
      echo "<script>alert('Please select a nutriscore')</script>";
      echo"<script>window.open('products.php','_self')</script>"; 
      exit();
 }
 $serving = htmlentities($_POST['serving']);
 $selected_val = $_POST['unit']; //unit
 $calorie = htmlentities($_POST['calorie']);
 $energie = htmlentities($_POST['energie']);
 $fat = htmlentities($_POST['fat']);
 $proteine = htmlentities($_POST['proteine']);
 $others = htmlentities($_POST['others']);
 $saturatedfat = htmlentities($_POST['saturatedfat']);
 $carbohydrate = htmlentities($_POST['carbohydrate']);
 $sugar= htmlentities($_POST['sugar']);
 $salt= htmlentities($_POST['salt']);
 $fiber= htmlentities($_POST['fiber']);
 $sodium= htmlentities($_POST['sodium']);
 $calcium= htmlentities($_POST['calcium']);
 $alcohol= htmlentities($_POST['alcohol']);
 $info = htmlentities($_POST['info']);

$countfiles = count($_FILES['upload_image']['name']);

if ($countfiles==0) {
      $products_imgs = NULL;
}
if ($countfiles > 0) {
$pimg = array();
// Looping all files
for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['upload_image']['name'][$i];
   array_push($pimg, $filename);
   // Upload file
   move_uploaded_file($_FILES['upload_image']['tmp_name'][$i],'products_images/'.$filename);   
 }
$products_imgs = serialize($pimg);
}

$nutritional2_scale[]=array("energie"=>$energie , "calorie"=>$calorie , "fat"=>$fat , "saturatedfat"=>$saturatedfat , "proteine"=>$proteine , "carbohydrate"=>$carbohydrate , "sugar"=>$sugar , "fiber"=>$fiber , "salt"=>$salt , "sodium"=>$sodium , "calcium"=>$calcium , "alcohol"=>$alcohol , "others"=>$others);
$nutritional_scale = serialize($nutritional2_scale);

if ($ceril==0) {
      $insert="insert into products (product_name , brand , nutriscore , pingredients , serving , unit , nutritional_scale , info , images) values ('$pname','$brand','$nutriscore','$pingredients','$serving','$selected_val','$nutritional_scale','$info','$products_imgs')";
      $run = mysqli_query($con,$insert);
            if($run){
                   echo "<script>alert('DONE')</script>";
                   $select="SELECT product_id FROM products WHERE product_name='$pname'";
                   $rum = mysqli_query($con,$select);
                   if ($rum) {
                      $raw=mysqli_fetch_array($rum);
                      $product_id=$raw['product_id'];
                      foreach ($meme as $key => $value) {
                        $sec_insert="INSERT INTO `variant`(`product_id`, `variant_name`, `barcode`) VALUES ('$product_id','$key','$value')";
                        $rain = mysqli_query($con,$sec_insert);
                      }
                      
                   }
            }
            else{
                  echo "<script>alert('Error Occured')</script>";
                  //echo"<script>window.open('products.php','_self')</script>";
            }
}
else{echo "NANII!";}
}
}
?>