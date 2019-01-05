<?php
//This file is the base for all pages in the site. When creating a new page, we just open this one, then save a copy as the new page.
	include("dbconnect.php");
	$stock_sql="SELECT stock.*, category.name AS catname FROM stock JOIN category 
  ON (stock.categoryID=category.categoryID) WHERE stock.stockID=".$_GET['stockID'];
	$stock_query=mysqli_query($dbc, $stock_sql);
	$stock_rs=mysqli_fetch_assoc($stock_query);
?>
	<p><img src="images/<?php echo $stock_rs['bigphoto']; ?>" /></p>
  <p><?php echo $stock_rs['name']; ?></p>
  <p><?php echo $stock_rs['catname']; ?></p>
  <p>Price: $<?php echo $stock_rs['price']; ?></p>
  <p><?php echo $stock_rs['description']; ?></p>
