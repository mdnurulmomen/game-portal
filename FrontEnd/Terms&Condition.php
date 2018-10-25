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
			
			<div class="row TermsConditionRow">
				<div class="col-md-12 col-sm-12 col-xs-12 anotherTextStyle">
					
					<h5>Terms & Conditions</h5>
					<p>
						GameR is fully Subscription-based Mobile Web Site. 
						Other than ‘Free Zone’, Download of any Game or Playing 
						in Online is Subject to Subscription first.
					</p>
					<p>
						GameR is best viewed with Mobile’s Native Browser. Other Browser may have compatibility.
					</p>
					<p>
						Daily Subscription charge is BDT 2.44 which is Auto-Renewable. Additional Paid purchase is according to different price point.
					</p>
					<p>
						<strong>By proceeding and subscription is after you agreed the Terms and Conditions mentioned above.</strong>
					</p>
				</div>
			</div>
			
			<div class="row text-center">
				<?php include('footer.php'); ?>
			</div>
		</div>
		
		<?php include('script.php'); ?>
	</body>
</html>
