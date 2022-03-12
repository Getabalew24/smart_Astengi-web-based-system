<div class="content">
    <?php
	  include_once 'side_nav.php';
	?>	 
	<div class="container">
	

	<h1> Hello wellcome to Smart አስጠኚ </h1>


	<?php if ($user->role == 3) { ?>
	<a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/jobs">Apply For Job</a>
	<?php }else {?>
	<a class="u-align-center u-border-none u-btn u-btn-round u-button-style u-palette-1-dark-1 u-radius-10 u-text-black u-btn-1"  href="/jobs/add">Create Job</a>				
	<?php } ?>

	</div>
</div>