<!DOCTYPE html>
<html lang="en">
	
	<?php
	include("links.php");
	require 'classes.php';
	include("drawer.php");
	?>
	
	<body>
		<div class="container-fluid">
			
			<?php include("menu.php"); ?>
			
			<div class="row ImagesInVideo">
			<?php include('headerImage.php'); ?>
			</div>
			
			<div class="row SpecificDescriptionRow" style="margin-top:140px;box-shadow: none;">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="img-thumbnail">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No-Image"/>
						<?php include('ratings.php'); ?>
						<button type="button" class="btn btn-warning">Play</button>
						
						<div class="text-center">
							<p class="onlineGamesText">Name of Game</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="img-thumbnail">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No-Image"/>
						<?php include('ratings.php'); ?>
						<button type="button" class="btn btn-warning">Play</button>
						
						<div class="text-center">
							<p class="onlineGamesText">Name of Game</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row SpecificDescriptionRow" style="margin-top:30px;box-shadow: none;">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="img-thumbnail">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No-Image"/>
						<?php include('ratings.php'); ?>
						<button type="button" class="btn btn-warning">Play</button>
						
						<div class="text-center">
							<p class="onlineGamesText">Name of Game</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 col-xs-6">
					<div class="img-thumbnail">
						<img src="<?php (new Select)->image('./newImages/General/'); ?>" class="img-responsive" alt="No-Image"/>
						<?php include('ratings.php'); ?>
						<button type="button" class="btn btn-warning">Play</button>
						
						<div class="text-center">
							<div class="text-center">
								<p class="onlineGamesText">Name of Game</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row text-center">
				<?php include('footer.php'); ?>
			</div>
		</div>
		
		<?php include('script.php'); ?>
	</body>
</html>
