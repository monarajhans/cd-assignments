<?php
    foreach($mostpopular_items as $mostpopular_item) { ?>
      <div class="col-xs-6 col-sm-3 placeholder">
        <a href="/products/show/<?php echo $mostpopular_item['id']; ?>"><img src= "<?php echo $mostpopular_item['image'] ?>" height="200" width="200">
          <h5><?php echo $mostpopular_item['name']; ?></h5></a>
          <span class="price">$<?php echo $mostpopular_item['price'] ?></span>
      </div>
<?php } ?>   
<div class="numbers"><?php echo $pagelinks;?></div>