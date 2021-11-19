<?php include "includes/header.php";
      include "functions.php";
      ob_start();
?>

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
                            Category management
                            <small>author</small>
                        </h1>
                       <div class="col-xs-6">

                       <?php insert_categories(); ?>
                    
                       
                       <form action='' method='post'>
                            add category
                            <div class="form-group">
                                <input class='form-control' type='text' name='cat_title'>
                            </div>
                            <div class="form-group">
                                <input class='btn btn-primary' type='submit' name='submit' value='Add category'>
                            </div>

                        </form>

                        <!-- Update category segment -->
                        <form action='' method='post'>
                            Edit category
                            <div class="form-group">
                                
                            <?php update_categories()?>

                            </div>
                            <div class="form-group">
                                <input class='btn btn-primary' type='submit' name='Update' value='Update' method='post'>
                            </div>

                        </form>

                    </div> <!-- add categories -->
                    <div class='col-xs-6'>

                        <table class='table table-bordered table-hover'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>

<?php 
//Find all categories Query
find_Categories();

//Delete the categories 
    delete_Categories();
 ?>
    </table>
                </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>
