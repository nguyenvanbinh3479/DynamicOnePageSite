<div class="header">
    	<div class="logo">
        <a href="index.php"><img src="images/logo.jpg" alt="Chic Clothing logo" /></a>
        </div><!--logo ends-->
		<div class="navigation">
		<?php 
			$cat_sql="SELECT * FROM category";
			$cat_query=mysqli_query($dbc, $cat_sql);
			$cat_rs=mysqli_fetch_assoc($cat_query);
		?>
        <p><?php
			do { ?>
			<a href="index.php?page=category&categoryID=<?php echo $cat_rs['categoryID']; ?>"><?php echo $cat_rs['name']; ?></a>
				
				<?php
			} while ($cat_rs=mysqli_fetch_assoc($cat_query))
		?>
        <a href="index.php?page=admin">Admin</a>
        </p>
      </div><!--navigation ends-->
	</div><!-- Header ends here-->