
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
				<td><a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1" href="/dashboard/update?id=<?php echo $value['id']; ?>">edit</a></td>
				<td><a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/Coustmer/delete?id=<?php echo $value['id']; ?>">remove</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/Coustmer/register">Add coustmer</a>
</div>
</div>