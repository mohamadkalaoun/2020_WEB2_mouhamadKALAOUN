<?php 
include("switch_case.php");
$con = mysqli_connect("localhost","root","","i_stema") or die("Connection was not established");

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                                      encrypt function                                                ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ucrypt($pass){
	$ciphering = "AES-128-CTR";      
   	 // Use OpenSSl Encryption method 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
            
	 // Non-NULL Initialization Vector for encryption 
	$encryption_iv = '1234567891011121'; 
            
	 // Store the encryption key 
	$encryption_key = "ScrumbThumb"; 
            
	 // Use openssl_encrypt() function to encrypt the data 
	$encryption = openssl_encrypt($pass, $ciphering, 
                    $encryption_key, $options, $encryption_iv);
	return $encryption;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                                      decrypt function                                                ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function udecrypt($pass1){

	$ciphering2 = "AES-128-CTR"; 
    $options2 = 0; 
     // Non-NULL Initialization Vector for decryption 
    $decryption_iv2 = '1234567891011121';
     // Store the decryption key 
    $decryption_key2 = "ScrumbThumb";
     // Use openssl_decrypt() function to decrypt the data 
    $decryption1=openssl_decrypt ($pass1, $ciphering2,  
         $decryption_key2, $options2, $decryption_iv2);  

    return $decryption1;
} 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                       affiche les nutritional facts des ingredients                                  ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_inutritional_facts(){

    global $con;

    $get_posts = "select * from ingredients WHERE nutritional_facts='TRUE' ORDER by name ASC";

    $run_posts = mysqli_query($con,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts)){

        $ingredient_id = $row_posts['ingredient_id'];
        $iname = $row_posts['name'];
        $upload_image = $row_posts['image'];
        $serving = $row_posts['serving'];
        $unit = $row_posts['unit'];
        $calorie = $row_posts['calorie'];
        $fat = $row_posts['fat'];
        $proteine = $row_posts['proteine'];
        $others = $row_posts['others'];
    ?>
    <?php
    $i =strtolower(substr($iname,0,1)); 
    switcher($i);
        echo "<div id='$iname' >"; ?>
        <strong><?php echo "$iname :&ensp;"; ?></strong>
        <?php if (strlen($upload_image) > 0) {
            echo "<img src='ingredients_images/$upload_image' width='65px' height='65px'>";
        } ?>
        <p><?php if (strlen($serving) > 0) { 
          echo "serving size is $serving per $unit &ensp;";} ?>
          <?php if (strlen($calorie) > 0) { 
            echo "Calorie : $calorie  &ensp;";} ?> 
          <?php if (strlen($fat) > 0) { 
            echo "Fat : $fat &ensp;";} ?>
          <?php if (strlen($proteine) > 0) {   
            echo "proteine : $proteine &ensp;";}?>
          <?php if (strlen($others) > 0) {
            echo "Others : $others";} ?> 
        </p><hr>
    </div>
<?php
    }
 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                          affiche les allergic facts des ingredients                                  ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_iallergic_facts(){

global $con;

    $get_posts = "SELECT * FROM ingredients WHERE allergic_facts <> '' ORDER by name ASC";

    $run_posts = mysqli_query($con,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts)){

        $ingredient_id = $row_posts['ingredient_id'];
        $iname = $row_posts['name'];
        $upload_image = $row_posts['image'];
        $allergic_facts = $row_posts['allergic_facts'];
    ?>
    <?php
    $i =strtolower(substr($iname,0,1)); 
    switcher($i);
        echo "<div id='$iname' >"; ?>
        <strong><?php echo "$iname :&ensp;"; ?></strong>
        <?php if (strlen($upload_image) > 0) {
            echo "<img src='ingredients_images/$upload_image' width='65px' height='65px'>";
        } ?>
        <p>
           <?php echo "Allergic facts : $allergic_facts"; ?> 
        </p><hr>
    </div>
<?php
    }
 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                          affiche les additive facts des ingredients                                  ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_iadditive_facts(){

global $con;

    $get_posts = "SELECT * FROM ingredients WHERE additive_facts <> '' ORDER by name ASC";

    $run_posts = mysqli_query($con,$get_posts);

    while($row_posts=mysqli_fetch_array($run_posts)){

        $ingredient_id = $row_posts['ingredient_id'];
        $iname = $row_posts['name'];
        $upload_image = $row_posts['image'];
        $additive_facts = $row_posts['additive_facts'];
    ?>
    <?php
    $i =strtolower(substr($iname,0,1)); 
    switcher($i);
        echo "<div id='$iname' >"; ?>
        <strong><?php echo "$iname :&ensp;"; ?></strong>
        <?php if (strlen($upload_image) > 0) {
            echo "<img src='ingredients_images/$upload_image' width='65px' height='65px'>";
        } ?>
        <p>
           <?php echo "Additive facts : $additive_facts"; ?> 
        </p><hr>
    </div>
<?php
    }
 }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                  affiche les rsultat du search ou bien le scan du barcode                            ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function results(){

global $con;

$search_query = htmlentities($_GET['qsearch']);

$get_products = "select * from variant inner join products ON variant.product_id=products.product_id where products.product_name like '%$search_query%' OR variant.barcode like '%$search_query%' OR products.brand like '%$search_query%'";
$run = mysqli_query($con,$get_products);
// }  lal if isset
while($row=mysqli_fetch_array($run)){

    $product_id = $row['product_id'];
    $barcode= $row['barcode'];
    $product_name = $row['product_name'];
    $variant =$row['variant_name'];
    $brand = $row['brand'];
    $nutriscore = $row['nutriscore'];
    $score = strtoupper($nutriscore);
    $tableid = bstyler($score);
    $pid = pstyler($score);
    $upload_image = $row['images'];
    $itatake = unserialize($upload_image);
    $im = 0 ;

    foreach ($itatake as $key => $value) {
    if (empty($value)) {
       unset($itatake[$key]);
      }
    }
    if (empty($itatake)) {
      $im+=1;
    }
    else{
      $image = array_pop($itatake);
    }

?>
    <table id="<?php echo"$tableid"; ?>" onclick="document.location.href='<?php echo"single_product.php?product_id=$product_id&bar=$barcode";?>';" >
      <tr>
        <td rowspan="2"><p id="<?php echo"$pid"; ?>" ><?php echo"$score";?></p> </td>
        <td style="font-style: bold; font-size: 70px;"><?php echo "$product_name"; ?></td>
        <td rowspan="2">
          <?php 
          if ($im==0) {
            echo "<img src='products_images/$image' width='100px' height='100px'>";}
          //if($im>0){echo "";}
          ?>
        </td>
      </tr>
      <tr><td style="font-style: italic; font-size: 49px;"><?php echo "$brand\n $variant"; ?></td></tr><br><br>
    </table>
<?php
    } // lal while loop
 
} // lal function

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                          affiche les details d'un produit precis                                     ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function single_product(){

 if(isset($_GET['product_id'])){
 add_to_history();
 global $con ;
 $product_id = $_GET['product_id'];
 $barcode = $_GET['bar'];
 $user_phone = $_SESSION["phone_nbr"];
 $select = "SELECT * FROM favorites WHERE fav_product='$product_id' AND user_phone='$user_phone' AND fav_barcode='$barcode' LIMIT 1"; //t3adadlt
 $result = mysqli_query($con, $select);
 $user = mysqli_fetch_assoc($result);
 if ($user) { //y3ne hal user saba2 w 3emel favorite la hal product
    $fav_form =  "<form action='single_product.php?product_id=$product_id&bar=$barcode' method='post'><input id='truth' type='image' src='images/heart-full.png' name='disheart' alt='heart' width='90' height='90'></form>";
 }
 else{
  $fav_form= "<form action='single_product.php?product_id=$product_id&bar=$barcode' method='post'><input id='truth' type='image' src='images/heart-empty.png' name='heart' alt='heart' width='90' height='90'></form>";
 }


 $get_product = "select * from products where product_id='$product_id'";
 $run = mysqli_query($con,$get_product);

 $row=mysqli_fetch_array($run);

    $product_name = $row['product_name'];
    $serving = $row['serving'];
    $unit = $row['unit'];
    $nutriscore = $row['nutriscore'];
    $score = strtoupper($nutriscore);
    $rowid = coloryer($score);
    $score_img = imgyer($score);
    $classification = scoryer($score);
    $original_info = $row['info'];
    $upload_image = $row['images'];
    $itatake = unserialize($upload_image);
    $itatake_size = sizeof($itatake);
    $nutritional_scale_phase1 = $row['nutritional_scale'];
    $nutritional_scale_phase2 = unserialize($nutritional_scale_phase1);
    $nutritional_scale_phase3 = $nutritional_scale_phase2[0];
   
    $im = 0 ;
    foreach ($nutritional_scale_phase3 as $key => $value) {
    if (empty($value)) {
       unset($nutritional_scale_phase3[$key]);
      }
    }
    if (empty($nutritional_scale_phase3)) {
      $im+=1;
    }

    $pingredients = $row['pingredients'];
    $ingredients = explode(",",$pingredients);

    $allergic_ingredients = array();
    $additive_ingredients = array();
   
    foreach ($ingredients as $key => $value) {
     $select="SELECT `allergic_facts` FROM `ingredients` WHERE name='$value'"; 
    
     $rum = mysqli_query($con,$select);
     if ($rum ) {
        $row=mysqli_fetch_array($rum);
        $allergic_facts = $row['allergic_facts'];

        if (!empty($allergic_facts) && !is_null($allergic_facts)) {
          $allergic_ingredients[$key] = $value;
        }

     }
     else{echo "not zabtit";}
  }  // tskiret l for each

    foreach ($ingredients as $key => $value) {
     $select="SELECT `additive_facts` FROM `ingredients` WHERE name='$value'"; 
    
     $rum = mysqli_query($con,$select);
     if ($rum ) {
        $row=mysqli_fetch_array($rum);
        $additive_facts = $row['additive_facts'];
        
        if (!empty($additive_facts) && !is_null($additive_facts)) {
          $additive_ingredients[$key] = $value;
        } 

     }
     else{echo "not zabtit";}
  }
?>
<table id="fullcontent" cellpadding="20px" >
 <tr id="<?php echo"$rowid"; ?>"> 

  <td id="<?php echo"$rowid"; ?>"><?php echo"$product_name"; ?></td>
  <td id="<?php echo"$rowid"; ?>">
    <?php echo "$fav_form"; ?>
  </td>
         <?php
        if(isset($_POST['heart_x'])) { 
            add_to_favorite(); 
        } 
        else if(isset($_POST['disheart_x'])) {
            remove_favorite(); 
        } ?>
</tr>
<tr> <td colspan="2" style="text-align: left;"><img id="score_img" src="<?php echo"images/$score_img"; ?>"></td></tr>
<tr>
  <td colspan="2" style="text-align: left"><div class="slideshow-container">
    <?php 
  foreach ($itatake as $key => $value) { 
    $dey = $key +1;?>
    <div class="mySlides fade">
      <div class="numbertext"><?php echo "$dey / $itatake_size"; ?></div>
      <img src="<?php echo"products_images/$value"; ?>" style="width:100%">
    </div>
   <span style="display: none;" class="dot" onclick="currentSlide(<?php echo "$key"; ?>)"></span>    
    <?php }  ?>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
  </td>
</tr>

<tr>
  <td colspan='2' id='a7mar' >&ensp; Nutriscore Classification </td>
</tr>

<tr>
  <td colspan="2" ><?php echo "$classification";?></td>
</tr>

<tr>
  <td colspan='2' id='a7mar' >&ensp; Nutritional Scale </td>
</tr>

<tr>
  <td colspan='2' id="dotscale" ><ul><?php if($im==0){
    foreach ($nutritional_scale_phase3 as $key => $value) { ?>
      <li><?php echo "$key : "."$value"."\n"; ?></li>
    <?php } }?></ul>
  </td>
</tr>

<tr>
  <td colspan='2' id='a7mar' >Allergic contents </td>
</tr>
 
<tr>
  <td colspan='2' ><?php foreach ($allergic_ingredients as $key => $value) {  
   echo "<a href='allergic_facts.php#$value'>$value</a>\n &ensp;";
   } ?></td>
</tr>

<tr>
  <td colspan='2' id='a7mar' >Additive contents </td>
</tr>

<tr>
  <td colspan='2' ><?php foreach ($additive_ingredients as $key => $value) {  
   echo "<a href='additive_facts.php#$value'>$value</a>\n &ensp;";
   } ?></td>
</tr>

<tr>
  <td colspan='2' id='a7mar'>Original Info</td>
</tr>

<tr>
  <td colspan='2'><?php if(!empty($original_info)){echo "$original_info"; }?></td>
</tr> 
</table>

<script>
var slideIndex = 1; // was 1 ;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<?php
 } // lal isset product id
} // lal function

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                             romove a product from favorite list                                      ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function remove_favorite(){
    global $con ;
    $user_phone = $_SESSION["phone_nbr"];
    $product_id = $_GET['product_id']; ?>
  <script type="text/javascript">
    if (document.getElementById('truth').name=="disheart") {

        document.getElementById('truth').src="images/heart-empty.png"
        document.getElementById('truth').name="heart"
        <?php
         $delete ="DELETE FROM `favorites` WHERE fav_product='$product_id' and user_phone='$user_phone' LIMIT 1";
         $run = mysqli_query($con,$delete); ?>
        }
  </script>
<?php } 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                                  add a product to favorite list                                      ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function add_to_favorite(){ 
    global $con ;
    $user_phone = $_SESSION["phone_nbr"];
    $product_id = $_GET['product_id'];
    $barcode = $_GET['bar']; ?>
  <script type="text/javascript">
    if (document.getElementById('truth').name=="heart") {

        document.getElementById('truth').src="images/heart-full.png"
        document.getElementById('truth').name="disheart" 
        <?php
        $insert = "INSERT INTO favorites (fav_product, user_phone,fav_barcode) VALUES('$product_id','$user_phone','$barcode')";
        $run = mysqli_query($con,$insert); ?>
    }</script>
<?php } 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                             function qui affiche la favorite list                                    ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function my_favorites(){
    global $con ;
    $user_phone = $_SESSION["phone_nbr"];
    $get_favorites = "select * from favorites where user_phone='$user_phone'";
    $run = mysqli_query($con,$get_favorites);
    while($row=mysqli_fetch_array($run)){

    $barcode=$row['fav_barcode'];
    $product_id = $row['fav_product'];
    $fav_form =  "<form action='single_product.php?product_id=$product_id&bar=$barcode' method='post'><input id='truth' type='image' src='images/heart-full.png' name='disheart' alt='heart' width='90' height='90'></form>";
    $select="select * from variant inner join products ON variant.product_id=products.product_id where products.product_id='$product_id' AND barcode='$barcode'";
    $rain = mysqli_query($con,$select);
    while($roll=mysqli_fetch_array($rain)){
    $product_name = $roll['product_name'];
    $variant =$roll['variant_name'];
    $brand = $roll['brand'];
    $nutriscore = $roll['nutriscore'];
    $score = strtoupper($nutriscore);
    $tableid = bstyler($score);
    $pid = pstyler($score);
    $upload_image = $roll['images'];
    $itatake = unserialize($upload_image);
    $im = 0 ;

    foreach ($itatake as $key => $value) {
    if (empty($value)) {
       unset($itatake[$key]);
      }
    }
    if (empty($itatake)) {
      $im+=1;
    }
    else{
      $image = array_pop($itatake);
    }

?>
    <table id="<?php echo"$tableid"; ?>" onclick="document.location.href='<?php echo"single_product.php?product_id=$product_id&bar=$barcode";?>';" >
      <tr>
        <td rowspan="2"><p id="<?php echo"$pid"; ?>" ><?php echo"$score";?></p> </td>
        <td style="font-style: bold; font-size: 70px;"><?php echo "$product_name"; ?></td>
        <td rowspan="2">
          <?php 
          if ($im==0) {
            echo "<img src='products_images/$image' width='100px' height='100px'>";}
          //if($im>0){echo "";}
          ?>
        </td>
        <td rowspan="2"><?php echo "$fav_form"; ?></td>
        <?php
          if(isset($_POST['disheart_x'])) {
            remove_favorite(); 
        } ?>
      </tr>
      <tr><td style="font-style: italic; font-size: 49px;"><?php echo "$brand\n $variant"; ?></td></tr><br><br>
    </table>
<?php
  } // while law ydroun
 } // tsliret l while looop
} // tsliret l function

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                              add a product to the history list                                       ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function add_to_history(){ 

 global $con ;
 $user_phone = $_SESSION["phone_nbr"];
 $product_id = $_GET['product_id'];
 $barcode=$_GET['bar'];//jdide
 $check ="SELECT p_history FROM users WHERE phone_nbr='$user_phone'";
 $rog = mysqli_query($con,$check);
 $raw=mysqli_fetch_array($rog);
 $p_history=$raw['p_history'];
 if (is_null($p_history)) {
   $history=array("$product_id,$barcode"=>date('Y-m-d h:i:sa'));
   $p_history=serialize($history);
   $insert="UPDATE `users` SET `p_history`='$p_history' WHERE phone_nbr='$user_phone'";
   $road = mysqli_query($con,$insert);
 }
 else{
  $history=unserialize($p_history);
  $size=sizeof($history);
  if ($size < 50) {
    $new="$product_id,$barcode";
    $history[$new]=date('Y-m-d h:i:sa');
    $p_history=serialize($history);
    $insert="UPDATE `users` SET `p_history`='$p_history' WHERE phone_nbr='$user_phone'";
    $road = mysqli_query($con,$insert);
  }
  else if ($size==50) {
    array_shift($arr);
    $new="$product_id,$barcode";
    $history[$new]=date('Y-m-d h:i:sa');
    $p_history=serialize($history);
    $insert="UPDATE `users` SET `p_history`='$p_history' WHERE phone_nbr='$user_phone'";
    $road = mysqli_query($con,$insert);
  }
 }

} 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
////                                                                                                      ////
////                                       get the history list                                           ////
////                                                                                                      ////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_history(){

 global $con ;
 $user_phone = $_SESSION["phone_nbr"];
 $get ="SELECT p_history FROM users WHERE phone_nbr='$user_phone'";
 $rog = mysqli_query($con,$get);
 $raw=mysqli_fetch_array($rog);
 $p_history=$raw['p_history'];
 if (is_null($p_history)) { echo "Your history is empty";}
 else{
  $history=unserialize($p_history);
  foreach ($history as $key => $value) {
    $bakka=explode(",", $key);
    $select="SELECT * from variant inner join products ON variant.product_id=products.product_id where products.product_id='$bakka[0]' AND variant.barcode='$bakka[1]'";
    
    $road = mysqli_query($con,$select);
    $row=mysqli_fetch_array($road);

    $product_id = $row['product_id'];
    $barcode = $row['barcode'];
    $product_name = $row['product_name'];
    $variant =$row['variant_name'];
    $brand = $row['brand'];
    $nutriscore = $row['nutriscore'];
    $score = strtoupper($nutriscore);
    $tableid = bstyler($score);
    $pid = pstyler($score);
    $upload_image = $row['images'];
    $itatake = unserialize($upload_image);
    $im = 0 ;

    foreach ($itatake as $key => $value1) {
    if (empty($value1)) {
       unset($itatake[$key]);
      }
    }
    if (empty($itatake)) {
      $im+=1;
    }
    else{
      $image = array_pop($itatake);
    }

?>
    <table id="<?php echo"$tableid"; ?>" onclick="document.location.href='<?php echo"single_product.php?product_id=$product_id&bar=$barcode";?>';" >
      <tr>
        <td rowspan="3"><p id="<?php echo"$pid"; ?>" ><?php echo"$score";?></p> </td>
        <td style="font-style: bold; font-size: 70px;"><?php echo "$product_name"; ?></td>
        <td rowspan="3">
          <?php 
          if ($im==0) {
            echo "<img src='products_images/$image' width='100px' height='100px'>";}
          //if($im>0){echo "";}
          ?>
        </td>
      </tr>
      <tr><td style="font-style: italic; font-size: 49px;"><?php echo "$brand\n $variant"; ?></td></tr><br><br>
      <tr><td style="font-style: italic; font-size: 40px; background-color: #9AB9DF; "><?php echo "$value"; ?></td></tr><br><br>
    </table>
<?php

  } // tskiret l for each
 } // tskiret l else
} // tskiret l function
?>