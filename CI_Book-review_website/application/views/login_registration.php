<?php
		if($this->session->flashdata('errors')){
			echo $this->session->flashdata('errors');
		}

		if($this->session->flashdata('success')){
			echo $this->session->flashdata('success');
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
	<h1>Welcome!</h1>
	
	<h3>Register</h3>
	<form method="post" action="/main/register">
		<input type="hidden" name="action" value="register">
		First name: <input type="text" name="first_name"><br>
		Last name: <input type="text" name="last_name"><br>
		Email: <input type="email" name="email"><br>
		Password: <input type="password" name="password"><br>
		Confirm Password: <input type="password" name="confirm_password"><br>
		<br><input type="submit" value="Register"> <br>
	</form>

		<h3>Login</h3>
	<form method="post" action="/main/login">
		<input type="hidden" name="action" value="login">
		Email: <input type="email" name="email"><br>
		Password: <input type="password" name="password"><br>
		<br><input type="submit" value="login"> <br>
	</form>
</body>
</html>