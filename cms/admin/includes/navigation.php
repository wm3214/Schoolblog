<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../admin/index.php">CMS Administratie</a>
		</div>

		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			<li> <a href='../index.php'>Home </a> </li>
			<!--
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>			-->
		</ul>
            
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav">
				<li>
					<a href="../admin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
				</li>
				<li>
					<a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
					<ul id="posts_dropdown" class="collapse">
						<li>
							<a href="posts.php">Alle posts</a>
						</li>
						<li>
							<a href="posts.php?source=add_post">Post toevoegen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categorieën</a>
				</li>

				<li >
					<a href="javascript:;" data-toggle="collapse" data-target="#comments"><i class="fa fa-fw fa-file"></i> Comments<i class="fa fa-fw fa-caret-down"></i></a>
					<ul id="comments" class="collapse">
						<li>
							<a href="comments.php"> Alle comments</a>
						</li>
						<li>
							<a href="comments.php?source=allowable">Comments Toestaan</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Gebruikers <i class="fa fa-fw fa-caret-down"></i></a>
					<ul id="users" class="collapse">
					<li>
						<a href="users.php"> Alle gebruikers</a>
					</li>
					<li>
						<a href="users.php?source=add_user">Gebruiker toevoegen</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>
