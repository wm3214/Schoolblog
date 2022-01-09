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
			
			<h1 class="page-header">
				Welkom bij mijn schoolblog
			</h1>
            
            <?php 
            // Laat alle posts zien die zijn aangemaakt. 
            $query = "SELECT * FROM posts ORDER BY Post_date DESC"; 
            $select_all_posts = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts)){
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
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Lees Meer<span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php }

                
                
                ?>








                
            </div>

            <!-- Sidebar navigation --> 
            <?php include "includes/sidebar_navigation.php" ?>
        <!-- /.row -->

        <hr>

    <?php include "includes/footer.php";?>
