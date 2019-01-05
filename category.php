<?php
  // if category id is not set, redirect back to index page
  include("dbconnect.php");
  if (!isset($_GET['categoryID'])){
    header('Location:index.php');
  }

  //select all stock item belong to the selected categoryID

  $stock_sql = "SELECT stock.stockID, stock.name, stock.price, stock.thumbnail,
  category.name AS catname FROM stock JOIN category ON (stock.categoryID=category.categoryID) 
  WHERE stock.categoryID=".$_GET['categoryID'];
  if ($stock_query = mysqli_query($dbc, $stock_sql)){
    $stock_rs = mysqli_fetch_assoc($stock_query);
  }

  if (mysqli_num_rows($stock_query)==0){
    echo "sorry, we have no item currently in stock";
  }else{
    ?>
    <h1><?php echo $stock_rs['catname']; ?></h1>
    <?php
      do {?>
      <div class="item">
        <a href="index.php?page=item&stockID=<?php echo $stock_rs['stockID'] ?>">
        <p><img src="images/<?php echo $stock_rs['thumbnail']?>" alt=""></p>
        <p><?php echo $stock_rs['name']?></p>
        <p>$<?php echo $stock_rs['price']?></p></a>
      </div>
      <?php  
      }while($stock_rs=mysqli_fetch_assoc($stock_query));
    ?>
    <?php
  }

?>