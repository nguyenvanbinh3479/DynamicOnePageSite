<?php
session_start();
unset($_SESSION['deletestock']);
// Check if user is logged in by testing if the admin session has been set. If not, redirect the browser to the admin page, which should display the login form.
if(!isset($_SESSION['admin'])) {
	header("Location:index.php");	
}

// include the database connection code
	include("dbconnect.php");
?>
      <p><a href="index.php?page=admin">Back to admin panel</a></p>
      <h1>Select stock item to delete</h1>
      <?php 
	  // Get a list of all categories in the category table. We will use this to loop through and then display each stock item within the category.
	  $category_sql="SELECT * FROM category";
	  $category_query = mysqli_query($dbc, $category_sql);
	  $category_rs = mysqli_fetch_assoc($category_query);
	  do {
	  ?>
      <h2><?php echo $category_rs['name']; ?></h2>
      <?php 
	  // Within each category we will select all the stock items that belong to it and display them as a list of dynamic links
	  $stock_sql="SELECT stockID, name FROM stock WHERE categoryID=".$category_rs['categoryID'];
	  $stock_query=mysqli_query($dbc, $stock_sql);
	  $stock_rs=mysqli_fetch_assoc($stock_query);
	  do { ?>
		 <p><a href="index.php?page=deleteconfirmstock&stockID=<?php echo $stock_rs['stockID']; ?>"><?php echo $stock_rs['name']; ?></a></p> 
		  
	  <?php } while ($stock_rs=mysqli_fetch_assoc($stock_query));
	  ?>
      <?php } while ($category_rs = mysqli_fetch_assoc($category_query));
	  mysqli_free_result($stock_query);
	  mysqli_free_result($category_query);
	  ?>
  