<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.image_thumb').click(function(){
			var new_source = $(this).attr('src');
			$('#main_image').attr('src', new_source);
		}); 
		$('#submit').submit(function(){
			$.post('/products/success', $(this).serialize(), function(res) {
				$('#message').html(res);
				$('#message').fadeIn().delay(10000).fadeOut();
			}); // return false;
		});
	});
	</script>
	<style type="text/css">
		#similar_items{
			padding:10px;
			display: inline-block;
			vertical-align: top;
		}
		.items {
			display:inline-block; 
			margin: 10px; 
			text-align: center;
			vertical-align: top;
			width: 13%;
		}
		.price {
	    font-size: 12px;
	    color: #b12704!important;
	    font-weight: bold;
	    text-align: center;
  	}
		#images_content{
			width: 460px;
			display: inline-block;
			vertical-align: top;
		}
		.right-block{
			width: 500px;
			display: inline-block;
  		vertical-align: top;
		}
		.logo {
    	text-align: center;
    	margin: 25px 0;
  	}
	  .nav {
	    height: 50px;
	  }
	  .nav > li > a {
	    color: #000;
	  }
	  h4 {
	  	line-height: 23px;
	  }
	  h5 {
	    line-height: 16px;
	    color: #004b91;
	    font-weight: bold;
	  }
	  #images{
			margin: 50px 0;
	  }
	  .container-fluid {
   	 border-top: 1px solid #eee;
  	} 
	</style>
</head>
<body>
<div class="container">
    <div class="logo"><a href="/"><img src="/assets/logo.gif"></a></div>
    <ul class="nav nav-pills nav-justified">
      <li role="presentation"><a href="/">HOME</a></li>
      <li role="presentation"><a href="/products">WOMEN</a></li>
      <li role="presentation"><a href="/products">PRODUCTS</a></li>
      <li role="presentation"><a href="/products">SALE</a></li>
      <li role="presentation"><a href="/products">NEW ARRIVALS</a></li>
      <li role="presentation"><a href="/products">BEST SELLERS</a></li>
      <li role="presentation"><a href="/products/shopping_cart">Shopping cart (<?= $this->session->userdata('count') ?>)</a></li>
      <li role="presentation"><a href="/main/logoff">LOG OFF</a></li>
    </ul> 

<div class="container-fluid">
  <div class="row">
		<div id="images">
			<div id="images_content">
				<img id="main_image" src="<?= $product['image']; ?>" alt="Picture" height="250" width="250"><br>
				<img class="image_thumb" src="<?= $product['image_thumbnail']; ?>" alt="Picture" height="40" width="40">
				<img class="image_thumb" src="<?= $product['image_left']; ?>" alt="Picture" height="40" width="40">
				<img class="image_thumb" src="<?= $product['image_right']; ?>" alt="Picture" height="40" width="40">
				<img class="image_thumb" src="<?= $product['image_top']; ?>" alt="Picture" height="40" width="40">
				<img class="image_thumb" src="<?= $product['image_bottom']; ?>" alt="Picture" height="40" width="40">
			</div>

			<div class="right-block">
				<h4><?= $product['name']; ?></h4>
				<form method="post" action="/products/update_cart/<?= $product['id']; ?>" id="submit">
							<select>
								<option name="">1 $<?php $price = $product['price'] * 1; echo $price; ?></option>
								<option name="">2 $<?php $price = $product['price'] * 2; echo $price; ?></option>
								<option name="">3 $<?php $price = $product['price'] * 3; echo $price; ?></option>
								<option name="">4 $<?php $price = $product['price'] * 4; echo $price; ?></option>
								<option name="">5 $<?php $price = $product['price'] * 5; echo $price; ?></option>
							</select>
					<input type="submit" value="Buy">
					<input type="hidden" name="buy">
				</form>
				<div id="message"> </div>
				<div id="description">
					<p><?= $product['description']; ?></p>
				</div>
			</div>	
		</div>
	
		<h2>Look for Similar Items</h2>
		<div id="similar_items">
			<?php for($i=0; $i<6; $i++) { ?>
			<div class="items">
				<img src="<?= $similar_products[$i]['image']; ?>" alt="Picture" height="100" width="100">
				<p><a href="/products/show/<?= $similar_products[$i]['id']; ?>"><?= $similar_products[$i]['name']; ?></a></p>
				<span class="price">$<?= $similar_products[$i]['price']; ?></span>
		</div>	

<?php }?>	
	</div>
</div>
	</div>
</body>
</html>