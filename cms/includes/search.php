<?php include "header.php";?>
<?php include "db.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
				 $search = "niks";
				if(isset($_POST['submit'])){
					$search =  $_POST['search'];
				}

				$query = "SELECT * FROM posts WHERE Post_tags LIKE '%$search%' ORDER BY Post_date DESC";
				$search_query = mysqli_query($connection, $query);

				if(!$search_query){
					die("QUERY FAILED". mysqli_error($connection));
				}

				$count = mysqli_num_rows($search_query);
			?>


			<h1 class="page-header">
                Alle Resultaten voor <?php echo $search ?>
                <small>
					<?php 
						switch($count)
						{
								case 0:
									echo "Dat zijn er geen";
									break;
								case 1:
									echo "Dat is er een";
									break;
								default:
									echo "Dat zijn er $count";
									break;
						}
					?>
				</small>
			</h1>
            <?php
                if($count != 0)
				{
					while($row = mysqli_fetch_assoc($search_query))
					{
						$post_id = $row['Post_id'];
						$post_title = $row['Post_title'];
						$post_author = $row['Post_author'];
						$post_date = $row['Post_date'];
						$post_image = $row['Post_image'];
						$post_content = substr($row['Post_content'], 0, 300);
						$post_content .= ".....";
						$post_tags = $row['Post_tags'];
						$post_comment_count = $row['Post_comment_count'];
						$post_status = $row['Post_status'];
						?>

                <!-- First Blog Post -->
                <h2>
                    <a href="/post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    Door <a href="index.php"> <?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src= "/images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Lees Meer <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php
            }}

 ?>
 </div>

      

            <!-- Sidebar navigation --> 
            <?php include "sidebar_navigation.php" ?>
        <!-- /.row -->

        <hr>

    <?php include "footer.php";?>
