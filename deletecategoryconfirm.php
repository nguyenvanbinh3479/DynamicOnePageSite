<?php
  
  include("dbconnect.php");
  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

?>

<h1>Confirm Delete new category</h1>

<?php
  $delcat_sql = "SELECT * FROM category WHERE categoryID=".$_GET['categoryID'];
  $delcat_query = mysqli_query($dbc, $delcat_sql);
  $delcat_rs = mysqli_fetch_assoc($delcat_query);
  //check if there are any stock item in this category
  $check_sql = "SELECT * FROM stock WHERE categoryID=".$_GET['categoryID'];
  $check_query = mysqli_query($dbc, $check_sql);
  $count = mysqli_num_rows($check_query);
  ?>
  <p><?php if($count >0) {
    echo "Warnimg! There are ".$count." stock item(s) in this category. If you delete the category they will also be removed from the database";
  }?></p>
  <p><?php echo "Do you really wish to delete ". $delcat_rs['name']. "?";?></p>
  <p><a href="index.php?page=deletecategory&categoryID=<?php echo $_GET['categoryID']; ?>">Yes, delete it!</a> | <a href="index.php?page=deletecategoryselect">No, go back</a> | <a href="index.php?page=admin">Back to admin panel</a></p>
