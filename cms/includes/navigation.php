<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
      
        
        
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"'>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Home</a>
            </div>
            
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
            
            
            <ul class="nav navbar-nav">
                   
            <?php 
            // --- Display categories from MySQL database ---
            $query = "SELECT cat_id, cat_title FROM categories";
            $select_all_categories_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_categories_query)){
				$cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
            } 
            if(isset($_SESSION['user_role']))
            {
				if($_SESSION['user_role'] == "admin")
				{
					echo "<li><a href='admin'>Admin</a></li>";
				}
				//echo "<li><a href='includes/logout.php'>Logout</a></li>";
			}
			else
			{
				echo "<li><a href='registration.php'>Registratie</a></li>";
			}
            ?>
                <li>
                        <a href="#">Contact</a>
                    </li>  


                </ul>  

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
