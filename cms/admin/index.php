<?php include "includes/header.php" ?>

<body>

    <div id="wrapper">


<!-- Navigation --> 
<?php include "includes/navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welkom bij het adminportaal
                            <small>author</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                 
                    <?php 
                    // telt het aantal gemaakte posts (dynamisch)
                    $query = "SELECT Post_id FROM posts";
                    $select_All_Posts = mysqli_query($connection, $query);
                    $post_Counts = mysqli_num_rows($select_All_Posts);

                    echo "<div class='huge'>{$post_Counts}</div>";
                    ?>

                    
                    <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    // telt het aantal gemaakte posts (dynamisch)
                    $query = "SELECT comment_id FROM comments";
                    $select_All_Comments = mysqli_query($connection, $query);
                    $comment_Counts = mysqli_num_rows($select_All_Comments);

                    echo "<div class='huge'>{$comment_Counts}</div>";
                    ?>
  
                    <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                    // telt het aantal gemaakte posts (dynamisch)
                    $query = "SELECT * FROM posts";
                    $select_All_Users = mysqli_query($connection, $query);
                    $user_Counts = mysqli_num_rows($select_All_Users);

                    echo "<div class='huge'> 23</div>";
                    ?>

                      
                    <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        
                    <?php 
                    // telt het aantal gemaakte posts (dynamisch)
                    $query = "SELECT * FROM categories";
                    $select_All_Categories = mysqli_query($connection, $query);
                    $category_Counts = mysqli_num_rows($select_All_Categories);

                    echo "<div class='huge'>{$category_Counts}</div>";
                    ?>
                                        
                    <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->


                <div class='row'>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>
