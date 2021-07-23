<?php 
include 'config/config.php';
$page_title = "Dashboard";
if(!user_login()){
    header("location: login.php?act=dashboard");
}
include 'header.php';
include 'menu.php';
?>

<?php
if(isset($_POST["ok-post"])){
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);
    $phone = mysqli_real_escape_string($conn,$_POST["number"]);
    $state = mysqli_real_escape_string($conn,$_POST["state"]);


    $sql = "INSERT into posts (name,price,phone,state) values ('$name','$price', '$phone', '$state') ";
    $result = $conn->query($sql)or
    die(mysqli_error($conn));
    if($result === TRUE){

        set_flash("post updated successfully","success");
    }else{
        set_flash("There was error in updating the post","danger");
    }
}


?>

                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Dashboard</h2>
						<?php
						$sql = "SELECT * from posts order by id desc";
						$result = $conn->query($sql)or
						die(mysqli_error($conn));
						if($result->num_rows > 0){
							while($rs = $result->fetch_assoc()){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="width: 300px; height: 250px;" src="postimages/<?php echo($rs["photo"]);?>">
											<h2>&#8358; <?php echo number_format($rs["price"],2); ?></h2>
											<p><?php echo $rs["name"]; ?></p>
											<a href="update_post.php?postid=<?php echo($rs["postid"]);?>" target="_blank" class="btn btn-default add-to-cart"><i class="fa fa-uplaod"></i>Update Post</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>&#8358; <?php echo number_format($rs["price"],2); ?></h2>
												<p><?php echo $rs["name"]; ?></p>
												<p><?php echo $rs["state"]; ?></p>
												<a href="update_post.php?postid=<?php echo($rs["postid"]);?>" target="_blank" class="btn btn-default add-to-cart"><i class="fa fa-upload"></i>Update Post</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-map-marker"></i><?php echo $rs["state"]; ?></a></li>
										<li><a href="#"><i class="fa fa-phone"></i><?php echo $rs["phone"]; ?></a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php
							}
						}
						?>
					</div><!--features_items-->
                    <div class="container" style="padding: 0 100px;">
    <h3 class="head">Update your product</h3>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <?php echo flash(); ?>
        <div class="row">
        <div class="col-25">
            <label for="name">Name of Product</label>
        </div>
        <div class="col-75">
            <input type="text" id="name" name="name" placeholder="E.g. Shirt" required="">
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label for="price">Price (&#8358;)</label>
        </div>
        <div class="col-75">
            <input type="text" id="price" name="price" placeholder="E.g. 40000" required="">
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label for="number">Phone Number</label>
        </div>
        <div class="col-75">
            <input type="text" id="number" name="number" placeholder="E.g. 08039564196" required="">
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label for="state">State</label>
        </div>
        <div class="col-75">
            <input type="text" id="state" name="state" placeholder="E.g. Lagos State" required="">
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label for="desc">Description</label>
        </div>
        <div class="col-75">
            <textarea id="desc" name="desc" placeholder="Give a brief description of the item you want to post" style="height:200px"></textarea>
        </div>
        </div>
        <p class="prdesc">Click "CHOOSE FILE" to upload your Product Images</p>
        <input type="file" id="myfile" name="photo">
        <div class="row">
            <button class="btn-post" name="ok-post" type="submit">Update <i class="fa fa-upload"></i></button>
        </div>
    </form>
</div>					
</div>
