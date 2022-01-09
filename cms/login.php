<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Login</h1>
                    <form role="form" action='includes/login.php' method="post" id="login-form">
                        <div class="form-group">
                            <label for="username" class="sr-only">Gebruikersnaam</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Gebruikersnaam">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Wachtwoord</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Wachtwoord">
                        </div>
                        <input type="submit" name="login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<?php include "includes/footer.php";?>
