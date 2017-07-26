<?php 

	session_start();

	if(isset($_GET['type'])) {
		$_SESSION['type'] = $_GET['type'];
		$type = $_SESSION['type'];
	}
	else{
		$type = $_SESSION['type'];
	}
?>

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
	
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<br><br><br><br>
			    	<div class="well">
			    		<h3>Filter by</h3>
			    		<form action="wildlife-list.php" method="GET">
			    			<div class="form-group">
			    				<label>Flora</label>
			    				<input type="text" class="form-control" name="flora"></input>
			    			</div><br>
			    			<div>
			    				<label>Fauna</label>
			    				<input type="text" class="form-control" name="fauna"></input>
			    			</div><br>
			    			<div>
			    				<label>Best during the month of</label>
			    				<input type="text" class="form-control" name="besttimetovisit"></input>
			    			</div><br>
			    			<input type="submit" class="btn btn-primary btn-block" name="submit" value="Search"></input>
			    		</form>
			    	</div>
				</div>

				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<?php 
						if($type === 'National-Parks'){
							echo '<h2>National Parks in India</h2>
								<p class="text-justify">
									India has more than 400 national parks and wildlife sanctuaries containing different species of flora and fauna. Few famous national parks of them are Great Himalayan, Gir, Kanha and Kaziranga National Park. Apart from the above there are many more superb wild animals parks,which also offers a wide variety of wild animals, reptiles and birds in India. These numerous wildlife parks are located at different states and considered as the heritage of wildlife in India. Few of these national parks are still unexplored and isolated with pure wild populations and has beautiful scenery inside. These Indian wild park are home to some of the giant wild animals in India and big flying predators. Wildlife safari into these big National Parks in India will be the most thrill and best experience.
								</p>
								<h3>List of Incredible National Parks of India</h3>
							';
						} else if($type === 'Wildlife-Sanctuaries'){
							echo '<h2>Wildlife Sanctuaries in India</h2>
								<p class="text-justify">
									India is home of more than 300 big and small national parks, tiger reserves and sanctuaries. Different species of animals and plants can be found within the sanctuaries. Various attempts and initiatives are taken to protect and conserve these natural possessions.

										For a wildly exciting and exhilarating tour of India, do not miss these wonderful wildlife sanctuaries. Browse through Famous In India and known more about the sanctuaries in India.
								</p>
								<h3>List of Incredible Wildlife Sanctuaries of India</h3>
							';
						} else if($type === 'Tiger-Reserves'){
							echo '<h2>Tiger Reserves in India</h2>
								<p>
									There are 39 Tiger reserves in India which are governed by Project Tiger(1973). The largest Tiger Reserve in India, is the Nagarjunsagar-Srisailam Tiger Reserve of Andhra Pradesh. These 40,969 km2 (15,818 sq mi) of reserves are operated “to ensure maintenance of a viable population of the conservation dependent Bengal tigers in India for scientific, economic, aesthetic, cultural and ecological values and to preserve for all time areas of biological importance as a national heritage for the benefit, education and enjoyment of the people”. The landmark report, Status of the Tigers, Co-predators, and Prey in India, published by the National Tiger Conservation Authority, estimates only 1411 adult tigers in existence in the various Tiger Sanctuaries in India (plus uncensused tigers in the Sundarbans).
								</p>
								<h3>List of Incredible Tiger Reserves of India</h3>
							';
						} else {
							echo '
								<h2>Elephant Reserves in India</h2>
								<p class="text-justify">
									India is home to between 50 and 60% of all of Asia’s wild elephants and about 20% of the domesticated elephants. As such, the country is of paramount importance for the survival of the species. The elephant plays a central role in Indian life and has done for many centuries. Elephants are closely associated with religious and cultural heritage, playing an important role in the country’s history. They remain revered today.
										An India without elephants is simply unimaginable.
								</p>
								<h3>List of Incredible Elephant Reserves of India</h3>
							';
						}

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

						$flora = "";
						$fauna = "";
						$besttimetovisit = "";
						if(isset($_GET['submit'])) {
							if(isset($_GET['flora']))
								$flora = $_GET['flora'];
							if(isset($_GET['fauna']))
								$fauna = $_GET['fauna'];
							if(isset($_GET['besttimetovisit']))
								$besttimetovisit = $_GET['besttimetovisit'];
						}

						$query = "SELECT * FROM `".$type."` where `flora` like '%".$flora."%' and `fauna` like '%".$fauna. "%' and `BestTimeToVisit` like '%".$besttimetovisit."%'";
						$result = $conn->query($query);

						if ($result) {
							$i = 0;
							// output data of each row
						    while($row = $result->fetch_assoc()) {

						    	if($i%2 === 0){
									echo "<div class='row'>";
								}
								$name = $row['Name'];
								$src = "images/".$type."/".$name."/image1.jpg";
								$src = str_replace(" ", '%20', $src);
								$url = "wildlife-view-page.php?selected=".urlencode($name);
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

			</div>
		
		</div>
			
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</body>

</html>