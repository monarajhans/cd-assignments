<!DOCTYPE html>
<html>
<head>
	<title>Carts</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#continue_shopping').submit(function(){
					$.post('/products/shipping_information', $(this).serialize(), function(res) {
						$('#shipping_details').html(res);
					}); return false;
				});
			});
		</script>
</head>
<body>
	<table class="table table-striped" style="width: 700px; border:2px solid black;">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				
				<th>Find</th>
			</tr>
		</thead>
		<tbody>
<?php	$total_bill = 0; $total_quantity = 0;


		foreach($cart_products as $value)
		{
?>			<tr>
				<td><?= $value['name']; ?></td>
				
				
				<td><?= $total = $value['price'] ?></td>
				<td><a href="/products/google/<?= $value['id']; ?>/<?= $value['category_id']; ?>">Find the product in your nearest store</a></td>
				</tr>
<?php 	$total_bill += $total;
		}			
?>		</tbody>
		</table>
	<p> Total: <?= $total_bill; ?></p>
	<?php  
	$this->session->set_userdata('bill', $total_bill);
          if ($this->session->flashdata('errors')) {
            echo $this->session->flashdata('errors');
   } ?>
	<div id="shipping_info">
	<form action="" method="post" class="form-group" id="continue_shopping">
		<input type="submit" value="continue shopping" class="btn btn-default">
	</form>
	<div id="shipping_details">	</div>
	</div>

</body>
</html>
