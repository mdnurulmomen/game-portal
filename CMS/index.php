<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Stylish Portfolio - Start Bootstrap Template</title>

		<!-- Bootstrap Core CSS 
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		-->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<!-- Custom Fonts -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/stylish-portfolio.min.css" rel="stylesheet">
		<style>
			.col-lg-6{
				padding:0;
			}
			
			.img-fluid {
				max-width: 100%;
				height: auto;
			}
			
			.rounded-circle {
				border-radius: 50% !important;
			}
			
			.text-white {
				color: #fff !important;
			}
			
			.btn-xl {
				padding: 1.25rem 2.5rem;
			}
			
			.mr-4, .mx-4 {
				margin-right: 1.5rem !important;
			}
			
			.btn-light {
				color: #212529;
				background-color: #f8f9fa;
				border-color: #f8f9fa;
			}
			
			.btn-dark {
				color: #fff;
				background-color: #343a40;
				border-color: #343a40;
			}
		</style>
	</head>

	<body id="page-top">

		<!-- Navigation -->
		<a class="menu-toggle rounded" href="#">
		  <i class="fas fa-bars"></i>
		</a>
		
		<nav id="sidebar-wrapper">
			<ul class="sidebar-nav">
				
				<li class="sidebar-nav-item">
					<a class="js-scroll-trigger" href="#page-top">Home</a>
				</li>
				<li class="sidebar-nav-item">
					<a class="js-scroll-trigger" href="#video">Welcome Video</a>
				</li>
				<li class="sidebar-nav-item">
					<a class="js-scroll-trigger" href="#services">Manage Games</a>
				</li>
				<li class="sidebar-nav-item">
					<a class="js-scroll-trigger" href="#history">Review Recent</a>
				</li>
				<li class="sidebar-nav-item">
					<a class="js-scroll-trigger" href="#download">Download Content</a>
				</li>
				<li class="sidebar-nav-item">
					<a class="js-scroll-trigger" href="#contact">Contact Map</a>
				</li>
			</ul>
		</nav>

		<!-- Home -->
		<header class="masthead d-flex">
			<div class="container text-center my-auto">
				<h1 class="mb-1">Gamer</h1>
				<h3 class="mb-5">
				  <em>An Admin Panel</em>
				</h3>
				<a class="btn btn-primary btn-xl js-scroll-trigger" href="#video">Find Out More</a>
			</div>
			<div class="overlay"></div>
		</header>

		
		<!-- Follow Recent Activities-->
		<section class="content-section text-center" id="video">
			<div class="container">
				<h3 class="text-secondary mb-0">Welcome with Your Videos</h3>				
				<a href="#" class="btn btn-xl btn-dark mr-4">Add Video</a>
				<a href="#" class="btn btn-xl btn-primary" >List Videos</a>
			</div>
		</section>
		
		<!-- Services -->
		<section class="content-section" id="services">
			<div class="container">
				<div class="content-section-heading text-center">
				  <h2 class="text-secondary mb-0">Manage Your Contents</h2>
				</div>
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-6 mb-6 mb-lg-6">
						<a class="portfolio-item" href="#" data-toggle="modal" data-target="#addGames">
							<span class="caption">
								<span class="caption-content">
									<h3>Add Games</h3>
									<p class="mb-0">You can Upload One Game at a time!</p>
								</span>
							</span>
							<img class="img-fluid" src="img/portfolio-1.jpg" alt="">
						</a>
					</div>
				  
					<div class="col-lg-6 col-md-6 mb-6 mb-lg-6">
						<a class="portfolio-item" href="#" data-toggle="modal" data-target="#viewGames">
							<span class="caption">
								<span class="caption-content">
									<h3>View Games</h3>
									<p class="mb-0">You can Watch out all Games</p>
								</span>
							</span>
							<img class="img-fluid" src="img/portfolio-3.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</section>
		

		<!-- Callout -->
		<section class="callout" id="history">
			<div class="container text-center text-white">
				<div class="content-section-heading">
					<h2 class="mx-auto mb-5">
						Revision
					</h2>
					<h4 class="mb-5"></h4>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 mb-3 mb-lg-3"></div>
					<div class="col-lg-3 col-md-3 mb-3 mb-lg-3">
						<a href="#" class="btn" data-toggle="modal" data-target="#recentAddition">
							<span class="service-icon rounded-circle mx-auto mb-3">
							  <i class="icon-magnifier-add"></i>
							</span>
						</a>
						<h6>
						  <strong>Recent Addition</strong>
						</h6>
						<p class="text-faded mb-0">Review Your Latest Games!</p>
					</div>
				 
					<div class="col-lg-3 col-md-3 mb-3 mb-lg-3">
						<a href="#" class="btn" data-toggle="modal" data-target="#recentEdition">
							<span class="service-icon rounded-circle mx-auto mb-3">
							  <i class="icon-magnifier-remove"></i>
							</span>
						</a>
						<h6>
						  <strong>Recent Edition</strong>
						</h6>
						<p class="text-faded mb-0">Review Your Updates</p>
					</div>
					<div class="col-lg-3 col-md-3 mb-3 mb-lg-3"></div>
				</div>
			</div>
		</section>
		
		<!-- Call to Action -->
		<section class="content-section bg-primary text-white" id="download">
			<div class="container text-center">
				<h2 class="mb-4">Download<em>list of your all </em>Content</h2>
				<a href="#" class="btn btn-xl btn-dark">Download Now!</a>
			</div>
		</section>

		<!-- Map -->
		<section id="contact" class="map">
			<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1825.9332988226518!2d90.37975796740339!3d23.75213610479881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3223af0be4603d44!2sShohag+Bus+Counter!5e0!3m2!1sen!2sbd!4v1538466727402"></iframe>
			<br/>
			<small>
				<a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
			</small>
		</section>

		<!-- Footer -->
		<footer class="footer text-center">
			<div class="container">
				<ul class="list-inline mb-5">
				  <li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" href="#">
					  <i class="icon-social-facebook"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" href="#">
					  <i class="icon-social-twitter"></i>
					</a>
				  </li>
				  <li class="list-inline-item">
					<a class="social-link rounded-circle text-white" href="#">
					  <i class="icon-social-github"></i>
					</a>
				  </li>
				</ul>
				<p class="text-muted small mb-0">Copyright &copy; Your Website 2018</p>
			</div>
		</footer>
		
		<!-- The AddGames Modal -->
		<div class="modal fade" id="addGames" role="dialog">
			<div class="modal-dialog">
			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Games Modal Header</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="/">
							<div class="form-group">
								<label class="control-label col-sm-2" for="email">Name:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Enter Game Name" name="gameName" required>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-sm-2" for="email">Category:</label>
								<div class="col-sm-10">
									<label class="radio-inline"><input type="radio" name="gameCategory" required>Action</label>
									<label class="radio-inline"><input type="radio" name="gameCategory">Racing</label>
									<label class="radio-inline"><input type="radio" name="gameCategory" checked>Sports</label>
									<label class="radio-inline"><input type="radio" name="gameCategory">Boards And Cards</label>
									<label class="radio-inline"><input type="radio" name="gameCategory">Puzzle</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="gameFile">Game File:</label>
								<div class="col-sm-10">
									<input type="file" class="form-control-file" name="gameFile" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="royalty">Royalty:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Enter Content Owner" name="gameName">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="gameFile">Game Previews:</label>
								<div class="col-sm-10">
									<input type="file" class="form-control-file" name="gamePreviews" multiple  required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="gameFile">Date:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="presentDate" value="<?php echo date("d-m-Y"); ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="description">Description:</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="5" placeholder="A Suitable Discription" name="gameDescription"  required></textarea>
								</div>
							</div>
							
							<div class="form-group">        
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- The viewGames Modal -->
		<div class="modal fade" id="viewGames" role="dialog">
			<div class="modal-dialog">
			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">View Games Modal Header</h4>
					</div>
					<div class="modal-body">
						<p>Some text in viewGames modal.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- The recentAddition Modal -->
		<div class="modal fade" id="recentAddition" role="dialog">
			<div class="modal-dialog">
			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Recent Addition Modal Header</h4>
					</div>
					<div class="modal-body">
						<p>Some text in recentAddition modal.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- The recentEdition Modal -->
		<div class="modal fade" id="recentEdition" role="dialog">
			<div class="modal-dialog">
			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Recent Edition Modal Header</h4>
					</div>
					<div class="modal-body">
						<p>Some text in recentEdition modal.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
		  <i class="fas fa-angle-up"></i>
		</a>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for this template -->
		<script src="js/stylish-portfolio.min.js"></script>
	</body>
</html>
