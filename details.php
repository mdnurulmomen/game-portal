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
			<div class="row SpecificDescriptionRow">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="img-thumbnail">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" style="border-bottom:#840000 solid 3px;" alt="No-Image"/>
						<a href="./newImages/General/Sized/4.png" download="fileName">
							<img src="pic/download.png" width="40px" height="40px" style="position:absolute;margin:-55% 0 0 83%;"/>
						</a>
						<div class="text-left">
							<p class="collapse" id="collapseExample" aria-expanded="false">
								Jump into the extreme sport of Skydiving. 
								Experience the excitement as you take charge 
								of  a team of dare-devils . Plummet towards 
								the Eartth's surface at scorching speeds and 
								pull off incredible formations. There are 10 
								death defying formations for you to lead your team through. Take the plunge! Formations: Simple 4-way Zig Zag - Marquie Block Snowflake - In-out Block Compass Penta Bipole 16-way 16-way Zipper-Opals 16-way Quadra Snowflakes 16-way Double Stereo Bipoles 16-way Otter Trail Instructions: keys 4/LEFT to turn anti-clockwise keys 6/RIGHT to turn clockwise Preview.
							</p>
							<div class="text-right">
								<a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></a>
							</div>
							
							<div class="acidjs-rating-stars">
								<form>
									<input type="radio" name="group-1" id="group-1-0" value="5" /><label for="group-1-0"></label>
									<input type="radio" name="group-1" id="group-1-1" value="4" /><label for="group-1-1"></label>
									<input type="radio" name="group-1" id="group-1-2" value="3" /><label for="group-1-2"></label>
									<input type="radio" name="group-1" id="group-1-3" value="2" /><label for="group-1-3"></label>
									<input type="radio" name="group-1" id="group-1-4" value="1" /><label for="group-1-4"></label>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row ScreenShotRow">
				<h5><strong>Screen Shot</strong></h5>
				<div class="SliderWithThree">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive screenShotImage" alt="No Image" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive screenShotImage" alt="No Image" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive screenShotImage" alt="No Image" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive screenShotImage" alt="No Image" />
					</div>
				</div>
				
				<div class="clearfix"></div>
			</div>
			
			<div class="row ScreenShotRow">
				<h5><strong>Screen Shot(New One)</strong></h5>
				
				<div class="SliderWithThree">
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No Image" />
					</div>
				</div>
				
				<div class="clearfix"></div>
			</div>
			
			<div class="row YouMayLikeRow">
				<h5><strong>You may Like</strong></h5>
				<?php include('sliderWithTwo.php'); ?>
			</div>
			
			<div class="row text-center">
			<?php include('footer.php'); ?>
			</div>
		</div>
		<?php include('script.php'); ?>
	</body>
</html>
