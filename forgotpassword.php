<?php
include 'config/config.php';
$page_title = "Signup/Signin";
?>
<?php
if(isset($_POST["ok-find"])){
	$email = mysqli_real_escape_string($conn,$_POST["email"]);

	$sql = "SELECT * from market_users where email = '$email' ";
	$result = $conn->query($sql)or
	die(mysqli_error($conn));

	if($result->num_rows > 0){
		$rs = $result->fetch_assoc();


		$_SESSION["userid"] = $rs["userid"];
		set_flash("Account found with this email $email, click <a href='resetpassword.php'>here</a> to continue", "success");		

	}else{
		set_flash("No record found with this email $email, you can click on the sign up button to register","danger");
	}
}


include 'header.php';
include 'menu.php';
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<?php echo flash() ?>
					<div class="login-form"><!--login form-->
						<h2>Forgot Password</h2>
						<form action="#" method="post">
							<input type="text" placeholder="Input your email address to continue" / name="email" value="<?php echo @$_POST["username"];?>" />
							<span>
								<a class="text-right" style="color: #fdb45e;" href="login.php">Sign Up</a>
							</span>
							<button type="submit" class="btn btn-default" name="ok-find">Find My Account <i class="fa fa-search"></i></button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php include 'footer.php' 
	?>
	
	
	