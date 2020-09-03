<?php include('server.php') ; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Stema Manager</title>
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
  	<h2>Manager Login</h2>
  </div>
	 
  <form name="myform" method="post" action="log_admin.php" onsubmit="return validateform()">
  	
  	<div class="input-group">
  		<label>Phone Number</label>
      <input name="phone" type="phone">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input name="password" type="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_admin">Login</button>
  	</div>
  </form>
</body>
</html>
