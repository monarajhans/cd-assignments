<!DOCTYPE html>
<html>
<head>
	<title>User Reviews</title>
</head>
<body>
<?php   if($this->session->userdata("user_session")){
     		$session_user = $this->session->userdata("user_session");
    	 }
    	// $this->main->books_reviewed($session_user['id']);
?>
	<a href="/main/add_new">Add Book and review</a>
	<a href="/main/log_off">Logout</a>

	<p>User alias: <?= $session_user['first_name']; ?></p>
	<p>Name: <?= $session_user['first_name'] . " " . $session_user['last_name']; ?></p>
	<p>Email: <?= $session_user['email']; ?></p>
	<p>Totla reviews: 3</p>

	<p>Posted reviews on the following books</p>
		<ul>
			<?php foreach($book as $value) {
				var_dump($book);
					echo $value['$value'];
					}
			?>
			<li><a href="">Da Vinci Code</a></li>
			<li><a href="">To be continued</a></li>
			<li><a href="">The life of Pi</a></li>
		</ul>
</body>
</html>