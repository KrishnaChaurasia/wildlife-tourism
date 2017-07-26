<?php
    $selected = "";

    //Function to add the selected item to the respective database
    function add(){
        if(isset($_GET['table'])){
                        
            $table = $_GET['table'];
            if($table !== 'forests' && $table !== 'tours'){
                if( !empty($_POST['name']) && !empty($_POST['brief']) && !empty($_POST['climate']) && !empty($_POST['flora']) && !empty($_POST['fauna']) && !empty($_POST['byair']) && !empty($_POST['byrail']) && !empty($_POST['byroad']) && !empty($_POST['besttimetovisit']) && !empty($_FILES['image1']) && !empty($_FILES['image2']) && !empty($_FILES['image3']) && !empty($_FILES['image4']) && !empty($_FILES['image5']) ){
                    
                    $name = $_POST['name'];
                    $brief = $_POST['brief'];
                    $climate = $_POST['climate'];
                    $flora = $_POST['flora'];
                    $fauna = $_POST['fauna'];
                    $byair = $_POST['byair'];
                    $byrail = $_POST['byrail'];
                    $byroad = $_POST['byroad'];
                    $besttimetovisit = $_POST['besttimetovisit'];
                           
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
                    //IMPORTANT
                    //Sanity check to see of data already exists for all add functions
                    //IMPORTANT
                    $query = "SELECT * FROM `".$table."`";
                    $result = $conn->query($query);
                    $flag = 0;
                    if ($result) {
                        while($row = $result->fetch_assoc()){
                            if($row['Name'] === $name){
                                $flag = 1;
                                echo "<br><b>".$name." already exists!</b>";
                                break;
                            }
                        }
                    }
                    if(!$flag){
                        $query = "INSERT INTO `".$table."` VALUES('".$name."', '".$brief."', '".$climate."', '".$flora."', '".$fauna."', '".$byair."', '".$byrail."', '".$byroad."', '".$besttimetovisit."')";
                        $result = $conn->query($query);
                            
                        if ($result) {

                            $dir = explode("-", $table);
                            for($i = 0; $i < count($dir) ;$i++){
                                $dir[$i] = ucfirst($dir[$i]);
                            }
                            $folder = implode("-", $dir);
                            $target_dir = "images/".$folder."/".$name."/";
                            mkdir($target_dir, 0700);
                            
                            $target_file = $target_dir.basename($_FILES["image1"]["name"]);
                            $target = $target_dir."image1.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image1"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image1 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image1 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image1"]["size"] > 500000) {
                                echo "Sorry, Image1 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Image1, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, your file Image1 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image1.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image2"]["name"]);
                            $target = $target_dir."image2.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image2"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image2 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image2 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image2"]["size"] > 500000) {
                                echo "Sorry, Image2 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image2, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image2 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image2.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image3"]["name"]);
                            $target = $target_dir."image3.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image3"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image3 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image3 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image3"]["size"] > 500000) {
                                echo "Sorry, Image3 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image3, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image3 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image3"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image3.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image4"]["name"]);
                            $target = $target_dir."image4.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image4"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image4 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image4 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image4"]["size"] > 500000) {
                                echo "Sorry, Image4 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image4, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image4 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image4"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image4.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image5"]["name"]);
                            $target = $target_dir."image5.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image5"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image5 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image5 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image5"]["size"] > 500000) {
                                echo "Sorry, Image5 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image5, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image5 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image5"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image5.<br>";
                                }
                            }
                            echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Value inserted successfully</b>';
                        } else {
                           echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Problem inserting data!</b><br>";
                        }
                    }
                    mysqli_close($conn);
                } else {
                    if(isset($_POST['add'])){
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>All fields are required!</b><br>";
                    }
                    echo '
                        <div class="container" style="margin-top:1%">
                            <b></b>
                            <form action="login.php?type=add&table='.$table.'" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <p>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
                                        <input type="text" name="name" value="" />
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brief</label>
                                        <textarea name="brief" value=""></textarea><br>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Climate</label>
                                        <textarea name="climate" value=""></textarea>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Flora</label>
                                        <textarea name="flora" value=""></textarea><br>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fauna</label>
                                        <textarea name="fauna" value=""></textarea>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; By Air</label>
                                        <textarea name="byair" value=""></textarea><br>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; By Rail</label>
                                        <textarea name="byrail" value=""></textarea>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp; By Road</label>
                                        <textarea name="byroad" value=""></textarea><br>
                                        <label">&nbsp;&nbsp;&nbsp;&nbsp; Best time to Visit</label>
                                        <textarea name="besttimetovisit" value=""></textarea><br>
                                    </p>
                                    <p style = "margin-left:14%">
                                        <label"><br>&nbsp;Select Images</label>
                                        <input type="file" name="image1" ><br>
                                        <input type="file" name="image2" ><br>
                                        <input type="file" name="image3" ><br>
                                        <input type="file" name="image4" ><br>
                                        <input type="file" name="image5" ><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="add" value="Add" />
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    ';
                }
            } else if($table === 'forests'){
                if( !empty($_POST['name']) && !empty($_POST['location']) && !empty($_POST['area']) && !empty($_POST['brief']) && !empty($_POST['howtoreach']) && !empty($_FILES['image1']) && !empty($_FILES['image2']) && !empty($_FILES['image3']) && !empty($_FILES['image4']) && !empty($_FILES['image5']) ) {
                    
                    $name = $_POST['name'];
                    $location = $_POST['location'];
                    $area = $_POST['area'];
                    $brief = $_POST['brief'];
                    $howtoreach = $_POST['howtoreach'];

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
                    
                    //IMPORTANT
                    //Sanity check to see of data already exists for all add functions
                    //IMPORTANT
                    $query = "SELECT * FROM `".$table."`";
                    $result = $conn->query($query);
                    $flag = 0;
                    if ($result) {
                        while($row = $result->fetch_assoc()){
                            if($row['Name'] === $name){
                                $flag = 1;
                                echo "<br><b>".$name." already exists!</b>";
                                break;
                            }
                        }
                    }
                    if(!$flag){
                        $query = "INSERT INTO `".$table."` VALUES('".$name."', '".$location."', '".$area."', '".$brief."', '".$howtoreach."')";
                        $result = $conn->query($query);
                        if ($result) {
                            $dir = explode("-", $table);
                            for($i = 0; $i < count($dir) ;$i++){
                                $dir[$i] = ucfirst($dir[$i]);
                            }
                            $folder = implode("-", $dir);
                            $target_dir = "images/".$folder."/".$name."/";
                            mkdir($target_dir, 0700);
                            $target_file = $target_dir.basename($_FILES["image1"]["name"]);
                            $target = $target_dir."image1.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image1"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image1 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image1 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image1"]["size"] > 500000) {
                                echo "Sorry, Image1 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Image1, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, your file Image1 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image1.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image2"]["name"]);
                            $target = $target_dir."image2.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image2"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image2 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image2 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image2"]["size"] > 500000) {
                                echo "Sorry, Image2 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image2, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image2 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image2.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image3"]["name"]);
                            $target = $target_dir."image3.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image3"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image3 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image3 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image3"]["size"] > 500000) {
                                echo "Sorry, Image3 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image3, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image3 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image3"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image3.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image4"]["name"]);
                            $target = $target_dir."image4.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image4"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image4 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image4 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image4"]["size"] > 500000) {
                                echo "Sorry, Image4 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image4, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image4 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image4"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image4.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image5"]["name"]);
                            $target = $target_dir."image5.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image5"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image5 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image5 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image5"]["size"] > 500000) {
                                echo "Sorry, Image5 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image5, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image5 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image5"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image5.<br>";
                                }
                            }
                            echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Value inserted successfully</b><br>';
                        } else {
                            echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Error inserting data!</b><br>";
                        }
                    }
                    mysqli_close($conn);
                } else {
                    if(isset($_POST['add'])){
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>All fields are required!</b>";
                    }
                    echo '
                        <div class="container" style="margin-top:1%">
                            <b></b>
                            <form action="login.php?type=add&table=forests" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <p>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
                                        <input type="text" name="name" value="" />
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Location</label>
                                        <textarea name="location" value=""></textarea><br>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Area</label>
                                        <textarea name="area" value=""></textarea>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brief</label>
                                        <textarea name="brief" value=""></textarea><br>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; How to reach</label>
                                        <textarea name="howtoreach" value=""></textarea>
                                    </p>
                                    <p style = "margin-left:18%">
                                        <label"><br>&nbsp;Select Images</label>
                                        <input type="file" name="image1" ><br>
                                        <input type="file" name="image2" ><br>
                                        <input type="file" name="image3" ><br>
                                        <input type="file" name="image4" ><br>
                                        <input type="file" name="image5" ><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="add" value="Add" />
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    ';
                }
            } else if($table === 'tours'){
                if( !empty($_POST['name']) && !empty($_POST['destinations']) && !empty($_POST['brief']) && !empty($_POST['details']) && !empty($_FILES['image1']) && !empty($_FILES['image2']) && !empty($_FILES['image3']) && !empty($_FILES['image4']) && !empty($_FILES['image5']) ) {
                    
                    $name = $_POST['name'];
                    $destinations = $_POST['destinations'];
                    $brief = $_POST['brief'];
                    $details = $_POST['details'];

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
                    
                    //IMPORTANT
                    //Sanity check to see of data already exists for all add functions
                    //IMPORTANT
                    $query = "SELECT * FROM `".$table."`";
                    $result = $conn->query($query);
                    $flag = 0;
                    if ($result) {
                        while($row = $result->fetch_assoc()){
                            if($row['Name'] === $name){
                                $flag = 1;
                                echo "<br><b>".$name." already exists!</b>";
                                break;
                            }
                        }
                    }
                    if(!$flag){
                        $query = "INSERT INTO `".$table."` VALUES('".$name."', '".$destinations."', '".$brief."', '".$details."')";
                        $result = $conn->query($query);
                        if ($result) {
                            $dir = explode("-", $table);
                            for($i = 0; $i < count($dir) ;$i++){
                                $dir[$i] = ucfirst($dir[$i]);
                            }
                            $folder = implode("-", $dir);
                            $target_dir = "images/".$folder."/".$name."/";
                            mkdir($target_dir, 0777);
                            $target_file = $target_dir.basename($_FILES["image1"]["name"]);
                            $target = $target_dir."image1.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image1"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image1 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image1 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image1"]["size"] > 500000) {
                                echo "Sorry, Image1 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Image1, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, your file Image1 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image1.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image2"]["name"]);
                            $target = $target_dir."image2.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image2"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image2 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image2 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image2"]["size"] > 500000) {
                                echo "Sorry, Image2 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image2, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image2 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image2.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image3"]["name"]);
                            $target = $target_dir."image3.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image3"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image3 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image3 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image3"]["size"] > 500000) {
                                echo "Sorry, Image3 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image3, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image3 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image3"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image3.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image4"]["name"]);
                            $target = $target_dir."image4.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image4"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image4 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image4 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image4"]["size"] > 500000) {
                                echo "Sorry, Image4 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image4, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image4 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image4"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image4.<br>";
                                }
                            }
                            $target_file = $target_dir.basename($_FILES["image5"]["name"]);
                            $target = $target_dir."image5.jpg";
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["image5"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                echo "Image5 is not an image.<br>";
                                $uploadOk = 0;
                            }
                            if (file_exists($target_file)) {
                                echo "Sorry, Image5 already exists.<br>";
                                $uploadOk = 0;
                            }
                            if ($_FILES["image5"]["size"] > 500000) {
                                echo "Sorry, Image5 is too large.<br>";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Sorry Image5, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                                $uploadOk = 0;
                            }
                            if ($uploadOk == 0) {
                                echo "Sorry, Image5 was not uploaded.<br>";
                            } else {
                                if (move_uploaded_file($_FILES["image5"]["tmp_name"], $target)) {
                                } else {
                                    echo "Sorry, there was an error uploading Image5.<br>";
                                }
                            }
                            echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Value inserted successfully</b><br>';
                        } else {
                            echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Error inserting data!</b><br>";
                        }
                    }
                    mysqli_close($conn);
                } else {
                    if(isset($_POST['add'])){
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>All fields are required!</b>";
                    }
                    echo '
                        <div class="container" style="margin-top:1%">
                            <b></b>
                            <form action="login.php?type=add&table=tours" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <p>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
                                        <input type="text" name="name" value="" />
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destinations</label>
                                        <textarea name="destinations" value=""></textarea><br>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brief</label>
                                        <textarea name="brief" value=""></textarea>
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Details</label>
                                        <textarea name="details" value=""></textarea><br>
                                    </p>
                                    <p style = "margin-left:18%">
                                        <label"><br>&nbsp;Select Images</label>
                                        <input type="file" name="image1" ><br>
                                        <input type="file" name="image2" ><br>
                                        <input type="file" name="image3" ><br>
                                        <input type="file" name="image4" ><br>
                                        <input type="file" name="image5" ><br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="add" value="Add" />
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    ';
                }
            }
        }
    }
    
    //Function to view the selected item from the respective database
    function view(){
        if(isset($_GET['table'])){
            $table = $_GET['table'];
                        
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
                      
            $query = "SELECT * FROM `".$table."`";
            $result = $conn->query($query);
            if ($result) {
                echo '<div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';
                $i = 1;     
                while($row = $result->fetch_assoc()){
                    $Name = $row['Name'];
                    echo "<tr>
                            <td>".$i."</td>
                            <td>".$Name."</td>
                        </tr>
                    ";
                    $i = $i + 1;
                }
                echo "</tbody></table></div>";
            } else {
                echo "No results found";
            }
            mysqli_close($conn);
        }
    }

    //Function to delete the selected item from the respective database
    function drop(){
        if( isset($_GET['table']) ){
        
            $table = $_GET['table'];
            
            if( empty($_POST['checkboxes']) && empty($_GET['id']) ){
            
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
                
                $query = "SELECT * FROM `".$table."`";
                $result = $conn->query($query);
                if ($result) {

                    echo '<form action="login.php?type=delete&table='.$table.'&id=2" method="post"><div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';
                    $i = 1;     
                    while($row = $result->fetch_assoc()){
                        $Name = $row['Name'];
                        echo "<tr>
                                <td><label>
                                    <input type=\"checkbox\" name=\"checkboxes[]\" value=".urlencode($Name).">&nbsp;&nbsp;".$Name."
                                    </label>
                                </td>
                            </tr>
                        ";
                        $i = $i + 1;
                    }
                    echo "</tbody></table>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type=\"submit\" name=\"delete\" value=\"Delete\" />
                            </p>
                            </div></form>
                    ";
                } else {
                    echo "No results found";
                }
                mysqli_close($conn);
            } else {

                if(empty($_POST['checkboxes'])) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>You didn't select any option!</b>";
                } else {
                    
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
                    
                    $names = $_POST['checkboxes'];
                    $N = count($names);

                    for($i=0; $i < $N; $i++){
                        $name = urldecode($names[$i]);
                        $query = "DELETE FROM `".$table."` WHERE `Name`='".$name."'";
                        $result = $conn->query($query);
                        if ($result) {
                            continue;
                        } else {
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Error deleting from the database!</b>";
                            break;
                            die();
                        }
                    }
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Deletion successful!</b>"
                    ;
                    mysqli_close($conn);
                }
            }            
        }
    }

    //Function to update the selected item into the respective database
    function update(){
        if( isset($_GET['table']) ){
                        
            $table = $_GET['table'];
                        
            if( empty($_POST['optradio']) && empty($_GET['id']) ){
                            
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
                          
                $query = "SELECT * FROM `".$table."`";
                $result = $conn->query($query);
                if ($result) {

                    echo '<form action="login.php?type=update&table='.$table.'" method="post"><div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                    ';
                    $i = 1;
                    while($row = $result->fetch_assoc()){
                        $Name = $row['Name'];
                        echo "<tr>
                                <td><label><input type=\"radio\" name=\"optradio\" value=".urlencode($Name).">".$Name."</label>
                                </td>
                            </tr>
                        ";
                        $i = $i + 1;
                    }
                    echo "</tbody></table>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type=\"submit\" name=\"update\" value=\"Pick\" />
                            </p>
                            </div></form>
                    ";
                } else {
                    echo "No results found";
                }
                mysqli_close($conn);
            } else {
                
                if( isset($_POST['optradio']) ){
                    $GLOBALS['selected'] = $_POST['optradio'];
                }
                    
                if($table !== 'forests' && $table !== 'tours'){
                    if( !empty($_POST['brief']) || !empty($_POST['climate']) || !empty($_POST['flora']) || !empty($_POST['fauna']) || !empty($_POST['byair']) || !empty($_POST['byrail']) || !empty($_POST['byroad']) || !empty($_POST['besttimetovisit']) ) {
                                  
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
                        $query = "SELECT * FROM `".$table."` WHERE `Name`='".urldecode($_POST['name'])."'";
                        $result = $conn->query($query);
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $name = $row['Name'];
                            $brief = $row['AtAGlance'];
                            $climate = $row['ClimateRainfall'];
                            $flora = $row['Flora'];
                            $fauna = $row['Fauna'];
                            $byair = $row['ByAir'];
                            $byrail = $row['ByRail'];
                            $byroad = $row['ByRoad'];
                            $besttimetovisit = $row['BestTimeToVisit'];
                            
                            if(!empty($_POST['brief'])){
                                $brief = $_POST['brief'];
                            }
                            if(!empty($_POST['climate'])){
                                $climate = $_POST['climate'];
                            }
                            if(!empty($_POST['flora'])){
                                $flora = $_POST['flora'];
                            }
                            if(!empty($_POST['fauna'])){
                                $fauna = $_POST['fauna'];
                            }
                            if(!empty($_POST['byair'])){
                                $byair = $_POST['byair'];
                            }
                            if(!empty($_POST['byrail'])){
                                $byrail = $_POST['byrail'];
                            }
                            if(!empty($_POST['byroad'])){
                                $byroad = $_POST['byroad'];
                            }
                            if(!empty($_POST['besttimetovisit'])){
                                $besttimetovisit = $_POST['besttimetovisit'];
                            }
                        
                            $query = "UPDATE `".$table."` set `Name` = '".$name."', `AtAGlance` = '".$brief."', `ClimateRainfall` = '".$climate."', `Flora` = '".$flora."', `Fauna` = '".$fauna."', `ByAir` = '".$byair."', `ByRail` = '".$byrail."', `ByRoad` = '".$byroad."', `BestTimeToVisit` = '".$besttimetovisit."' where `Name` = '".$name."'";
                            $result = $conn->query($query);
                            if($result){
                                echo "<br><b>Update successful!</b>";
                            } else {
                                echo "Error updating in database!";                            
                            }
                        }        
                        mysqli_close($conn);
                    } else {
                        if(isset($_POST['update']) && isset($_GET['id'])){
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Atleast one field is required!</b>";
                        }
                        echo '
                            <div class="container" style="margin-top:1%">
                                <b></b>
                                <form action="login.php?type=update&table='.$table.'&id=1" method="post">
                                    <fieldset>
                                        <p>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
                                            <input type="text" name="name" readonly value="'.urldecode($GLOBALS['selected']).'" />
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brief</label>
                                            <textarea name="brief" value=""></textarea><br>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Climate</label>
                                            <textarea name="climate" value=""></textarea>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Flora</label>
                                            <textarea name="flora" value=""></textarea><br>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fauna</label>
                                            <textarea name="fauna" value=""></textarea>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; By Air</label>
                                            <textarea name="byair" value=""></textarea><br>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; By Rail</label>
                                            <textarea name="byrail" value=""></textarea>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp; By Road</label>
                                            <textarea name="byroad" value=""></textarea><br>
                                            <label">&nbsp;&nbsp;&nbsp;&nbsp; Best time to Visit</label>
                                            <textarea name="besttimetovisit" value=""></textarea><br>
                                        </p>
                                        <p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="submit" name="update" value="Update" />
                                        </p>
                                    </fieldset>
                                </form>
                            </div>
                        ';
                    }
                } else if($table === 'forests'){
                    if( !empty($_POST['location']) || !empty($_POST['area']) || !empty($_POST['brief']) || !empty($_POST['howtoreach']) ){
                        
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
                        $query = "SELECT * FROM `".$table."` WHERE `Name`='".urldecode($_POST['name'])."'";
                        $result = $conn->query($query);
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $name = $row['Name'];
                            $location = $row['Location'];
                            $area = $row['Area'];
                            $brief = $row['AtAGlance'];
                            $howtoreach = $row['HowToReach'];
                            
                            if(!empty($_POST['location'])){
                                $location = $_POST['location'];
                            }
                            if(!empty($_POST['area'])){
                                $area = $_POST['area'];
                            }
                            if(!empty($_POST['brief'])){
                                $brief = $_POST['brief'];
                            }
                            if(!empty($_POST['howtoreach'])){
                                $howtoreach = $_POST['howtoreach'];
                            }
                        
                            $query = "UPDATE `".$table."` set `Name` = '".$name."', `Location` = '".$location."', `Area` = '".$area."', `AtAGlance` = '".$brief."', `HowToReach` = '".$howtoreach."' where `Name` = '".$name."'";
                            $result = $conn->query($query);
                            if($result){
                                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Update successful!</b>"
                                ;
                            } else {
                                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Error updating in database!</b>"
                                ;
                            }
                        }
                        mysqli_close($conn);
                    } else {
                        if(isset($_POST['update']) && isset($_GET['id'])){
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Atleast one field is required!</b>";
                        }
                        echo '
                            <div class="container" style="margin-top:1%">
                                <b></b>
                                <form action="login.php?type=update&table=forests&id=1" method="post">
                                    <fieldset>
                                        <p>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
                                            <input type="text" name="name" value="'.urldecode($GLOBALS['selected']).'" readonly />
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Location</label>
                                            <textarea name="location" value=""></textarea><br>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Area</label>
                                            <textarea name="area" value=""></textarea>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brief</label>
                                            <textarea name="brief" value=""></textarea><br>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; How to reach</label>
                                            <textarea name="howtoreach" value=""></textarea>
                                        </p>
                                        <p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="submit" name="update" value="Update" />
                                        </p>
                                    </fieldset>
                                </form>
                            </div>
                        ';
                    }      
                } else if($table === 'tours'){
                    if( !empty($_POST['destinations']) || !empty($_POST['brief']) || !empty($_POST['details']) ){
                        
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
                        $query = "SELECT * FROM `".$table."` WHERE `Name`='".urldecode($_POST['name'])."'";
                        $result = $conn->query($query);
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $name = $row['Name'];
                            $destinations = $row['Destinations'];
                            $brief = $row['Brief'];
                            $details = $row['Details'];
                            
                            if(!empty($_POST['destinations'])){
                                $destinations = $_POST['destinations'];
                            }
                            if(!empty($_POST['brief'])){
                                $brief = $_POST['brief'];
                            }
                            if(!empty($_POST['details'])){
                                $details = $_POST['details'];
                            }
                        	echo $brief;
                            $query = "UPDATE `".$table."` set `Name` = '".$name."', `Destinations` = '".$destinations."', `Brief` = '".$brief."', `Details` = '".$details."' where `Name` = '".$name."'";
                            $result = $conn->query($query);
                            if($result){
                                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Update successful!</b>"
                                ;
                            } else {
                                echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <b>Error updating in database!</b>"
                                ;
                            }
                        }
                        mysqli_close($conn);
                    } else {
                        if(isset($_POST['update']) && isset($_GET['id'])){
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Atleast one field is required!</b>";
                        }
                        echo '
                            <div class="container" style="margin-top:1%">
                                <b></b>
                                <form action="login.php?type=update&table=tours&id=1" method="post">
                                    <fieldset>
                                        <p>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
                                            <input type="text" name="name" value="'.urldecode($GLOBALS['selected']).'" readonly />
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destinations</label>
                                            <textarea name="destinations" value=""></textarea><br>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brief</label>
                                            <textarea name="brief" value=""></textarea>
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Details</label>
                                            <textarea name="details" value=""></textarea>
                                        </p>
                                        <p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="submit" name="update" value="Update" />
                                        </p>
                                    </fieldset>
                                </form>
                            </div>
                        ';
                    }
                } 
            }
        }
    }
    
    //Function to change password
    function changepassword(){
        if(!empty($_POST['oldpassword']) && !empty($_POST['newpassword'])){

            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];

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
                      
            $query = "SELECT * FROM `users`";
            $result = $conn->query($query);
            if ($result) {
                $flag = 0;
                while($row = $result->fetch_assoc()){
                    if($_SESSION['username'] === $row['username'] && $oldpassword === $row['password']){
                        $flag = 1;
                        break;
                    }
                }
            } 
            if(!$flag) {
                echo "&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Invalid password!</b>";
            } else {
                $query = "UPDATE `users` SET `password` = '".$newpassword."'";
                $result = $conn->query($query);
                if ($result) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Password changed successfully!</b>";
                } else {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Error updating in database!</b>"; 
                }
            }
            mysqli_close($conn);
        }
        else {
            if(isset($_POST['changepassword'])){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <b>All fields are required!</b>";
            }
            echo '
                <div class="container" align="center" style="margin-top:10%">
                    <b></b>
                    <form action="login.php?type=changepassword" method="post">
                        <fieldset>
                            <p>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Old Password</label>
                                <input type="password" name="oldpassword" value="" maxlength="20" />
                            </p>
                            <p>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;New Password</label>
                                <input type="password" name="newpassword" value="" maxlength="20" />
                            </p>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name="changepassword" value="Change Password" />
                            </p>
                        </fieldset>
                    </form>
                </div>
            ';
        }
    }

    //Function to delete password
    function deleteuser(){
        if( !empty($_POST['username']) ){

            $username = $_POST['username'];

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
            
            $query = "SELECT * FROM `users`";
            $result = $conn->query($query);
            if ($result) {
                $flag = 0;
                while($row = $result->fetch_assoc()){
                    if( $username === $row['username'] ){
                        $flag = 1;
                        break;
                    }
                }
            } 
            if(!$flag) {
                echo "&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>".$username." does not exists!</b>";
            } else {
                $query = "DELETE FROM `users` where `username` = '".$username."'";
                $result = $conn->query($query);
                if ($result) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>User deleted successfully!</b>";
                } else {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Error deleting the user!</b>"; 
                }
            }
            mysqli_close($conn);
        }
        else {
            if(isset($_POST['deleteuser'])){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <b>User name is required!</b>";
            }
            echo '
                <div class="container" align="center" style="margin-top:10%">
                    <b></b>
                    <form action="login.php?type=deleteuser" method="post">
                        <fieldset>
                            <p>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username</label>
                                <input type="text" name="username" value="" />
                            </p>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name="deleteuser" value="Delete User" />
                            </p>
                        </fieldset>
                    </form>
                </div>
            ';
        }
    }

    //Function to add user by admin
    function adduser() {
        
        if(!empty($_POST['username']) && !empty($_POST['password'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

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

            $query = "SELECT * FROM `users`";
            $result = $conn->query($query);
            if ($result) {
                $flag = 1;
                while($row = $result->fetch_assoc()){
                    if($username === $row['username']){
                        $flag = 0;
                        break;
                    }
                }
            }
            if(!$flag) {
                echo "&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>User already exists!</b>";
            } else {
                $query = "INSERT INTO `users` VALUES ('".$username."', '".$password."')";
                $result = $conn->query($query);
                if ($result) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>User added successfully!</b>"
                    ;
                } else {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Error adding in database!</b>"
                    ; 
                }
            }
            mysqli_close($conn);
        }
        else {
            if(isset($_POST['adduser'])){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <b>All fields are required!</b>";
            }
            echo '
                <div class="container" align="center" style="margin-top:10%">
                    <b></b>
                    <form action="login.php?type=adduser" method="post">
                        <fieldset>
                            <p>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username</label>
                                <input type="text" name="username" value="" />
                            </p>
                            <p>
                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</label>
                                <input type="password" name="password" value="" />
                            </p>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name="adduser" value="Add User" />
                            </p>
                        </fieldset>
                    </form>
                </div>
            ';
        }
    }


    //Function to start with the login page
    function start(){
        if(isset($_GET['type'])){
            $type = $_GET['type'];
            
            if($type !== 'changepassword' && $type !== 'adduser' && $type !== 'deleteuser') {
                //Show dropdown menu on start
                if( empty($_GET['table']) ){
                    echo '<br>
                        <div class="dropdown">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a onclick="window.location.href=\'login.php?type='.$type.'&table=national-parks\'">National Parks</a>
                                </li>
                                <li><a onclick="window.location.href=\'login.php?type='.$type.'&table=wildlife-sanctuaries\'">Wildlife Sanctuaries</a>
                                </li>
                                <li><a onclick="window.location.href=\'login.php?type='.$type.'&table=tiger-reserves\'">Tiger Reserves</a>
                                </li>
                                <li><a onclick="window.location.href=\'login.php?type='.$type.'&table=elephant-reserves\'">Elephant Reserves</a>
                                </li>
                                <li><a onclick="window.location.href=\'login.php?type='.$type.'&table=forests\'">Forest</a>
                                </li>
                                <li><a onclick="window.location.href=\'login.php?type='.$type.'&table=tours\'">Tours</a>
                                </li>
                            </ul>
                        </div>
                    ';
                }
                
                if($type === 'view'){
                    view();
                } else if($type === 'add'){
                    add();
                } else if($type === 'update'){
                    update();
                } else if($type === 'delete'){
                    drop();
                } 
            } else if($type === 'changepassword') {
                // Code for password change, database setup is required
                changepassword();
            } else if($type === 'adduser') {
                //Allow admin to add users to modify contents on the site
                adduser();
            } else if($type === 'deleteuser') {
                //Allow admin to delete users
                deleteuser();
            }
        }
    }

?>

<?php
    
    session_start();
    $valid = 0;
    if(isset($_GET['id'])){
        if($_GET['id'] ===  'logout'){
            $valid = 0;
            unset($_SESSION['username']);
            unset($_SESSION['password']);
        }
    }

    if( isset($_POST['submit']) ){
        
        if(!isset( $_POST['username'], $_POST['password']) ){
            $message = 'Please enter a valid username and password<br><br>';
        }
        /*** check the username has only alpha numeric characters ***/
        elseif (ctype_alnum($_POST['username']) != true){
        /*** if there is no match ***/
            $message = "Username must be alpha numeric<br><br>";
        }
        /*** check the password has only alpha numeric characters ***/
        elseif (ctype_alnum($_POST['password']) != true){
            /*** if there is no match ***/
            $message = "Password must be alpha numeric<br><br>";
        }
        else {
            
            //Look into the database, assuming login correct for now
            $inputusername = $_POST['username'];
            $inputpassword = $_POST['password'];

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
              
            $flag = 0;
            $query = "SELECT * FROM `users`";
            $result = $conn->query($query);
            if ($result) {
                while($row = $result->fetch_assoc()){
                    if($inputusername === $row['username'] && $inputpassword === $row['password']) {
                        $flag = 1;
                        break;
                    }
                }
            }
            mysqli_close($conn);

            if($flag){
                $valid = 1;
                $_GET['type'] = 'view';
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                $username = $_SESSION['username'];
                $password = $_SESSION['password'];
                $message = "Login successful!. Welcome ".$username."<br><br>";
            } else {
                $valid = 0;
                $message = "Invalid username or password!";
            }
        }
    } else if( isset($_SESSION['username'], $_SESSION['password']) ) {
        $valid = 1;
    } else {
        $valid = 0;
        $message = "";
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Indian Forests &amp; Wildlife</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <style type="text/css">
        	.bs-example{
        		margin: 20px;
        	}
        </style>
    </head>


    <body>

    <?php 

        include("header.php");

        if(!$valid){
        
            echo '
                <div class="container" align="center" style="margin-top:10%">
                    <b>'.$message.'</b>
                    <form action="login.php" method="post">
                        <fieldset>
                          <p>
                            <label>Username</label>
                            <input type="text" id="username" name="username" value="" autofocus />
                          </p>
                          <p>
                            <label>Password</label>
                            <input type="password" id="password" name="password" value="" />
                          </p>

                          <p>
                            <input type="submit" name="submit" value="&rarr; Login" />
                          </p>
                        </fieldset>
                    </form>
                </div>';
        }
        else {

            echo '
                <div class="bs-example">
                    <ul class="nav nav-tabs">
                        <li class="active"><a onclick="window.location.href=\'login.php?type=view\'">View</a></li>
                        <li><a onclick="window.location.href=\'login.php?type=add\'">Add</a></li>
                        <li><a onclick="window.location.href=\'login.php?type=update\'">Update</a></li>
                        <li><a onclick="window.location.href=\'login.php?type=delete\'">Delete</a></li>
                        <li><a onclick="window.location.href=\'login.php?type=changepassword\'">Change Password</a></li>
                        <li><a onclick="window.location.href=\'login.php?type=adduser\'">Add user</a></li>
                        <li><a onclick="window.location.href=\'login.php?type=deleteuser\'">Delete user</a></li>
                        <li><a href="login.php?id=logout">Logout</a></li>
                    </ul>
                </div>
            ';
            start();
        }

    ?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </body>

</html>