<?php

  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location: index.php?page=admin");
  }

  //chceck to see if user has submitted the add category page
  if (!isset($_SESSION['addcategory']['name'])){
    header("Location: index.php?page=admin");
  }

  //enter the new category
  $newcategory_sql = "INSERT INTO category (name) VALUE ('".mysqli_real_escape_string($dbc, $_SESSION['addcategory']['name'])."')";
  $newcategory_query = mysqli_query($dbc, $newcategory_sql);
  unset($_SESSION['addcategory']['name']);

?>
<p>New category has been entered</p>
<p><a href="index.php?page=admin">return to admin panel</a></p>
