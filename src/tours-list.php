<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Indian Forests &amp; Wildlife</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>

		<?php include("header.php"); ?>
		
		<div class="container">
	
			<div class="row">
	
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				</div>

				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
				
					<h2>Tours in India</h2>
					<p class='text-justify'>
						India is famed for its rich and abundant wilderness, and wildlife sighting is a must when on a trip to this beautiful land. One can witness hundreds of diverse genus of creatures encompassing tiger, leopard, elephant, bear, wild boar, toddy cat, jackal, langur, ratel and many more in their natural habitat. Not only this, wildlife tours bring you close to different sorts of vegetation which make your holidays in India more appealing and adventurous. Our wildlife packages combine magnificent wildlife and picturesque landscape so that you can indulge the maximum time of tour in the famous national parks being accompanied by the experienced guides.
					</p>

					<h3>List of some incredible wildlife tours of India</h3>
		
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

						$query = "SELECT * FROM `tours`";
						$result = $conn->query($query);

						if ($result) {
							$i = 0;
							// output data of each row
						    while($row = $result->fetch_assoc()) {

						    	if($i%2 === 0){
									echo "<div class='row'>";
								}
								$name = $row['Name'];
								$src = "images/tours/".$name."/image1.jpg";
								$src = str_replace(" ", '%20', $src);
								$url = "tour-view-page.php?selected=".urlencode($name);
								$text = substr($row['Brief'], 0, 100);
								$alt = str_replace(" ", '-', $name);
								echo "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
						    			<div class='hovereffect'>
							       			<img class='img-responsive thumbnail' src=".$src." alt=".$alt.">
							       			<div class='overlay'>
							    				<p><b>".$name."</b></p>
							       				<p>".$text."</p>
							       				<a href=".$url.">See Details</a>
						        			</div>
										</div>
									</div>
								";
								if($i%2 === 1){
									echo "</div";
								}
								$i = $i + 1;
						    }
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
		
	</body>

</html>