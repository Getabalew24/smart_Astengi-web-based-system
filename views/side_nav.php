<div class="side-nav">
	<ul class="side-nav-list">
		<?php if ($user->role == 1){ ?>
		<li class="side-nav-item">
		 <a href="/Coustmer">Coustmers</a>
		</li>
		<?php } ?>

		<?php if ($user->role <= 2){ ?>
		<li class="side-nav-item">
		 <a href="/Instructor">Instructor</a>  
		</li>
		<?php } ?>
		<?php if ($user->role != 2){ ?>
		<li class="side-nav-item"><a href="/jobs">Jobs</a></li>
		<li class="side-nav-item"><a href="#">Agrement</a></li>
		<?php } ?>
	</ul>
</div>