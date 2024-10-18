<nav class="navbar navbar-inverse navbar-fixed-top" style="border-bottom:solid 2px red">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><span style="color:white;font-weight:bold;font-size:20px"><?php echo $_SESSION['cn']; ?></span></a>
		</div>
		
		<div class="collapse navbar-collapse navbar-right">
			<ul class="nav navbar-nav">
				<li><a href="admin_welcome.php">Home</a></li>
				<li><a href="reg.php">Register</a></li>
				<li><a href="logout.php">Logout</a></li> 
			</ul>
		</div>
	</div><!--/.container-->
</nav><!--/nav-->