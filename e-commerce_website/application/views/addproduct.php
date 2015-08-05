<!DOCTYPE html>
<html>
<head>
	<title>ADD Product</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
  <h2>ADD PRODUCT </h2>
<form class="form-horizontal" action="/dashboard/add_new_product" method="post">
  <div class="form-group">
    <label  class="col-sm-2 control-label">Name</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="name">
    </div>
</div>
      <div class="form-group">
    <label  class="col-sm-2 control-label">Description</label>
    <div class="col-sm-2">
      <textarea  class="form-control" name="description">
      </textarea>
  </div>
    </div>
     <div class="form-group">
    <label  class="col-sm-2 control-label">Category</label>
    <div class="col-sm-2">
        <select class="form-control" name="category">
          <option value ="">Please select </option>
<?php           
          foreach($categories as $category) {
?>
          <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

<?php } ?>

		    </select>
    </div>
</div>

     <div class="form-group">
    <label  class="col-sm-2 control-label">Price</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="price">
    </div>
</div>
    <div class="form-group">
   <label  class="col-sm-2 control-label">Thumbnail-Image</label>
   <div class="col-sm-2">
    <input type="file" value="upload" name="pic" >
   </div>
</div>
   <div class="form-group">
   <label  class="col-sm-2 control-label">Left-View</label>
   <div class="col-sm-2">
    <input type="file" value="upload" name="pic-left" >
   </div>
</div>
   <div class="form-group">
   <label  class="col-sm-2 control-label">Right-View</label>
   <div class="col-sm-2">
    <input type="file" value="upload" name="pic-right" >
   </div>
</div>
   <div class="form-group">
   <label  class="col-sm-2 control-label">Top-View</label>
   <div class="col-sm-2">
    <input type="file" value="upload" name="pic-top" >
   </div>
</div>
   <div class="form-group">
   <label  class="col-sm-2 control-label">Bottom-View</label>
   <div class="col-sm-2">
    <input type="file" value="upload" name="pic-bottom" >
   </div>
</div>
<a href="/dashboard/products" class="btn btn-default">Cancel </a>
<input type="submit" value="add" class="btn btn-success">
</form>
</body>
</html>