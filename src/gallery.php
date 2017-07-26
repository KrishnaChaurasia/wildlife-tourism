<?php
	$selected = $_GET['selected'];
?>

<!doctype html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    	
    	<title>Indian Forests &amp; Wildlife</title>
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>

		<?php include("header.php"); ?>
		<?php include("gallery-carousel.php"); ?>

		<div class="container">
	
			<?php
				
				$i = 0;
				$dir    = 'images/Gallery/Mammals/';
				$files = scandir($dir);
				foreach ($files as $fileinfo) {
					if ($fileinfo !== "." && $fileinfo !== "..") {
					
					    $src = $dir.$fileinfo;
						$src = str_replace(" ", '%20', $src);
						$url = "gallery.php?selected=".urlencode($src);
						
						if($i%2 === 0){
							echo "<div class='row'>";
						}
						
						echo "
							<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
						    	<div class='hovereffect'>
							    	<img class='img-responsive thumbnail' src='".$src."/1.jpg' alt='Logo'>
							   		<div class='overlay'>
							   			<br><br><br><br><p>".$fileinfo."</p><br>
										<a href=".$url.">Enlarge</a>
						    		</div>
								</div>
							</div>
						";

						if($i%2 === 1){
							echo "</div";
						}
						$i = $i + 1;
					}
				}
				
				$i = 0;
				$dir    = 'images/Gallery/Birds/';
				$files = scandir($dir);
				foreach ($files as $fileinfo) {
					if ($fileinfo !== "." && $fileinfo !== "..") {
					
					    $src = $dir.$fileinfo;
						$src = str_replace(" ", '%20', $src);
						$url = "gallery.php?selected=".urlencode($src);
						
						if($i%2 === 0){
							echo "<div class='row'>";
						}
								
						echo "
							<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
						    	<div class='hovereffect'>
							    	<img class='img-responsive thumbnail' src=".$src."/1.jpg alt='Logo'>
							   		<div class='overlay'>
							   			<br><br><br><br><p>".$fileinfo."</p><br>
										<a href=".$url.">Enlarge</a>
						    		</div>
								</div>
							</div>
						";

						if($i%2 === 1){
							echo "</div";
						}
						$i = $i + 1;
					}
				}
				
				$i = 0;
				$dir    = 'images/Gallery/Other/';
				$files = scandir($dir);
				foreach ($files as $fileinfo) {
					if ($fileinfo !== "." && $fileinfo !== "..") {
					
					    $src = $dir.$fileinfo;
						$src = str_replace(" ", '%20', $src);
						$url = "gallery.php?selected=".urlencode($src);
						
						if($i%2 === 0){
							echo "<div class='row'>";
						}
								
						echo "
							<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
						    	<div class='hovereffect'>
							    	<img class='img-responsive thumbnail' src=".$src."/1.jpg alt='Logo'>
							   		<div class='overlay'>
							   			<br><br><br><br><p>".$fileinfo."</p><br>
										<a href=".$url.">Enlarge</a>
						    		</div>
								</div>
							</div>
						";

						if($i%2 === 1){
							echo "</div";
						}
						$i = $i + 1;
					}
				}

				$dir = 'images/Gallery/Forest/';
				echo "
					<div class = \"row\">
					<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
					   	<div class='hovereffect'>
					    	<img class='img-responsive thumbnail' src=".$dir."1.jpg alt='Logo'>
							<div class='overlay'>
					   			<br><br><br><br><p>Forest</p><br>
								<a href=".$url.">Enlarge</a>
							</div>
						</div>
					</div>
					</div>
				";

			
			?>

		</div>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>