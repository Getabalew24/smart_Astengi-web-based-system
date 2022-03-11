<div class="content">
	<?php
	  include_once 'side_nav.php';
	?>	
	<div class="container">
	<h2>List of Instructor</h2>
	<table>
		<thead>
			<td>NO</td>
			<td>First name</td>
			<td>Last name</td>
			<td>Email</td>
			<td> * </td>
			<td> x</td>
		</thead>
		<tbody>
		<?php foreach ($instructor as $key => $value) { ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['firstname']; ?></td>
				<td><?php echo $value['lastname']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<?php if ($user->role ==1){ ?> 
				<td><a href="/dashboard/update?id=<?php echo $value['id']; ?>">edit</a></td>
				<td><a href="/Coustmer/delete?id=<?php echo $value['id']; ?>">remove</a></td>
				<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<?php if ($user->role ==1) { ?>
	<a class="btn" href="/Instructor/register">Add Instructor</a>
	<?php }?>
</div>
</div>