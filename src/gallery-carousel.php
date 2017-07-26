<?php
	$selected = $_GET['selected'];
?>

<div class="container" width="75%">
	<div id="homeCarousel" class="carousel" data-ride="carousel" data-interval="2500">
		<div class="carousel-inner">
			<?php 
				$path = $selected."/";
				
				$i = 0;
				$files = scandir($path);

				foreach ($files as $fileinfo) {
					if ($fileinfo !== "." && $fileinfo !== "..") {
	       				if($i === 0) {
							echo '<div class="item active">
								<img src="'.$path.$fileinfo.'" alt="'.$selected.'" class="img-responsive thumbnail">
								</div>';
							$i = 1;
						} else {
							echo '<div class="item">
								<img src="'.$path.$fileinfo.'" alt="'.$selected.'" class="img-responsive thumbnail">
								</div>';
						}
					}
				}
			?>

		</div>
		
		<a class="carousel-control left" href="#homeCarousel" data-slide="prev" style="margin-left:0%;margin-top:0%;height:96%;width:5%">
			<span class="glyphicon glyphicon-chevron-left" ></span>
		</a>
		<a class="carousel-control right" href="#homeCarousel" data-slide="next" style="margin-right:0%;margin-top:0%;height:96%;width:5%">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>

	</div>
</div>