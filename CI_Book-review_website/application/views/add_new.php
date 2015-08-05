<!DOCTYPE html>
<html>
<head>
	<title>Add Book and Review</title>
</head>

<body>
<?php   if($this->session->userdata("user_session")){
     	$session_user = $this->session->userdata("user_session");
    	 }
?>
	<a href="/main/home">Home</a>
	<a href="/main/log_off">Logout</a>

	<h2>Add a new book title and review:</h2>
	<form method="post" name="action" action="/main/add_book">
		<input type="hidden" name="<?= $session_user['id']; ?>">
		<p>Book Title: </p><input type="textarea" name="name" action="title"><br>
		<p>Author: </p>
		Choose from list:
			<select name="author" action="author">
				<option>Stepehn King</option>
				<option>Mona Rajhans</option>
				<option>Dan Brown</option>
				<option>Chetan Bhagat</option>
			</select>
		<p>Or add a new author: </p><input type="textarea" name="author" action="add_author"><br>
		<p>Review: </p><input type="textarea" name="review" action="review"><br>
		<p>Rating: </p>
			<select  name="rating" action="rating">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select> <br><br>
		<input type="submit" name="add_book_review" value="add_book_review">
	</form>
</body>
</html>