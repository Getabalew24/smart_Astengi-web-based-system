
<div class="content">
	<?php
	  include_once 'side_nav.php';
	?>	
	<div class="container">
		<ul>
	<?php foreach ($job as $key => $value) { ?>
		<li><?php echo "$key: ".$value; ?></li>
	<?php } ?>
		</ul>
</div>
</div>