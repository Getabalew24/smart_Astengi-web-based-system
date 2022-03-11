<!DOCTYPE html>
<html>
<head>
	<title> SMART አስጠኚ</title>
	<style type="text/css">
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			/*border: 1px solid red;*/
		}
		h1{
			margin-bottom: 2em;
		}
		.nav {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			align-content: space-between; 
			background: teal;
			font-family: monospace;
			font-weight: bolder;
		}
		
		.c-name {
			align-self: center;
			margin: 0 0.5rem;
			font-size: 2rem;
		}

		.c-name a {
			text-decoration: none;
			color: #fff;
		}
		.nav-list {
			display: flex;
			list-style: none;
			justify-content: space-between;
			font-size: 1rem;
			margin-right:2rem ;
		}
		.nav-item {
			margin: 0.5rem;
			padding: 0.5rem 0.5rem;
			background: rgba(255, 255, 255, 0.5);
			box-shadow: 0.01rem 0.01rem 0.25rem rgba(255, 255, 255, 0.5);
		}

		.nav-link {
			text-decoration: none;
			color: #000;
		}
		.logout {
			background: rgb(255, 128, 128);
			color: #fff;
		}
		.content {
			display: flex;
		}
		.side-nav {
			width: 15vw;
			padding: 0.05rem 0rem;
			height: 92vh;
			background: rgb(225, 225, 225);
		}
		.side-nav-item {
			list-style: none;
			display: flex;
		}
		.side-nav-item a {
			width: 100%;
			padding: 0.5rem 1.2rem;
			margin: 0.25rem 0.25rem;
			background: rgba(0, 0, 0, 0.2);
			text-decoration: none;
			font-family: monospace;
			font-weight: bolder;
			font-size: 1rem;
			color: #000;
		}
		.container {
			padding: 2rem;
			width: 100%;
		}
		.btn {
			background: teal;
			text-decoration: none;
			padding: 0.75rem;
			margin: .5rem 0;
			color: #fff;
			font-family: sans-serif;
			font-weight: bolder;
			font-variant: small-caps;
			border-radius: 5px;
		}

		.btn-ins {
			background: teal;
			text-decoration: none;
			padding: 0.25rem;
			margin: .5rem 0;
			color: #fff;
			font-family: sans-serif;
			font-weight: bolder;
			font-variant: small-caps;
			border-radius: 5px;
		}

		table {
		  border-collapse: collapse;
		  width: 100%;
		  border: 1px solid #ddd;
		  margin: 2rem 0;
		}

		th, td {
		  text-align: left;
		  padding: 16px;
		}

		tbody tr:nth-child(odd) {
			background: lightgray;
		}

		.form-group {
			padding: 0.2rem;
			margin-left: 2rem;
		}
		label {
			font-family: monospace;
			font-variant: small-caps;
		}
		input {
			padding: 2px;
		}

		#####################################################################
		.dropbtn {
		  background: rgba(255, 255, 255, 0.5);
		  /*background-color: #3498DB;*/
		  color: white;
		  padding: 0.5rem 0.5rem;
		  font-size: 16px;
		  border: none;
		  cursor: pointer;
		  margin: 0.5rem;
		  box-shadow: 0.01rem 0.01rem 0.25rem rgba(255, 255, 255, 0.5);
		}

		/*.dropbtn:hover, .dropbtn:focus {
		  background-color: #2980B9;
		}*/

		/*.dropdown {
		  position: relative;
		  display: inline-block;
		}*/

		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f1f1f1;
		  min-width: 160px;
		  overflow: auto;
		  z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		}

		.dropdown a:hover {background-color: #ddd;}

		.show {display: block;}
	</style>
</head>
<body>
	<header>
		<nav class="nav">
			<div class="c-name"><a href="/">SMART አስጠኚ</a></div>
			<ul class="nav-list">
				<li class="nav-item"><a class="nav-link" href="/dashboard">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="/contact">Contuct</a></li>
				<li class="nav-item"><a class="nav-link" href="/about">About</a></li>
				
				<?php use app\core\Application; ?>

				<?php if (Application::$app->isAuthenticated()) { ?>

				<div class="dropdown  ">
					  <button onclick="myFunction()" class="dropbtn nav-item nav-link">Dropdown</button>
					  <div id="myDropdown" class="dropdown-content">
						    
						    <a class = "nav-link" href="#">Change Password</a>
						    <a class = "nav-link" href="/logout">Logout</a>
					  </div>
				</div>
				<?php }  else { ?>
	
				<li class="nav-item "><a class="nav-link" href="/login">Login</a></li>
				<?php } ?>
			</ul>
		</nav>
	</header>

	{{content}}
<script>

	function myFunction() {
	  document.getElementById("myDropdown").classList.toggle("show");
	}

	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {
	    var dropdowns = document.getElementsByClassName("dropdown-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show')) {
	        openDropdown.classList.remove('show');
	      }
	    }
	  }
	}
</script>

</body>

</html>