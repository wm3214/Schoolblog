<?php include "includes/header.php";
      include "functions.php";
      ob_start();
?>
<?php  // Deleting & Allowing Comment 
if(isset($_GET['delete']))
{
	$delete_comment_id = $_GET['delete'];
	$query = "DELETE FROM comments WHERE comment_id =  {$delete_comment_id} ";
	$delete_Query = mysqli_query($connection, $query);
}
if(isset($_GET['allow']))
{
	$allow_comment_id = $_GET['allow'];
	$query = "UPDATE comments SET comment_check = 1 WHERE comment_id =  {$allow_comment_id} ";
	$allow_Query = mysqli_query($connection, $query);
}
  
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
                            Comments Management
                        </h1>
<?php 

//verwijzing naar comments
if(isset($_GET['source'])){
$source = $_GET['source'];
} else{
$source = '';
}
switch($source) {
	case 'edit';
    include "includes/comments/edit.php";
    break;
    
    case 'allowable';
    include "includes/comments/view_allowable.php";	
    break;

    default:
    include "includes/comments/view_all.php";
    break;
}




?>
                        </table>
                       <div class="col-xs-6">



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>
