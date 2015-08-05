<?php
  //var_dump($details); die();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
  <h2>EDIT PRODUCT ID- <?= $details['id'] ?></h2>
<form class="form-horizontal" action="/dashboard/update" method="post">
  <input type="hidden" name="product_id" value="<?= $details['id'] ?>">
  <div class="form-group">
    <label  class="col-sm-2 control-label">Name</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="name" value="<?= $details['name'] ?>">
    </div>
</div>
      <div class="form-group">
    <label  class="col-sm-2 control-label">Description</label>
    <div class="col-sm-2">
      <textarea  class="form-control" name="description"><?= $details['description'] ?>
      </textarea>
  </div>
    </div>
     <div class="form-group">
    <label  class="col-sm-2 control-label">Category</label>
    <div class="col-sm-2">
        <select class="form-control" name="category" >

          <option selected="selected" value=<?=$details['category_id'] ?>> <?= $details['category_name'] ?> </option>
<?php           
          foreach($categories as $category) {
?>
  		    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

<?php } ?>
		    </select>
    </div>
</div>
 <!--    <div class="form-group">
    <label  class="col-sm-2 control-label">Or add a new category</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="new_category">
    </div>
</div> -->
    <div class="form-group">
    <label  class="col-sm-2 control-label">Image</label>
    <div class="col-sm-2">
     <input type="file" value="upload" class="btn btn-default" name="pic">
     <input type="hidden" name="" value="">
    </div>
</div>

<a href="/dashboard/products" class="btn btn-default">Cancel </a>
<a href="" class="btn btn-success">Preview </a>

<input type="submit" value="update" class="btn btn-danger">
</form>
</body>
</html>