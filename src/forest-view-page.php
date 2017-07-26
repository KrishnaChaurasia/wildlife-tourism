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

	<body onload="initialize('<?php echo $selected." Forest, India"?>')">

		<?php include("header.php"); ?>
		
		<div class="container">
			<?php include("forest-carousel.php"); ?>

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

						$query = "SELECT * FROM `forests` where `Name` ='". $selected."'";
						$result = $conn->query($query);

						if ($result) {
							$row = $result->fetch_assoc();
							$Name = $row['Name'];
							$Location = $row['Location'];
							$Area = $row['Area'];
							$AtAGlance = $row['AtAGlance'];
							$HowToReach = $row['HowToReach'];
							
							echo "<h3 class='text-justify'>Name : ".$Name."</h3>
								<p class='text-justify'><b>Location : </b>".$Location."</p>
								<p class='text-justify'><b>Area : </b>".$Area."</p>
								<p class='text-justify'><b>Brief : </b><br>".$AtAGlance."</p>
								<p class='text-justify'><b>How to Reach :</b><br>".$HowToReach."</p>
							";

						} else {
						    echo "No results found";
						}
					
						$conn->close();
					?>

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