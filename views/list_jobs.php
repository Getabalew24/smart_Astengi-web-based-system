<div class="content">
	<?php
	  include_once 'side_nav.php';
	?>	
	<div class="container">
		<table id="table">
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
					<td><a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/jobs/detail?id=<?php echo $value['id']; ?>">Detail</a></td>
					<?php if ($user->role == 1) { ?>
					<td><a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/jobs/update?id=<?php echo $value['id']; ?>">edit</a></td>
					<td><a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/jobs/delete?id=<?php echo $value['id']; ?>">remove</a></td>
					<?php } ?>
					<td>
					<?php if ($user->role == 3 &&  !in_array($value['id'], $applyed)) { echo $value['id'];?>
						<form action="/Instructor/apply_job" method="post">
							<input type="hidden" name="job" value="<?php echo $value['id'] ?>">
							<button class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  type="submit" class="btn" href="/Instructor/apply_job">Apply Job</button>
						</form>
					<?php } else { ?>
						<?php if ($user->role == 3){ ?> 
						Applied<?php } ?>
					<?php } ?>
					</td>


				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php if ($user->role == 1) { ?>
		<a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/jobs/add">Post New Job</a>
		<?php } ?>
	</div>
</div>
