<?php
  include("dbconnect.php");
  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  $_SESSION['editstockitem']['name'] = $_POST['name'];
  $_SESSION['editstockitem']['categoryID'] = $_POST['categoryID'];
  $_SESSION['editstockitem']['price'] = $_POST['price'];
  $_SESSION['editstockitem']['topline'] = $_POST['topline'];
  $_SESSION['editstockitem']['description'] = $_POST['description'];

?>

<h1>Update category</h1>
  <p>Update stock item name: <?php echo $_SESSION['editstockitem']['name']; ?></p>  
  <p>Category: <?php echo $_SESSION['editstockitem']['categoryID']; ?></p>
  <p>Price: $<?php echo $_SESSION['editstockitem']['price']; ?></p>
  <p>Topline: <?php echo $_SESSION['editstockitem']['topline']; ?></p>
  <p>Description: <?php echo $_SESSION['editstockitem']['description']; ?></p>
<p><a href="index.php?page=editupdatestockitem">Confirm</a> | <a href="index.php?page=editstockitem">Oops, go back</a> | <a href="index.php?page=admin">Back to admin panel</a></p>
