<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <!-- sign up validation -->
  <script type="text/javascript">
    function phonenumber(inputtxt){
      var phoneno =/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
      if(inputtxt.match(phoneno)){
        return true;}
      else{
        alert("Please type a valid phone number type");
        return false;
        }
      }
    function validatesignup() {
        var name= document.signupform.name.value ;
        var uphone = document.signupform.phone.value;
        var x=document.signupform.email.value;  
        var atposition=x.indexOf("@");  
        var dotposition=x.lastIndexOf(".");
        var firstpassword= document.signupform.password_1.value ;
        var secondpassword=document.signupform.password_2.value ;
        
    if (name==null || name==""){  
     alert("Name can't be blank");  
     return false;  
    }
    var answer=phonenumber(uphone);
    if (answer==false) {
      return false ;
    }
    else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
     alert("Please enter a valid e-mail address ");  
     return false;  
     }  
    else if(firstpassword.length<8){  
    alert("Password must be at least 8 characters long.");  
    return false; } 
    else if(!(firstpassword==secondpassword)){ 
    alert("password must be same!");
    return false;  
    } 
    }
</script>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form name="signupform"  method="post" action="register.php" onsubmit="return validatesignup()">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" >
  	</div>
    <div class="input-group">
      <label>Phone</label>
      <input type="Phone" name="phone" >
    </div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" >
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>