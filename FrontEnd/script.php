
		<script src="./js/slick.min.js"></script>
		<script src="./js/materialize.min.js"></script>
		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "180px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}

			$(document).mouseup(function(e){
				var container = $("#mySidenav");
				// if the target of the click isn't the container nor a descendant of the container
				if (container.attr('width', '200px') && e.target.id != container.attr('mySidenav')) {	
					$("#mySidenav").css('width', '0');
				}
				else{
					// alert('after');
				}
			});
				
			$(document).ready(function(){
				$('#LatestGamesSlider').lightSlider({
					adaptiveHeight:true,
					item:1.5,
					slideMargin:0,
					loop:true
				});
				
				$('#MoreCategorySlider').lightSlider({
					adaptiveHeight:true,
					item:1.3,
					slideMargin:0,
					loop:true
				});
				
				$('.SliderWithThree').slick({
					infinite: true,
					slidesToShow: 3,
					slidesToScroll: 1
				});
				
				$('.SliderWithTwo').lightSlider({
					adaptiveHeight:true,
					item:2,
					// slideMargin:-5,   //has been set at lightSlider.js
					loop:true
				});
				
				$('.carousel').carousel();
			});
		</script>