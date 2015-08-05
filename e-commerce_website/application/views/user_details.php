<?php
//var_dump($shippings);die();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <link rel="stylesheet" href="http://design-seeds.com/palettes/12/ColorFramed.png">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	 <style>
	 #logoff
	 {
	 	margin-left: 600px;
	 }
	 .navbar
	 {
	 	background-color: #600000 ;
	 }
	 #left
	 {
	 	height: 400px;
	 	width: 200px;
	 	border : 1px solid black;
	 	display: inline-block;
	 	vertical-align: top;
	 }
	 #right
	 {
	 	height: 700px;
	 	width: 700px;
	 	border : 1px solid black;
	 	display: inline-block;
	 	vertical-align: top;
	 }
	 #status
	 {
	 	height: 100px;
	 	width: 200px;
	 	display: inline-block;
	 	vertical-align: top;
	 }
	 #total
	 {
	 	height: 300px;
	 	width: 200px;
	 	display: inline-block;
	 	vertical-align: top;
	 }
	 </style>
</head>
<body>
	<div class="container">
	<div class="navbar" >
      <ul class="nav navbar-nav">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Orders</a></li>
        <li><a href="">Products</a></li>
        <li><a href="" id="logoff">Log off</a></li>
      </ul>  
    </div>
       	<div id="left">
       		<h4>Order ID </h4>
       		<h4>Customer Billing Info </h4>
       		<p>Name : <?= $details[0]['first_name'];?> </p>
       		<p>Address : <?= $details[0]['street'] ?></p>
       		<p>City : <?= $details[0]['city'] ?></p>
       		<p>State :<?= $details[0]['state'] ?> </p>
       		<p>Zip : <?= $details[0]['zipcode'] ?></p>
       		<h4>Customer Shipping Info </h4>
       		<p>Name :<?= $shippings['first_name'];?></p>
       		<p>Address :<?= $shippings['street'];?> </p>
       		<p>City : <?= $shippings['city'];?></p>
       		<p>State :<?= $shippings['state'];?> </p>
       		<p>Zip :<?= $shippings['zipcode'];?> </p>       		
       	</div>
    	<div id="right">
    		<table class="table table-striped table-bordered" >
				<thead>
					<tr>
						<th class="col-md-2">Order ID</th>
						<th class="col-md-2">Name</th>
						<th class="col-md-2"> Price</th>
						<th class="col-md-2">Quantity</th>
						<th class="col-md-2">Total</th>
					</tr>
				</thead>  
				<tbody>
					<tr>
<?php
					foreach($details as $detail)
					{
?>
					<td><?=$detail['product_id'] ; ?> </td>
					<td><?=$detail['name'] ; ?> </td>
					<td><?=$detail['price'] ; ?> </td>
					<td><?=$detail['quantity'] ; ?> </td>
					<td><?=$detail['total_row'] ; ?> </td>
				</tr>
<?php
					}
?>
				</tbody>
			</table>
			<div id="status">
				<h4>Status : </h4>
			</div>
			<div id="total">
				<p>Subtotal : $ <?= $detail['total_row'] ; ?> </p>
				<p>Shipping : $1 </p>
				<p>Total Price :$ <?= $detail['total_row'] + 1 ; ?>  </p>
			</div>


    	</div>

