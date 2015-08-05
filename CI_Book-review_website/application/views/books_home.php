<!DOCTYPE html>
<html>
<head>
	<title>Books Home</title>
</head>
<body>
<?php   if($this->session->userdata("user_session")){
     	$session_user = $this->session->userdata("user_session");
    	 }
?>

<h3>Welcome, <?= $session_user['first_name']; ?>!</h3>

<a href="/main/add_new">Add Book and review</a>
<a href="/main/log_off">Logout</a>

<h2>Recent Book Reviews:</h2>
	<p><a href="">The Greatest Salesman in the World</a></p>
	<p>Rating: ***</p>
	<p><a href="">Jerry</a> says: Very inspirational book.</p>
	<p>Posted on November 23, 2014</p>

<h2>Other books with Reviews:</h2>
<?php   $i = 0;

			foreach($details as $details){
			if($i < 3) {
	    	 	echo "<a href=''>" . $details['name'] . "</a><br>";
	    	 	echo "<a href='/main/user_reviews'>" . $details['first_name'] .  "</a> says: ";
	    	 	echo $details['review'] . "<br>";
	    	 	echo "Rating: " . $details['rating'] . "<br>";
	    	 	$i++;
	    	 }
	    	 	else{
	    	 		die();
	    	 	}
	    	 }
?>
	<p><a href="/main/book_page/23">Harry Potter</a></p>
	<p><a href="/main/book_page/10">To be continued</a></p>
	<p><a href="/main/book_page/22">Love story</a></p>
</body>
</html>