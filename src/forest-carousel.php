<?php
	$selected = $_GET['selected'];
?>
		<div id="homeCarousel" class="carousel" data-ride="carousel" data-interval="2500">
			<div class="carousel-inner custom-carousel">

				<?php 
					$path = "images/Forests/".$selected."/";
					echo '
						<div class="item active">
							<img src="'.$path.'image1.jpg" width="20%" height="100%" alt="India\'s Wildilfe" class="img-responsive thumbnail">
						</div>
					
						<div class="item">
							<img src="'.$path.'image2.jpg" alt="Jim Corbett" class="img-responsive thumbnail">
				    	</div>
				
						<div class="item">
							<img src="'.$path.'image3.jpg" alt="Wildlife" class="img-responsive thumbnail">
					    </div>

						<div class="item">
							<img src="'.$path.'image4.jpg" alt="Crocodiles" class="img-responsive thumbnail">
						</div>

						<div class="item">
							<img src="'.$path.'image5.jpg" alt="Elephants" class="img-responsive thumbnail">
						</div>
					</div>
					';
				?>

			</div>

			<a class="carousel-control left left-control" href="#homeCarousel" data-slide="prev" style="margin-left:3.5%;margin-top:4.5%;height:73%;width:5%">
				<span class="glyphicon glyphicon-chevron-left" ></span>
			</a>
			<a class="carousel-control right right-control" href="#homeCarousel" data-slide="next" style="margin-right:3.5%;margin-top:4.5%;height:73%;width:5%">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>

		</div>
