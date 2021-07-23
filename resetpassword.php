<?php
include 'config/config.php';
$page_title = "Signup/Signin";
?>
<?php
if(isset($_POST["ok-update"])){
	$password = mysqli_real_escape_string($conn,$_POST["password"]);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$userid = mysqli_real_escape_string($conn,$_POST["userid"]);

	$sql = "UPDATE market_users set password = '$password' where userid = '$userid' ";
	$result = $conn->query($sql)or
	die(mysqli_error($conn));

	if($result === TRUE){

		set_flash("Password reset successfully, click <a href='login.php'>here</a> to signin", "success");

	}else{

		set_flash("There was error in resetting your password, kindly make sure you password and confirm password matches each other","danger");
	}
}

include 'header.php';
include 'menu.php';
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<?php
				if(isset($_SESSION["userid"])){

					$userid = $_SESSION["userid"];
				?>
				<div class="col-sm-4 col-sm-offset-4">
					<?php echo flash() ?>
					<div class="login-form"><!--login form-->
						<h2>Forgot Password</h2>
						<form action="#" method="post">
							<input type="password" placeholder="Input your new password" name="password" value="">
							<input type="password" placeholder="Confirm your new password" name="cpassword" value="">
							<input type="hidden" name="userid" value="<?php echo($userid); ?>">
							<span>
								<a class="text-right" style="color: #fdb45e;" href="login.php">Sign Up</a>
							</span>
							<button type="submit" class="btn btn-default" name="ok-update">Update My Password <i class="fa fa-check"></i></button>
						</form>
					</div><!--/login form-->
				</div>
				<?php
			    }else{
			    ?>
			        <div class="alert alert-danger text-center" style="margin: 0 150px;">
			            <i class="fa fa-warning"></i> Invalid or bad request
			        </div>
			    <?php
			    }
			    ?>
			</div>
		</div>
	</section>

	<!--/form-->
	<?php include 'footer.php' 
	?>
	
	
	