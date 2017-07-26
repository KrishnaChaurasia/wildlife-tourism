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
				
					<h2>Forests in India</h2>
					<p class='text-justify'>
						India is quite rich in forest wealth. About one-fifth of its land is under forests. - Our forests are mostly in the hilly area or over the plateau. The plains and the large areas in valleys are under cultivation. The area under the forests in India is not sufficient. About one-third area of the land surface should be under the forests to keep up the ecological balance. We should avoid deforestation and grow more trees to keep up the balance.
					</p>

					<p class='text-justify'>
						There are many incredible forests places to visit in India which house many rare species of animals.
					</p>

					<h3 class='text-justify'>List of Incredible Forests of India</h3>
		
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

						$query = "SELECT * FROM `forests`";
						$result = $conn->query($query);

						if ($result) {
							$i = 0;
							// output data of each row
						    while($row = $result->fetch_assoc()) {

						    	if($i%2 === 0){
									echo "<div class='row'>";
								}
								$name = $row['Name'];
								$src = "images/Forests/".$name."/image1.jpg";
								$src = str_replace(" ", '%20', $src);
								$url = "forest-view-page.php?selected=".urlencode($name);
								$text = substr($row['AtAGlance'], 0, 100);
								
								echo "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
						    			<div class='hovereffect'>
							       			<img class='img-responsive thumbnail' src=".$src." alt='Logo'>
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