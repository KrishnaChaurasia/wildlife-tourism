		<nav class="navbar navbar-static-top navbar-inverse" role="navigation" >
			<div class="container nav-container">

				<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        			<span class="sr-only">Toggle navigation</span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	      			</button>
      				<a class="navbar-brand" href="index.php"><img id = "logo" src="images/Index/logo2.jpg" alt="Logo"></a>
      			</div>

			
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1" >
					<div class="navbar-header">
						<ul class="nav navbar-nav">
					        <li class="divider-vertical"></li>
		      				<li class="nav-list">
		      					<a href="index.php" style="color:#fff">Home</a>
		      				</li>
					        <li class="divider-vertical"></li>
							<li class="dropdown nav-list">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff">Wildlife<span class="caret"></span></a>
						        <ul class="dropdown-menu test">
						        	<li><a href="wildlife-list.php?type=<?php echo'National-Parks'?>">National Parks</a></li>
						            <li><a href="wildlife-list.php?type=<?php echo'Wildlife-Sanctuaries'?>">Wildlife Sanctuaries</a></li>
						            <li><a href="wildlife-list.php?type=<?php echo'Tiger-Reserves'?>">Tiger Reserves</a></li>
						            <li><a href="wildlife-list.php?type=<?php echo'Elephant-Reserves'?>">Elephant Reserves</a></li>
						        </ul>
					        </li>
					        <li class="divider-vertical"></li>
							<li class="nav-list"><a href="forests-list.php" style="color:#fff">Forest</a></li>
					        <li class="divider-vertical"></li>
							<li class="nav-list"><a href="tours-list.php" style="color:#fff">Tours</a></li>
					        <li class="divider-vertical"></li>
							<li class="dropdown nav-list">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff">Photo Gallery<span class="caret"></span></a>
						        <ul class="dropdown-menu test">
						        	<li class="dropdown-submenu nav-list">
						    			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff">Mammals</a>
						        		<ul class="dropdown-menu" style="background:#41c828">
						        		<?php	
						        			$dir    = 'images/Gallery/Mammals/';
											$files = scandir($dir);

											foreach ($files as $fileinfo) {
											    if ($fileinfo !== "." && $fileinfo !== "..") { 
											        echo "<li class=\"nav-list\"><a href=\"gallery.php?selected=".$dir.$fileinfo."\" style=\"color:#fff\">".$fileinfo."</a></li>";
												}
											}
										?>
						        		</ul>
					        		</li>
					        		<li class="dropdown-submenu nav-list">
						    			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff">Birds</a>
						        		<ul class="dropdown-menu" style="background:#41c828">
						        		<?php	
						        			$dir = 'images/Gallery/Birds/';
											$files = scandir($dir);

											foreach ($files as $fileinfo) {
											    if ($fileinfo !== "." && $fileinfo !== "..") {
											        echo "<li class=\"nav-list\"><a href=\"gallery.php?selected=".$dir.$fileinfo."\" style=\"color:#fff\">".$fileinfo."</a></li>";
												}
											}
										?>
						        		</ul>
					        		</li>
									<li class="nav-list"><a href="gallery.php?selected=images/Gallery/Forest/" style="color:#fff">Forest</a></li>
					        		<li class="dropdown-submenu nav-list">
						    			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff">Other</a>
						        		<ul class="dropdown-menu" style="background:#41c828">
						        		<?php	
						        			$dir    = 'images/Gallery/Other/';
											$files = scandir($dir);

											foreach ($files as $fileinfo) {
											    if ($fileinfo !== "." && $fileinfo !== "..") {
											        echo "<li class=\"nav-list\"><a href=\"gallery.php?selected=".$dir.$fileinfo."\" style=\"color:#fff\">".$fileinfo."</a></li>";
												}
											}
										?>
						        		</ul>
					        		</li>
					        	</ul>
					        </li>
					        <li class="divider-vertical"></li>
							<li class="dropdown nav-list">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:#fff">Other<span class="caret"></span></a>
						        <ul class="dropdown-menu test">
						        	<li><a href="interesting-facts.php">Interesting Facts</a></li>
						            <li><a href="login.php">Admin Login</a></li>
						        </ul>
					        </li>
					        <li class="divider-vertical"></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>