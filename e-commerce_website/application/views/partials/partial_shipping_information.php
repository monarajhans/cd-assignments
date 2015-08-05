<script>
	$(document).ready(function(){
		$('#shipping_information').submit(function(){
			$.post('/products/billing_information', $(this).serialize(), function(res) {
				$('#shipping_details').html(res);
			}); return false;
		});
	});
</script>
	
<form id="shipping_information" action="" method="post" class="form-group col-lg-2" style="width: 400px;">
<!--  Enter /products/shipping as the form action. -->
		<h4>Shipping Information </h4>
		First Name : <input type="text" name="first_name" class="form-control">
		Last Name : <input type="text" name="last_name" class="form-control">
		Address : <input type="text" name="address" class="form-control">
		City : <input type="text" name="city" class="form-control">
		State : <input type="text" name="state" class="form-control">
		Zipcode : <input type="text" name="zipcode" class="form-control">
				<input type="submit" value="Proceed" class="btn btn-default">
</form>
