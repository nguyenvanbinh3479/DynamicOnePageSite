<?php
  
  include("dbconnect.php");
  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  $delcat_sql = "DELETE FROM category WHERE categoryID=".$_GET['categoryID'];
  $delcat_query = mysqli_query($dbc, $delcat_sql);

  $delstock_sql = "DELETE FROM stock WHERE categoryID=".$_GET['categoryID'];
  $delstock_query = mysqli_query($dbc, $delstock_sql);

?>

<h1>Category delete</h1>
  <p>Category has successfully been deleted</p>
  <p><a href="index.php?page=admin">Return to admin panel</a></p>