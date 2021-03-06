<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
<div class="collapse navbar-collapse">

    <!-- Inlog -->
    <div class="well">
		<?php
			if(isset($_SESSION['user_role']))
			{
				echo "<h4>Welkom ";
				echo $_SESSION['firstname'];
				echo "</h4><a href='includes/logout.php'>Uitloggen</a>";	
			}
			else
			{
				echo "
					<h4>Inloggen</h4>
					<form action='includes/login.php' method='post'>
						<div class='form-group'>
							<input name='username' type='text' class='form-control' placeholder='Gebruiker'>
						</div>
						<div class='input-group'>
							<input name='password' type='password' class='form-control' placeholder='Wachtwoord'>
							<span class='input-group-btn'>
								<button class='btn btn-primary' name='login' type='submit'>Login</button>
							</span>
						</div>
					</form><br> 							<!-- A br whoops -->
					<span >Of een account aanmaken? <a href='registration.php'>Klik hier!</a></span>";
			}
        ?>
    </div>


	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<form action="/includes/search.php" method="post">
			<div class="input-group">
				<input name="search" type="text" class="form-control">
				<span class="input-group-btn">
					<button name="submit" class="btn btn-default" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<!-- /.input-group -->
	</div>


	<!-- Blog Categories Well -->
	<div class="well">

	<?php	//Getting all catagories
		$query = "SELECT * FROM categories";
		$select_all_categories_query = mysqli_query($connection,$query);
	?>
	
		<h4>Blog Categorieën</h4>
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-unstyled">
					<?php	//Print all catagories
						while($row = mysqli_fetch_assoc($select_all_categories_query))
						{
							$cat_title = $row["cat_title"];
							$cat_id = $row["cat_id"];
							echo "<li><a href='/category.php?category=$cat_id'> {$cat_title}</a></li>";
						}
					?>
				</ul>
			</div>             
		<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>
	
</div>
</div>
