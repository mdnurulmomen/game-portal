<!DOCTYPE html>
<html lang="en">
	
	<?php
	include("links.php");
	require 'classes.php';
	include("drawer.php");
	?>
	
	<body>
		<div class="container-fluid">
			
			<?php include('menu.php'); ?>
			
			<div class="row ImagesInVideo">
			<?php include('headerImage.php'); ?>
			</div>
			
			<div class="row MoreGamesRow">
				<div class="col-sm-12">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div>
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-4 col-sm-4 col-xs-4">
						<a href="details.php" target="">
							<div class="specificImageFrame">
								<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
							</div>
							<div class="">
								<p>Rush Street</p>
							</div>
						</a>
					</div>
					<div class="text-center">
						<a href="#">
							<img src="pic/morebtn.png" width="80px" height="25px" align="middle">				
						</a>
					</div>
				</div>
			</div>
			
			<div class="row YouMayLikeRow">
				<h5><strong>You may Like</strong></h5>
				<?php include('sliderWithThree.php'); ?>
			</div>
			
			
			<div class="row text-center">
			<?php include('footer.php'); ?>
			</div>
		</div>
		<?php include('script.php'); ?>
	</body>
</html>
