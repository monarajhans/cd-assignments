<h4>Billing Information </h4>
<form id="billing_information" action="/products/payment" method="post" class="form-group col-lg-2" style="width: 400px;">
<!--  Enter /products/billing as the form action. -->
		<input type="checkbox" name="billing_address" value="checkbox">Billing address same as shipping address <br>
		First Name :<input type="text" name="first_name" class="form-control">
		Last Name : <input type="text" name="last_name" class="form-control">
		Address : 	<input type="text" name="address" class="form-control">
		City : 		<input type="text" name="city" class="form-control">
		State : 	<input type="text" name="state" class="form-control">
		Zipcode : 	<input type="text" name="zipcode" class="form-control">
		<input type="submit" value="pay" class="btn btn-default">
</form>