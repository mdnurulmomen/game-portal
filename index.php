<!DOCTYPE html>
<html lang="en">

	
	<?php 
	include('links.php');
	require 'classes.php';
	include('drawer.php');
	?>
	
	<body>
		<div class="container-fluid">
		
			<?php include('menu.php'); ?>
		
			<div class="row">
				<video id="myVideo" controls autoplay muted loop>
					<source src="<?php (new Select)->video('./video/'); ?>" type="video/mp4">
					<source src="<?php (new Select)->video('./video/'); ?>" type="video/webm">
					<source src="<?php (new Select)->video('./video/'); ?>" type="video/ogg">
					<source src="<?php (new Select)->video('./video/'); ?>" type="video/avi">
					<img src='<?php (new Select)->image('./newImages/Latest/'); ?>' alt='Image showing a cute cat' />
				</video>
			</div>
			
			<div class="row LatestFeaturedRow">	
			<?php include('latestGame.php'); ?>
			<?php include('featuredGame.php'); ?>	
			</div>
			
			<div class="row NowTrending" style="border-radius: initial; box-shadow: 0px 0px 7px #A4C6E2;">
			<?php include('nowTrending.php'); ?>
			</div>
			
			<div class="row FreePlayZoneRow">
				<h5><strong>Free Zone</strong></h5>
				<?php include('zoneFreePlay.php'); ?>
			</div>
			
			<div class="row OnlinePlayZoneRow">
				<h5><strong>Play Online</strong></h5>
				<?php include('zoneFreePlay.php'); ?>
			</div>
			
			<div class="row TopDownloadZoneRow">
				<h5><strong>Top Downloads</strong></h5>
				<?php include('sliderWithTwo.php'); ?>
			</div>
			
			<div class="row SubscriptionInfo">
				<h5><strong>Subscription Info</strong></h5>
				
				<div class="col-sm-12 col-md-12 col-xs-12">
					<p>
						Everyday 1 Game and Free Zone is free to download. Daily subscription fee BDT TK 2+ (VAT, SD &amp; SC) (auto renewal). This cycle will continue until user deactivated the service. Service deactivation process: stop &lt;&gt; GR and send to 16316.
					</p>
				</div>
				
				<div class="clearfix"></div>
			</div>
			
			<div class="row text-center">
			<?php include('footer.php'); ?>
			</div>
		</div>
		
		<?php include('script.php'); ?>
		<!-- Compiled and minified JavaScript 
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
		-->
	</body>
</html>
