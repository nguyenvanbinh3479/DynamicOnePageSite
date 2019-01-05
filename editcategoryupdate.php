<?php

  include("dbconnect.php");
  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

    $editcat_sql = "UPDATE category SET name='".$_SESSION['editcategory']['name']."' WHERE categoryID=".$_SESSION['editcategory']['categoryID'];
    $editcat_query = mysqli_query($dbc, $editcat_sql);
    unset($_SESSION['editcategory']);
?>

<h1>Edit category</h1>
<p>Category successfully updated</p>
<p><a href="index.php?page=admin">Back to admin panel</a></p>