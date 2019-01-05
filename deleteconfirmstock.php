<?php
session_start();

// Check if user is logged in by testing if the admin session has been set. If not, redirect the browser to the admin page, which should display the login form.
if(!isset($_SESSION['admin'])) {
	header("Location:index.php");	
}

if(isset($_GET['stockID'])) {
	$_SESSION['deletestock']=$_GET['stockID'];
} else {
	header("Location: cpanel.php");
}
// include the database connection code
	include("dbconnect.php");
?>

<?php 
// Get the stock item name
	$stock_sql="SELECT stock.name, stock.price, stock.topline, stock.description, category.name AS catname FROM stock JOIN category ON (stock.categoryID=category.categoryID) WHERE stock.stockID=".$_GET['stockID'];
	$stock_query=mysqli_query($dbc, $stock_sql);
	$stock_rs=mysqli_fetch_assoc($stock_query);
	
?>
	<p><a href="index.php?page=admin">Back to admin panel</a></p>
      <h1>Confirm stock item to delete</h1>
      <p>Item to be deleted is: <?php echo $stock_rs['name']; ?></p>
      <p>Category: <?php echo $stock_rs['catname']; ?></p>
      <p>Price: $<?php echo $stock_rs['price']; ?></p>
      <p>Topline: <?php echo $stock_rs['topline']; ?></p>
      <p>Description: <?php echo $stock_rs['description']; ?></p>

      <p><a href="index.php?page=deleteselectstock">Go back</a> | <a href="index.php?page=deletestock&stockID=<?php echo $_GET['stockID']; ?>">Delete</a></p>
  