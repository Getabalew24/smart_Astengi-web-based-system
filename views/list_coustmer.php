
<div class="content">
	<?php
	  include_once 'side_nav.php';
	?>	
	<div class="container">
	<table>
		<thead>
			<h2>List of Coustmer</h2>
			<td>NO</td>
			<td>First name</td>
			<td>Last name</td>
			<td>Email</td>
			<td> * </td>
			<td> x</td>
		</thead>
		<tbody>
		<?php foreach ($coustmer as $key => $value) { ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['firstname']; ?></td>
				<td><?php echo $value['lastname']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><a href="/dashboard/update?id=<?php echo $value['id']; ?>">edit</a></td>
				<td><a href="/Coustmer/delete?id=<?php echo $value['id']; ?>">remove</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<a class="btn" href="/Coustmer/register">Add coustmer</a>
</div>
</div>