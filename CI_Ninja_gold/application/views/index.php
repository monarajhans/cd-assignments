<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<style type="text/css">
	.Box{
		height: 100px;
		width: 100px;
		border: 1px solid black;
		text-align: center;
		display: inline-block;
		vertical-align: top;
		margin: 5px;
	}
	#container{
		text-align: center;
		margin: auto;
		display: inline-block;
	}
	#activity{
		width: 400px;
		height: 200px;
		border: 2px solid black;
	}
	</style>
</head>

<body>

<h1>Welcome to Ninja Gold! Start mining! All the gold ;)</h1>
<p>Your Gold: <?= $this->session->userdata('final'); ?></p>

<div id="container">
	<div class="Box">
		Farm (earns 10-20 gold)
		<form method="post" action="results">
		<input type="hidden" name="place" value="farm">
		<input type="submit" value="Find Gold!">
		</form>
	</div>
	<div class="Box">
		Cave (earns 5-10 gold)
		<form method="post" action="results">
		<input type="hidden" name="place" value="cave">
		<input type="submit" value="Find Gold!">
		</form>
	</div>
	<div class="Box">
		House (earns 10-20 gold)
		<form method="post" action="results">
		<input type="hidden" name="place" value="house">
		<input type="submit" value="Find Gold!">
		</form>
	</div>
	<div class="Box">
		Casino (earns/loses 0-50 gold)
		<form method="post" action="results">
		<input type="hidden" name="place" value="casino">
		<input type="submit" value="Find Gold!">
		</form>
	</div>

	
	<div id="activity">
	Activities:	
	<?php 
	// 	if ($this->session->userdata('status')) {
	// 		echo $this->session->userdata('status'); 
	// }
		var_dump($this->session->userdata('status'));
	 ?>
		
	</div>
		<form method="post" action="results" name = "game1">
			<input type="hidden" name="action" value="reset">	
			<input type="submit" value="Play Again">
		</form>
</div>
</body>
</html>