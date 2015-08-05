<?php
		foreach($users as $user)
		{
?>		
		<tr>
			<td><a href="dashboard/user/<?= $user['user_id'] ?>"><?= $user['id'] ?> </a></td>
			<td><?= $user['first_name'] ; ?> </td>
			<td><?= $user['created_at'] ; ?> </td>
			<td><?= $user['user_address'] ; ?> </td>
			<td><?= $user['total_row'] ; ?> </td>
			<td><?= $user['status'] ; ?> </td>
			<td>		
			<form action="/dashboard/change_status/" method="post" class="status-change">
			<input type="hidden" name="order_id" class="order">	
			<input type="hidden" name="user_id" class="user" >
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