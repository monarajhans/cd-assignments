<!--Partial for loading all users in the dashboard  -->
<?php
		foreach($details as $detail)
		{
?>
		<tr>
			<td><a href="dashboard/user/<?= $detail['user_id'] ?>"><?= $detail['id'] ?> </a></td>
			<td><?= $detail['first_name'] ; ?> </td>
			<td><?= $detail['created_at'] ; ?> </td>
			<td><?= $detail['user_address'] ; ?> </td>
			<td><?= $detail['total_row'] ; ?> </td>
			<td><?= $detail['status'] ; ?> </td>
			<td>		
			<form  id="hi" action="/dashboard/change_status/<?= $detail['id'] ?>" method="post" class="status-change">
				<input type="hidden" name="order_id" class="order <?= $detail['id'] ?>"	value="<?= $detail['id'] ?>">	
				<input type="hidden" name="user_id" class="user <?= $detail['user_id'] ?>"  value="<?= $detail['user_id'] ?>">
					<select class="form-control" name="status-change" id="status">
	    					<option value="">Please select</option>
	  						<option value="order-in-process">order in process</option>
	  						<option value="shipped">shipped</option>
	  						<option value="cancelled">cancelled</option>
					</select>
			</form>
			</td>
				
		</tr>
<?php
		}	
?>