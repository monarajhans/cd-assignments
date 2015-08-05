<?php
    foreach($priceproducts as $priceproduct) { ?>
      <div class="col-xs-6 col-sm-3 placeholder">
        <a href="/products/show/<?php echo $priceproduct['id']; ?>"><img src= "<?php echo $priceproduct['image'] ?>" height="200" width="200">
          <h5><?php echo $priceproduct['name']; ?></h5></a>
          <span class="price">$<?php echo $priceproduct['price'] ?></span>
      </div>
<?php } ?>  
<div class="numbers"><?php echo $pagelinks;?></div>