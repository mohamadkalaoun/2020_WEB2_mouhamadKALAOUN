<?php 
include('server.php') ;
      
if(isset($_COOKIE["phone"])) {
         $encryption=$_COOKIE["phone"]; 

         $decryption1 = udecrypt($encryption);
       }

       if(isset($_COOKIE["password"])) {
         $encryption2=$_COOKIE["password"]; 

         $decryption2 = udecrypt($encryption2);
       } ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login To Stema</title>
  <link rel="stylesheet" type="text/css" href="css/camp.css">
   <!-- javascript login validation -->
  <script>
      function phonenumber(inputtxt){
      var phoneno =/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
      if(inputtxt.match(phoneno)){
        return true;}
      else{
        alert("Please type a valid phone number type");
        return false;
        }
      }  
       function validateform(){  
       var uphone = document.myform.phone.value;
       var password=document.myform.password.value;  
  
       var answer=phonenumber(uphone);
       if (answer==false) {
         return false ;
       } 
       else if(password.length<8){  
       alert("Password must be at least 8 characters long.");  
       return false;  
     }  
    } 
  </script> 
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form name="myform" method="post" action="login.php" onsubmit="return validateform()">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Phone Number</label>
      <input name="phone" type="phone" value="<?php if(isset($_COOKIE["phone"])) { echo "$decryption1";}?>">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo "$decryption2";}?>">
  	</div>
    <p><input id="taspart2" type="checkbox" name="remember" /> Remember me
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
      <a id="tasele" style="text-decoration:none; color:#187FAB;" data-toggle="tooltip" title="Reset Password"  href="forgot_password.php">Forgot?</a>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>