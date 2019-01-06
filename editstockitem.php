<?php
  include("dbconnect.php");
  session_start();
  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }
  if (isset($_GET['stockID'])){
    $_SESSION['editstockitem']['stockID'] = $_GET['stockID'];
  }



    $stock_sql = "SELECT * FROM stock WHERE stockID=".$_GET['stockID'];
    $stock_query = mysqli_query($dbc, $stock_sql);
    $stock_rs = mysqli_fetch_assoc($stock_query);
    $_SESSION['editstockitem']['categoryID'] = $stock_rs['categoryID'];
    $_SESSION['editstockitem']['name'] = $stock_rs['name'];
    $_SESSION['editstockitem']['price'] = $stock_rs['price'];
    $_SESSION['editstockitem']['thumbnail'] = $stock_rs['thumbnail'];
    $_SESSION['editstockitem']['topline'] = $stock_rs['topline'];
    $_SESSION['editstockitem']['description'] = $stock_rs['description'];



?>

<h1>Edit stock</h1>

<form action="index.php?page=editconfirmstockitem" enctype="multipart/form-data" method="POST">
    <p>Stock item name: <input type="text" name="name" value="<?php echo $_SESSION['editstockitem']['name'];?>"></p>
    <p>Thumbnail image: <input type="file" name="fileToUpload" id="fileToUpload"></p>
    <p>Category: <select name="categoryID">
      <?php $catlist_sql = "SELECT * FROM category";
        $catlist_query = mysqli_query($dbc, $catlist_sql);
        $catlist_rs = mysqli_fetch_assoc($catlist_query);
        do{?>

          <option value="<?php echo $catlist_rs['categoryID']?>"
            <?php  
              if($catlist_rs['categoryID']==$_SESSION['editstockitem']['categoryID']){
                echo "selected=selected";
              }
            ?>
          ><?php echo $catlist_rs['name']?></option>

        <?php
        }while($catlist_rs = mysqli_fetch_assoc($catlist_query));

      ?>
    </select></p>
    <p>Price: $<input type="text" name="price" value="<?php echo $_SESSION['editstockitem']['price'];?>"></p>
    <p>Topline: <input type="text" name="topline" value="<?php echo $_SESSION['editstockitem']['topline'];?>"></p>
    <p>Description: <textarea name="description" cols="30" rows="10"><?php echo $_SESSION['editstockitem']['description'];?></textarea></p>
    <input type="submit" name="update" value="Update">

  </form>