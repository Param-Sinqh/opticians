<nav style="box-shadow: 0 2px 10px lightgray;" class="navbar navbar-expand-md navbar-light bg-white fixed-top">
	<div class="container">
		<a class="navbar-brand" href="admin_home.php">
			<span style=" font-weight:bold; font-size:20px;">
				Administrator
			</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
			aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav ml-auto">

				<li class="nav-item"><a class="nav-link" href="admin_home.php">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="reg.php">Register</a></li>

				<li class="nav-item">
					<a class="nav-link" href="backend/logout.php"
						onclick="return confirm('Are you sure you want to logout?');">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>