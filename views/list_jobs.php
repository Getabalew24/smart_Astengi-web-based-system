<div class="content">
	<?php
	  include_once 'side_nav.php';
	?>	
	<div class="container">
		<table>
			<thead>
				<td>NO</td>
				<td>Name_of_student</td>
				<td>GradeLevel</td>
				<td>No_student</td>
				<td>Salary</td>
				<?php if ($user->role < 3) { ?>
				<td> Detail </td>
				<td> * </td>
				<td> x</td>
				<?php } ?>
			</thead>
			<tbody>
			<?php foreach ($jobs as $key => $value) { ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $value['Name_of_student']; ?></a></td>
					<td><?php echo $value['gradeLevel']; ?></td>
					<td><?php echo $value['No_student']; ?></td>
					<td><?php echo $value['Salary']; ?></td>
					<td><a href="/jobs/detail?id=<?php echo $value['id']; ?>">Detail</a></td>
					<?php if ($user->role == 1) { ?>
					<td><a href="/jobs/update?id=<?php echo $value['id']; ?>">edit</a></td>
					<td><a href="/jobs/delete?id=<?php echo $value['id']; ?>">remove</a></td>
					<?php } ?>
					<?php if ($user->role == 3) { ?>
					<td><a class="btn" href="/jobs">Apply Job</a></td>
					<?php } ?>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php if ($user->role == 1) { ?>
		<a class="btn" href="/jobs/add">Post New Job</a>
		<?php } ?>
	</div>
</div>
