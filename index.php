<?php
include 'config/config.php';
$page_title = "Home";

include 'header.php';

include 'menu.php';
?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>SideHustle</span>-Market</h1>
									<h2>Buying And seliing at your fingertips.</h2>
									<p>Buy products you need in school from staylittes whom are graduating, and staylittes can sell their products/properties to freshers. </p>
									<a href="sell.php"><button type="button" class="btn btn-default get">Sell Now!!</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>SideHustle</span>-Market</h1>
									<h2>Connect with New People Around You</h2>
									<p>Connect with freshers or staylittes on campus, Mingle around, Go on Dates and explore the campus life. </p>
									<a href="connect.php"><button type="button" class="btn btn-default get">Connect Now!!</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>SideHustle</span>-Market</h1>
									<h2>Promote Your Business At Affordable Price</h2>
									<p>Post your Ads and promote your side hustle on our website here. It will be displayed on the homepage for everyone whom visit the site to see. </p>
									<a href="postads.php"><button type="button" class="btn btn-default get">Get it now</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categories</h2>
						<div class="panel-group category-products" id="accordian">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Shirts
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Long sleeves</a></li>
											<li><a href="#">Short sleeves</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"></span>
											Bed
										</a>
									</h4>
								</div>
								
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"></span>
											Sneakers
										</a>
									</h4>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Standing Fan</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Deck</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Television</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Reading Table</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Cooking Utensils</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Carpets</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Laptop</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						
						</div>
					</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
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
											<a href="moreimages.php" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>More Images</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>&#8358; <?php echo number_format($rs["price"],2); ?></h2>
												<p><?php echo $rs["name"]; ?></p>
												<p><?php echo $rs["state"]; ?></p>
												<a href="moreimages.php" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>More Images</a>
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
					
					
					
				</div>
			</div>
		</div>
	</section>

	<?php
	include 'footer.php'
	?>
	
