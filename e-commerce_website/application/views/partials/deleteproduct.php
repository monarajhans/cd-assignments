<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <link rel="stylesheet" href="http://design-seeds.com/palettes/12/ColorFramed.png">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<h3>Are You sure you want to delete this product?</h3>
<p>Product ID : <?= $delete['id'] ?></p>
<p>Product Name :  <?= $delete['name'] ?></p>
<p>Product Description : <?= $delete['description'] ?></p>
<p>Quantity Sold : <?= $delete['quantity_sold'] ?></p>
<p>Product Image : <img src="<?= $delete['image_thumbnail'] ?>" height ="100" width="100"></p>
<form action="/dashboard/delete_product/<?= $delete['id'] ?>" method="post">
<input type="submit" value="Yes" class="btn btn-danger"> <a href="/dashboard/products" class="btn btn-default">NO </a>
</form>
</body>
</html>