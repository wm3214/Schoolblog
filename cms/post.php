<!DOCTYPE html>
<html lang="en">

<?php include "includes/header.php";?>
<?php include "includes/db.php"; ?>


<body>
<?php include "includes/add_comment.php"; ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
            if(isset($_GET['p_id'])){
              $the_post_id = $_GET['p_id'];
            }
            
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id "; 
            $select_all_posts = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts)){
                $post_title = $row['Post_title'];
                $post_author = $row['Post_author'];
                $post_date = $row['Post_date'];
                $post_image = $row['Post_image'];
                $post_content = $row['Post_content'];
                $post_tags = $row['Post_tags'];
                $post_comment_count = $row['Post_comment_count'];
                $post_status = $row['Post_status'];
             ?>


<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"> <?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src= "images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                

                <hr>

                <?php }

                
                
                ?>


                
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" maxlength="255" name="comment"></textarea>
                        </div>
                        <input type="hidden" value="<?php echo $_GET['p_id']; ?>" name="p_id">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

				<?php include "includes/comments.php"; ?>

                
            </div>

            <!-- Sidebar navigation --> 
            <?php include "includes/sidebar_navigation.php" ?>
        <!-- /.row -->

        <hr>

    <?php include "includes/footer.php";?>
