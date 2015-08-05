<?php
    foreach($pricebycategory as $sortcategory) { ?>
      <div class="col-xs-6 col-sm-3 placeholder">
        <a href="/products/show/<?php echo $sortcategory['id']; ?>"><img src= "<?php echo $sortcategory['image'] ?>" height="200" width="200">
          <h5><?php echo $sortcategory['name']; ?></h5></a>
          <span class="price">$<?php echo $sortcategory['price'] ?></span>
      </div>
<?php } ?>  
<div class="numbers"><?php echo $pagelinks;?></div>