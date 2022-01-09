<!DOCTYPE html>
<html lang="en">

<?php include "includes/header.php";?>
<?php include "includes/db.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 

          // category filter voor de tags
            $post_category_id = "NULL";
            $category_name = "niks";
            if(isset($_GET['category'])){
                $post_category_id = $_GET['category'];
                $query = "SELECT cat_title FROM categories WHERE cat_id = $post_category_id"; 
                $select_categories = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_categories))
                {
					$category_name = $row['cat_title'];
				}
            }

            $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ORDER BY Post_date DESC"; 
            $select_all_posts = mysqli_query($connection,$query);
            $category_count = mysqli_num_rows($select_all_posts);  
             ?>


<h1 class="page-header">
                    Alle <?php echo $category_name ?> posts
                    <small>
						<?php 
							switch($category_count)
							{
									case 0:
										echo "Geen posts";
										break;
									case 1:
										echo "Dat is er een";
										break;
									default:
										echo "Dat zijn er $category_count";
										break;
							}
						?>
						</small>
                </h1>
                
                <?php
                while($row = mysqli_fetch_assoc($select_all_posts))
				{
					$post_id = $row['Post_id'];
					$post_title = $row['Post_title'];
					$post_author = $row['Post_author'];
					$post_date = $row['Post_date'];
					$post_image = $row['Post_image'];
					// content op de website is truncated naar 50 karakters
					$post_content = substr($row['Post_content'], 0, 300);
					$post_content .= ".....";
					$post_tags = $row['Post_tags'];
					$post_comment_count = $row['Post_comment_count'];
					$post_status = $row['Post_status'];
				?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    Door <a href="index.php"> <?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src= "images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Lees Meer <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php }

                
                
                ?>








                
            </div>

            <!-- Sidebar navigation --> 
            <?php include "includes/sidebar_navigation.php" ?>
        <!-- /.row -->

        <hr>

    <?php include "includes/footer.php";?>
