<?php
session_start();
if(!isset($_SESSION['phone_nbr'])){
	
	header("location: login.php");
}
?>
<?php
include("functions.php");

$con = mysqli_connect("localhost","root","","i_stema");
$user = $_SESSION['phone_nbr'];
$get_user = "select * from users where phone_nbr='$user'"; 
$run_user = mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);
					
$user_id = $row['user_id']; 
$user_name = $row['name'];
$phone_nbr = $row['phone_nbr'];
$password = $row['password'];
$clear_pass = udecrypt($password);
$user_email = $row['user_email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>your profile</title>
	<meta charset="utf-8">
</head>
<style>
.newcss{
    font-size: 50px;
    background-color:#44f353;
    border-collapse: collapse;
    border: 8px #218137;
}
input{
    font-size: 40px;
    height: 80px;
}

</style>
<body>

		<form action="" method="post" enctype="multipart/form-data" class="newcss">
					<table border="5px" cellspacing="10px" cellpadding="4px">
						<tr align="center">
							<th colspan="6" ><h2>Edit Your Profile</h2></th>
						</tr>
						<tr>
							<td style="font-weight: bold;">Change Your Name</td>
							<td>
							<input  type="text" name="f_name" required="required" value="<?php echo $user_name;?>"/>
							</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Phone Number</td>
							<td>
							<input readonly type="text" name="phone" value="<?php echo $phone_nbr;?>"/>
							</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Email</td>
							<td>
							<input  type="email" name="u_email" value="<?php echo $user_email;?>" readonly ></td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Old Password</td>
							<td>
							<input type="password" name="u_pass" required="required" placeholder="type your old password here" />
							</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">New Password</td>
							<td>
							<input type="password" name="npass"  required="required" placeholder="type your new password here"></td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Confirm Password</td>
							<td>
							<input type="password" name="cpass" required="required" placeholder="retype your new password here" ></td>
						</tr>
						<tr align="center">
							<td colspan="6">
							<input class="update" style="width: 250px;" type="submit" name="update" value="Update"/>
							</td>
						</tr>
						<tr align="center">
							<td colspan="6">
							<a href="index.php">Back To Home Page</a>
							</td>
						</tr>
					</table>
				</form>
</body>

					
<?php 

if(isset($_POST['update'])){
		
		$f_name = htmlentities(mysqli_real_escape_string($con,$_POST['f_name']));
		
		$u_pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));// the old one\
		
		$n_pass = htmlentities(mysqli_real_escape_string($con,$_POST['npass'])); // new one

		$c_pass = htmlentities(mysqli_real_escape_string($con,$_POST['cpass'])); // cofirm it ?


		$errors=0;

		if ($u_pass == $clear_pass) {
			if ($n_pass == $c_pass) {
				$v_pass = ucrypt($n_pass) ; }			
			else{
			$errors+=1;
			echo "Please Type The Same Password !\n";
				} }
		else{
			$errors+=1;
			echo "The Old Password Is Wrong ! \n";
			}
		if ($errors!=0) {
			echo "Failed To Update\n";
		}
		else{
		$update = "update users set name='$f_name', password='$v_pass' WHERE user_id='$user_id'";
		$run = mysqli_query($con,$update); 
		if($run){
				echo "Updated!";
				if (isset($_COOKIE["password"])) {
					setcookie ("password",$v_pass,time()+ 3600);
				}
			}
		}	
	}  
?> 
</html>