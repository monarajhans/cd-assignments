		
<?php
		foreach($products as $product)
		{
?>
			<tr>
			<td><img src="<?=$product['image_thumbnail'] ?>" height="50" width="50"></td> 
			<td><?=$product['id'] ?></td>
			<td><?=$product['name'] ?></td>
			<td><?=$product['inventory'] ?></td>
			<td><?=$product['quantity_sold'] ?></td>
			<td><a href="/dashboard/edit/<?= $product['id'] ?>">edit </a> <a href="/dashboard/delete/<?= $product['id'] ?>">delete</a></td>
			</tr>
<?php		}
?>
		