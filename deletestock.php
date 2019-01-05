<?php
session_start();

// Check if user is logged in by testing if the admin session has been set. If not, redirect the browser to the admin page, which should display the login form.
if(!isset($_SESSION['admin'])) {
	header("Location:index.php");	
}

// include the database connection code
	include("dbconnect.php");
	
// Delete the category
$delete_sql="DELETE FROM stock WHERE stockID=".$_SESSION['deletestock'];
$delete_query=mysqli_query($dbc, $delete_sql);

unset($_SESSION['deletestock']);
?>

      <p>Stock item deleted</p>
      <p><a href="index.php?page=admin">Back to admin panel</a></p>
  