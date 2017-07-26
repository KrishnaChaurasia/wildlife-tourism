<?php
	session_start();
	$type = $_SESSION['type'];
	$selected = $_GET['selected'];
	$temptype = $type;
	$temptype = rtrim(str_replace("-", " ", $temptype),"s");
	$temptype = str_replace("Sanctuarie", "Sanctuary", $temptype);
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

	<body onload="initialize('<?php echo $selected." ".$temptype.""?>')">

		<?php include("header.php"); ?>
		
		<div class="container">
			<?php include("wildlife-carousel.php"); ?>

			<div class="row">
				
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
			    	
			    </div>
				
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
				
					<?php
						$server = "localhost";
						$user = "root";
						$password = "root";
						$dbname = "wildlife";

						// Create connection
						$conn = new mysqli($server, $user, $password, $dbname);
						// Check connection
						if (!$conn) {
			    			die("Connection failed: " . $conn->connect_error);
						}

						$query = "SELECT * FROM `".$type."` where `Name` ='". $selected."'";
						$result = $conn->query($query);

						if ($result) {
							$row = $result->fetch_assoc();
							$Name = $row['Name'];
							$AtAGlance = $row['AtAGlance'];
							$ClimateRainfall = $row['ClimateRainfall'];
							$Flora = $row['Flora'];
							$Fauna = $row['Fauna'];
							$ByAir = $row['ByAir'];
							$ByRail = $row['ByRail'];
							$ByRoad = $row['ByRoad'];
							$BestTimeToVisit = $row['BestTimeToVisit'];

							
							echo "<h3 class='text-justify'>Name : ".$Name." ".$temptype."</h3>
								<p class='text-justify'><b>Brief : </b><br>".$AtAGlance."</p>
								<p class='text-justify'><b>Floral Attractions : </b>".$Flora."</p>
								<p class='text-justify'><b>Faunal Attractions : </b>".$Fauna."</p>
								<p class='text-justify'><b>Climate &amp; Rainfall : </b>".$ClimateRainfall."</p>
								<p class='text-justify'><b>How to Reach : <br>By Air : </b>".$ByAir."</p>
								<p class='text-justify'><b>By Rail : </b>".$ByRail."</p>
								<p class='text-justify'><b>By Road : </b>".$ByRoad."</p>
								<p class='text-justify'><b>Best time to visit : </b>".$BestTimeToVisit."</p>";

								$date = date("d/m/y");
								$next = explode("/", $date);
								$next[0] = $next[0] + 1;
								$next = implode("/", $next);

								$hotels = "https://www.expedia.co.in/Hotel-Search?#&amp;destination=".urlencode($Name)." ".urlencode($temptype)."&amp;startDate=".$date."&amp;endDate=".$next."&amp;regionId=&amp;adults=2";
								echo "<p><b>Accomodations : </b><a href = '".$hotels."'>Click Here</a></p>
							";

						} else {
						    echo "No results found";
						}
					
						$conn->close();
					?>

					<div id="map_canvas" style="width:100%;height:80%;"></div>

				</div>

				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
			    	
			    </div>


			</div>
		
		</div>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/maps.js"></script>
	    <script type="text/javascript" src="js/maps-display.js"></script>

	</body>

</html>