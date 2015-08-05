<?php 
    foreach($singlecategory as $category) { ?>
      <div class="col-xs-6 col-sm-3 placeholder">
        <a href="/products/show/<?php echo $category['id']; ?>">
          <img src= "<?php echo $category['image'] ?>" height="200" width="200"/>
          <h5><?php echo $category['name']; ?></h5></a>
          <span class="price">$<?php echo $category['price']?></span></div>
<?php } ?>   
<div class="numbers"><?php echo $pagelinks;?></div>