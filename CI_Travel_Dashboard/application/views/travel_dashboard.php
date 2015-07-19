<?php
		if($this->session->flashdata('errors')){
			echo $this->session->flashdata('errors');
		}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<title>Travel Dashboard</title>

<?php   if($this->session->userdata("user_session")){
     		$session_user = $this->session->userdata("user_session");
    	}
?>
</head>

<body>
<a href="/main/log_off">Log off</a>	
<h1>Hello <?= $session_user['name']; ?>!</h1>


<h3>Your trip schedules	</h3>
	<table class="table table-striped" style="width: 700 px;"> 
		<tr>
			<td>Destination</td>
			<td>Travel start date</td>
			<td>Travel end date</td>
			<td>Travel plan</td>
		</tr>
		
<?php 	
	foreach($travel_details as $details)
		{ 
?>	<tr>
		<td><a href="/main/destination/<?= $details['destination']; ?>"><?= $details['destination']; ?></a></td>
		<td><?= $details['date_start']; ?></td>
		<td><?= $details['date_end']; ?></td>
		<td><?= $details['description']; ?></td>
		</tr>	
<?php	} 
?>
	

	</table>

	<h3>Other user's travel plans </h3>
	<table class="table table-striped" style="width: 700 px;">
		<tr>
			<td>Name</td>
			<td>Destination</td>
			<td>Travel start date</td>
			<td>Travel end date</td>
			<td>Do you want to join?</td>
		</tr>
		
<?php	$travelers = $this->session->userdata("other_travelers");
		foreach($travelers as $travelers)
		{
			$name = $travelers['name'];
			$destination = $travelers['destination']; 
?>		<tr>
			<td><?= $travelers['name']; ?></td>
			<td><?= $travelers['destination']; ?></td> 
			<td><?= $travelers['date_start']; ?></td>
			<td><?= $travelers['date_end']; ?></td>
			<td><a href="/main/join/<?= $name; ?>/<?= $destination; ?>">Join</a>
			</td>
		</tr>
<?php	}
?>		
			
		
	</table>

<a href="/main/add_travel">Add travel plan</a>
</body>
</html>