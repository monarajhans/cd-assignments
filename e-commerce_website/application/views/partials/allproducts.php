<?php
    foreach($allproducts as $product) { ?>
      <div class="col-xs-6 col-sm-3 placeholder">
        <a href="/products/show/<?php echo $product['id']; ?>"><img src= "<?php echo $product['image'] ?>" height="200" width="200">
          <h5><?php echo $product['name']; ?></h5></a>
          <span class="price">$<?php echo $product['price'] ?></span>
          </div>
<?php } ?>  
<div class="numbers"><?php echo $pagelinks;?></div>