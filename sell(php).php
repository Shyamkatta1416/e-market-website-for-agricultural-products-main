<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;
    $prod_name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $selected_val = $_POST['color']; 
    $content = $_POST["content"];
    $about = $_POST["about"];

	$db = mysqli_connect("localhost", "root", "", "agri-e");

	// Get all the submitted data from the form
	$sql = "INSERT INTO user (filename, name, type, price, ftype, content, about) VALUES ('$filename', '$prod_name', '$type', $price, '$selected_val', $content, '$about')";
    // "INSERT INTO image (filename) VALUES ('filename')";
    
    
    

	// Execute query
	mysqli_query($db, $sql);
    

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3>your product has been added to our website :)" . $selected_val . "</h3>" ;
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
    
   
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sell(css).css" />
    <script src="agri.js"></script>

</head>

<body>
	<div id="content">
	
		<form method="POST" action="" enctype="multipart/form-data">
		<h4> Please fill the bellow form. Do not leave any field empty.</h4>
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
            
            <div>
            Name: <input type="text" name="name"><br><br>
            price: <input type="text" name="price"><br><br>
            <!--type: <input type="text" name="type"><br>-->

            <label for="type">product category:</label>
            <select name="type" id="type" >
            <option value="" selected="selected" hidden="hidden">--- Choose product category---</option>
            <option value="f" >fertilizer</option>
	        <option value="p">plants/seeds</option>
	        <option value="tp">tech product</option>
            <option value="t">tools/other</option>
            </select><br><br>



            <label for="color">if fertilizer choose type:</label>
            <select name="color" id="color" >
            <option value="" selected="selected" hidden="hidden">--- Choose a type of fertlizer ---</option>
            <option value="nitrogen based" >nitrogen based</option>
	        <option value="urea based">urea based</option>
	        <option value="Ammonium based">Ammonium based</option>
            <option value="">not a fertilizer</option>
            </select><br><br><br>
            if a fertilizer,what is w/v content for type(in numbers only): <input type="text" name="content"> <--- please type 0 if its not a fertilizer<br>
            tell us more about your product(150 char max): <input type="text" name="about"><br>
        
             </div>
			<div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload" >SUBMIT</button><br>
			</div>
            <div>
                <h6> Tips on how to sell product to gain attention: </h6><br>
                1.select the name/title such a way it can attract user, example: (sickle for lefthanders)<br>
                2.use a resonable price for the product. less price = more buyers.<br>
                3.make sure the content's limits donot exceed FCO values. safety is first priority<br>
                4.use the about section to write a short and clear description of the product we will display this in our webpage.<br>


            </div>
		</form>
         
	</div>
	
		<?php
		$query = " select * from image3";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./image/<?php echo $data['filename']; ?>" width="500" height="600">

		<?php
		}
		?> 
        
	
</select>
	</div>
</body>

</html>
