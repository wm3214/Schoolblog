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
                            Post management
                            <small>author</small>
                        </h1>
<?php 

//verwijzing naar de users pagina
if(isset($_GET['source'])){
$source = $_GET['source'];
} else{
$source = '';
}
switch($source) {
    case 'add_user';
    include "includes/add_user.php";
    break;

    case 'edit_user';
    include "includes/edit_user.php";
    break;

    default:
    include "includes/view_all_users.php";
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
