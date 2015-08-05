
<?php 
    foreach($searchallproducts as $searchproduct) { ?>
      <div class="col-xs-6 col-sm-3 placeholder">
        <a href="/products/show/<?php echo $searchproduct['id']; ?>"><img src= "<?php echo $searchproduct['image'] ?>" height="200" width="200"></a>
        <a href="/products/show/<?php echo $searchproduct['id']; ?>"><h5><?php echo $searchproduct['name']; ?></h5></a></div>
    <?php } 
    ?>  
