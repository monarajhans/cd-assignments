<!DOCTYPE html>
<html>
<head>
	<title>Destination</title>
</head>
<body>
<?php   if($this->session->userdata("user_session")){
     		$session_user = $this->session->userdata("user_session");
    	}
    	// var_dump($destination_details);die();
?>

<a href="/main/home">Home</a>
<a href="/main/log_off">Logout</a>
<?php 	foreach($destination_details as $details){
			echo '<h1>' . $details['destination'] . '</h1>';
			echo '<p>Planned by: ' . $details['name'] . '<p>';
			echo '<p>Description: ' . $details['description'] . '<p>';
			echo '<p>Travel date from: ' . $details['date_start'] . '<p>';
			echo '<p>Travel date to: ' . $details['date_end'] . '<p>';
			break;
}
?>

<h1>Other users joining the trip:</h1>

<?php 	foreach($destination_details as $details)
		{
			$other_traveler = $details['name'];
				if($other_traveler != $details['name']){
					echo $details['name'] . '<br>';
				}
		}
?>

</body>
</html>