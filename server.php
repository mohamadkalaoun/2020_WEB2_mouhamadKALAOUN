<?php
session_start();
include("functions.php");

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'i_stema') or die("something went wrong");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $phone= mysqli_real_escape_string($db, $_POST['phone']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE phone_nbr='$phone' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['phone_nbr'] === $phone) {
      array_push($errors, "Phone number already exists");
    }

    if ($user['user_email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_crypt = ucrypt($password_1);//encrypt the password before saving in the database
    //$randomNum=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 33);

  	$query = "INSERT INTO users (name, phone_nbr , user_email, password ,verified) 
  			  VALUES('$name','$phone' ,'$email','$password_crypt','$randomNum')";
  	mysqli_query($db, $query);
  	//$_SESSION['phone_nbr'] = $phone;
  	//$_SESSION['success'] = "You are now logged in";

   // mail($email,"verify your account","<a href=\"verify.php?code=$randomNum\">Click here to verify</a>");
   // echo "<script>alert('A verfication mail has been sent to your submited mail , so please verify your account to successfuly log in');</script>";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (count($errors) == 0) {
    $password_crypt = ucrypt($password);
    //$query = "SELECT * FROM users WHERE phone_nbr='$phone' AND password='$password_crypt' AND verified='TRUE'";
    $query = "SELECT * FROM users WHERE phone_nbr='$phone' AND password='$password_crypt'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['phone_nbr'] = $phone;
      header('location: index.php');
      //$_SESSION['success'] = "You are now logged in";
        if(!empty($_POST["remember"])) {
          $simple_string = strval($phone);
          $encryption = ucrypt($simple_string);

          setcookie ("phone",$encryption,time()+ 2628000);

          $simple_string2 = $_POST["password"];
          $encryption2 = ucrypt($simple_string2);
          setcookie ("password",$encryption2,time()+ 2628000);
          //echo "Cookies Set Successfuly";
          } else { 
          setcookie("username","");
          setcookie("password","");
          //echo "Cookies Not Set";
          } 
      
    }else {
      array_push($errors, "Wrong phone number/password combination");
    }
  }

}


if (isset($_POST['login_admin'])) {
  $phone =$_POST['phone'];
  //echo "$phone\n";
  $password = $_POST['password'];
  //echo "$password\n";
  $admin_phone = "1029384756" ;
  $admin_password = "qazwsxedcrfv";

  if ($phone==$admin_phone && $password==$admin_password) {
    $_SESSION['phone_nbr'] = $phone;
    header('location: manager_lobby.php');
  }
  else{
    header('location: log_admin.php');
  }
}
?>