<?php
		if($this->session->flashdata('errors')){
			echo $this->session->flashdata('errors');
			// unset($this->session->flashdata);
		}
		if($this->session->flashdata('success')){
			echo $this->session->flashdata('success');
			// unset($this->session->flashdata);
		}
?>

	<h1>Register</h1>
	<form method="post" action="/main/register">
		<input type="hidden" name="action" value="register">
		Name: <input type="text" name="name"><br>
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		Confirm Password: <input type="password" name="confirm_password"><br>
		<br><input type="submit" value="Register"> <br>
	</form>

		<h1>Login</h1>
	<form method="post" action="/main/login">
		<input type="hidden" name="action" value="login">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		<br><input type="submit" value="login"> <br>
	</form>
</body>
</html>