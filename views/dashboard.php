<div class="content">
    <?php
	  include_once 'side_nav.php';
	?>	 
	<div class="container">
	

	<h1> Hello wellcome to Smart አስጠኚ </h1>


	<?php if ($user->role == 3) { ?>
	<a class="btn" href="/jobs">Apply For Job</a>
	<?php }else {?>
	<a class="btn" href="/jobs/add">Create Job</a>				
	<?php } ?>

	</div>
</div>