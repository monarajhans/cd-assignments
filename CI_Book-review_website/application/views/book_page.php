<!DOCTYPE html>
<html>
<head>
	<title>Add Book and Review</title>

<?php   if($this->session->userdata("user_session")){
     	$session_user = $this->session->userdata("user_session");
    	 }
?>

</head>
<body>
	<h1><?= $book['name']; ?></h1>
	<h3>Author: <?= $book['author']; ?></h3>
	<h2>Reviews:</h2>
	<p>Rating: 
<?php for($i=0; $i<$book['rating']; $i++) 
	{
		echo "*";
	}
?>	</p>

	<p><a href=""><?= $session_user['first_name'] ?></a> says: <?= $book['review']?></p>
	<p>Posted on November 25th, 2014</p>
	<p><a href="">Delete this review</a></p>

	<p>Add a review: </p>
	<form method="post" name="add_a_review" action="/main/add_review/<?= $book['id'] ?>">
		<input type="textarea" name="review">
		<p>Rating: </p>
			<select  name="rating" action="rating">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		<input type="submit" name="submit_review" value="submit_review">
	</form>
</body>
</html>