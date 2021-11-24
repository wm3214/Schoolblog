


<!DOCTYPE html>
<html lang="en">

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
    if(isset($_POST['submit'])){
    $search =  $_POST['search'];


    $query = "SELECT * FROM posts WHERE Post_tags LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query){
        die("QUERY FAILED". mysqli_error($connection));
    }


    $count = mysqli_num_rows($search_query);
    if($count == 0){
        echo "<h1> NO RESULTS </h1>";
    } else {
        $query = "SELECT * FROM posts"; 
        $select_all_posts = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($search_query)){
            $post_title = $row['Post_title'];
            $post_author = $row['Post_author'];
            $post_date = $row['Post_date'];
            $post_content = $row['Post_content'];
            $post_tags = $row['Post_tags'];
            $post_comment_count = $row['Post_comment_count'];
            $post_status = $row['Post_status'];
         
            }
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
                by <a href="index.php">Start <?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src= "images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo $post_content; ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            </div>

<?php
            }}

 ?>

      

            <!-- Sidebar navigation --> 
            <?php include "sidebar_navigation.php" ?>
        <!-- /.row -->

        <hr>

    <?php include "footer.php";?>
