<?php

  include("dbconnect.php");
  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

    $stock_sql = "UPDATE stock SET name='".$_SESSION['editstockitem']['name']."', categoryID='".$_SESSION['editstockitem']['categoryID']."', price='".$_SESSION['editstockitem']['price']."', thumbnail='".$_SESSION['editstockitem']['thumbnail']."', bigphoto='".$_SESSION['editstockitem']['thumbnail']."', topline='".$_SESSION['editstockitem']['topline']."', description='".$_SESSION['editstockitem']['description']."' WHERE stockID=".$_SESSION['editstockitem']['stockID'];
    $stock_query = mysqli_query($dbc, $stock_sql);
    unset($_SESSION['editstockitem']);
?>

<h1>Edit stock</h1>
<p>stock successfully updated</p>
<p><a href="index.php?page=admin">Back to admin panel</a></p>