<?php
include 'config/config.php';
$page_title = "Signup/Signin";
?>
<?php
if(isset($_POST["ok-submit"])){
	$full_name = mysqli_real_escape_string($conn,$_POST["names"]);
	$state = mysqli_real_escape_string($conn,$_POST["state"]);
	$phone = mysqli_real_escape_string($conn,$_POST["phone"]);
	$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
	$email = mysqli_real_escape_string($conn,$_POST["email"]);
	$password = mysqli_real_escape_string($conn,$_POST["password"]);
	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT market_users(userid,full_name,state,phone,gender,email,password) values ('$userid','$full_name','$state','$phone','$gender','$email','$password') ";
	$result = $conn->query($sql)or
	die(mysqli_error($conn));

	if($result === TRUE){
		set_flash("Registration succesfful","success");
	}else{
		set_flash("There error in Registration","danger");
	}
}


if(isset($_POST["ok-login"])){
	$username = mysqli_real_escape_string($conn,$_POST["username"]);
	$password = mysqli_real_escape_string($conn,$_POST["password"]);

	$sql = "SELECT * from market_users where email = '$username' ";
	$result = $conn->query($sql)or
	die(mysqli_error($conn));

	if($result->num_rows > 0){
		$rs = $result->fetch_assoc();
		$email = $rs["email"];
		if(password_verify($password, $rs["password"])){

			$_SESSION["member"] = $email;
			
			if(isset($_GET["act"])){
				switch ($_GET["act"]) {
					case 'upload items':
						header("location: postitems.php");
						break;

					case 'account':
						header("location: account.php");
						break;

					case 'dashboard':
						header("location: dashboard.php");
						break;

					
					default:
						// code...
						break;
				}
			}else{
				header("location: index.php");
			}
			
		}else{
			set_flash("Username or password is incorrect","danger");
		}
	}else{
		set_flash("Username or password is incorrect","danger");
	}	
}

include 'header.php';
include 'menu.php';
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" method="post">
							<input type="text" placeholder="Input your Gmail Address" / name="username" value="<?php echo @$_POST["username"];?>" />
							<input type="password" placeholder="Input your password" / name="password" ?>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<span>
								<a class="text-right" style="color: #fdb45e; float: right;" href="forgotpassword.php">Forgot Password?</a>
							</span>
							<button type="submit" class="btn btn-default" name="ok-login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<?php echo flash(); ?>
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="text" placeholder="Full Name" name="names" required="" />
							<input type="text" placeholder="State" name="state" required="" />
							<input type="text" placeholder="Phone number" name="phone" required="" />
							<input type="text" name="gender" placeholder="Gender" required="" />
							<input type="email" placeholder="Email Address" name="email" required="" />
							<input type="password" placeholder="Password" name="password" required="" />
							<input type="password" placeholder="Retype Password" name="cpassword" required="" />
							<button type="submit" class="btn btn-default" name="ok-submit">Signup</button>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php include 'footer.php' 
	?>
	
	
	