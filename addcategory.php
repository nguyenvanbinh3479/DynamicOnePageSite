<?php

  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }

  //set session to blank if user has just entered this page from the admin panel

  if (!isset($_SESSION['addcategory']['name'])){
    $_SESSION['addcategory']['name'] = "";
  }

?>

<h1>add new category</h1>

<form action="index.php?page=confirmcategory" method="post">
  <p><input type="text" name="name" value="<?php echo $_SESSION['addcategory']['name']?>" size="40" maxlength="50"></p>
  <p><input type="submit" name="submit" value="Add category"></p>
</form>