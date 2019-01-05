<?php

  session_start();

  if(!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  if(isset($_POST['submit'])){
    $_SESSION['addstock']['name'] = $_POST['name'];
    $_SESSION['addstock']['categoryID'] = $_POST['categoryID'];
    $_SESSION['addstock']['price'] = $_POST['price'];
    $_SESSION['addstock']['topline'] = $_POST['topline'];
    $_SESSION['addstock']['description'] = $_POST['description'];
  }else{
    header("Location:index.php");
  }

  if($_FILES['fileToUpload']['name']!="") {
		$_SESSION['addstock']['thumbnail']=$_FILES['fileToUpload']['name'];
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			?>
			<div class="maincontent">
				<p><a href="index.php?page=admin">Back to admin</a></p>
				<h1>Confirm item details</h1>
				<p>Name: <?php echo $_SESSION['addstock']['name']; ?></p>
				<p>Thumbnail: <img src="images/<?php echo $_SESSION['addstock']['thumbnail']; ?>" /></p>
				<p>Category: 
				<?php
					$catname_sql="SELECT name FROM category WHERE categoryID=".$_SESSION['addstock']['categoryID'];
					$catname_qry=mysqli_query($dbc, $catname_sql);
					$catname_rs=mysqli_fetch_assoc($catname_qry);
					echo $catname_rs['name'];
				
				?>
				</p>
				<p>Price $<?php echo $_SESSION['addstock']['price']; ?></p>
				<p>Topline: <?php echo $_SESSION['addstock']['topline']; ?></p>
				<p>Description: <?php echo $_SESSION['addstock']['description']; ?></p>
			
			
			</div>
			<?php
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	
} // the code below only runs if no image is selected	
	else {
		$_SESSION['addstock']['thumbnail']="noimage.jpg";
		?>
		<div class="maincontent">
				<p><a href="index.php?page=admin">Back to admin</a></p>
				<h1>Confirm item details</h1>
				<p>Name: <?php echo $_SESSION['addstock']['name']; ?></p>
				<p>Thumbnail: <img src="images/<?php echo $_SESSION['addstock']['thumbnail']; ?>" /></p>
				<p>Category: 
				<?php
					$catname_sql="SELECT name FROM category WHERE categoryID=".$_SESSION['addstock']['categoryID'];
					$catname_qry=mysqli_query($dbc, $catname_sql);
					$catname_rs=mysqli_fetch_assoc($catname_qry);
					echo $catname_rs['name'];
				
				?>
				</p>
				<p>Price $<?php echo $_SESSION['addstock']['price']; ?></p>
				<p>Topline: <?php echo $_SESSION['addstock']['topline']; ?></p>
				<p>Description: <?php echo $_SESSION['addstock']['description']; ?></p>
			
			
			</div>
		<?php
	}
?>
<p><a href="index.php?page=addstock">Go back</a> | <a href="index.php?page=enterstock">Confirm</a></p>