<!DOCTYPE html>
<html>
<head>
	<title>Add Plan</title>
</head>

<body>

<a href="/main/home">Home</a>
<a href="/main/log_off">Logout</a>

	<h1>Add a trip</h1>
	<form method="post" action="/main/add_plan">
		<input type="hidden" name="add_plan" value="add_plan">
		<p>Destination: </p><input type="text" name="destination">
		<p>Description: </p><input type="text" name="description">
		<p>Travel date from: </p><input type="date" name="date_start">
		<p>Travel date to: </p><input type="date" name="date_end">	
							   <input type="submit" name="add" value="Add">	
	</form>
</body>
</html>