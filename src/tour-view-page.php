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

	<body onload="initialize('<?php echo $selected." ".$temptype.""?>')">

		<?php include("header.php"); ?>
		
		<div class="container">
			<?php include("tours-carousel.php"); ?>

			<div class="row">
				
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				
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

						$query = "SELECT * FROM `tours` where `Name` = '". $selected."'";
						$result = $conn->query($query);

						if ($result) {
							$row = $result->fetch_assoc();
							$Name = $row['Name'];
							$Destinations = $row['Destinations'];
							$Brief = $row['Brief'];
							$Details = $row['Details'];

							
							$pattern = "/(Day)+[- \r\t\n]*(\d+)[ \r\t\n:-]*/";
							$input_str = $Details;
							if (preg_match_all($pattern, $input_str, $matches_out)) {
							    
							    for($i = 0; $i < count($matches_out[0]); $i = $i + 1){
							    	$replaced = "<br><br><b>".$matches_out[0][$i]."</b><br>";
								    $input_str = str_replace($matches_out[0][$i], $replaced, $input_str);
								}
							}
							
							echo "<h3 class=\"text-justify\">Name : ".$Name."</h3>
								<p class=\"text-justify\"><b>Destinations : </b><br>".$Destinations."</p>
								<p class=\"text-justify\"><b>Brief : </b>".$Brief."</p>
								<p class=\"text-justify\"><b>Details : </b>".$input_str."</p>
							";

						} else {
						    echo "No results found";
						}
					
						$conn->close();
					?>

				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<br><br><br><br>
			    	<div class="well">
			    		<?php 
			    			$message = "";
			    			if(!empty($_GET['name']) && !empty($_GET['country']) && !empty($_GET['email']) ) {
			    				$message = "You will receive a mail from us soon!<br>";
			    			} else if(isset($_GET['submit'])){
			    				$message = "All fields marked in (*) are necessary!<br>";
			    			}

			    		echo '<b>'.$message.'</b><h3>Request a Quote</h3>
			    			
			    						    			
						<p class="text-justify">Please fill the form below to get this tour details at your email</p>
			    		<form action="#" method="GET">
			    			<div class="form-group">
			    				<label>Name*</label>
			    				<input type="text" class="form-control" name="name"></input>
			    			</div>
			    			<div>
			    				<label>Country*</label>
			    				<input type="text" class="form-control" name="country"></input>
			    			</div><br>
			    			<div>
			    				<label>Email*</label>
			    				<input type="email" class="form-control" name="email"></input>
			    			</div><br>
			    			<div>
			    				<label>Message</label>
			    				<textarea class="form-control" name="message"></textarea>
			    			</div><br>
			    			<input type="hidden" name="selected" value="'.$selected.'" />
			    			<input type="submit" class="btn btn-primary btn-block" name="submit" value="Request a Quote"></input>
			    		</form>';
			    		?>
			    	</div>
	
			    </div>


			</div>
		
		</div>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/maps.js"></script>
	    <script type="text/javascript" src="js/maps-display.js"></script>

	</body>

</html>