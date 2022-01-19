<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
$message = "";
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_control = $_POST['password_control'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    if(empty($username) || empty($password) || empty($password_control) || empty($email) || empty($firstname) || empty($lastname)){
		$message = "Vul alle velden in!";
	}
	elseif($password != $password_control){//Check if password is correct
		$message = "Je wachtwoord komt niet overeen!";
	}
	else{//Check with database for duplicate usernames and emails
		$query = "SELECT username FROM users WHERE username = '$username '";
		$search_query = mysqli_query($connection, $query);
		$username_count = mysqli_num_rows($search_query);
		$query = "SELECT user_email FROM users WHERE user_email = '$email'";
		$search_query = mysqli_query($connection, $query);
		$email_count = mysqli_num_rows($search_query);
		if($username_count > 0){//Check for duplicate Username
			$message = "Gebruikersnaam is al in gebruik";
		}
		elseif($email_count > 0){//Check for duplicate email
			$message = "Email is al in gebruik";
		}
		else{//Make user account
			$username = mysqli_real_escape_string($connection, $username);
			$email = mysqli_real_escape_string($connection, $email);
			$password = mysqli_real_escape_string($connection, $password);
			$firstname = mysqli_real_escape_string($connection, $firstname);
			$lastname = mysqli_real_escape_string($connection, $lastname);

			$query = "SELECT randSalt FROM users";
			$select_randsalt_query = mysqli_query($connection, $query);
			if (!$select_randsalt_query) {
				die("Query Failed" . mysqli_error($connection));
			}
			// Encrypt passwords
			$row = mysqli_fetch_array($select_randsalt_query);
			$salt = $row['randSalt'];
			$password = crypt($password, $salt);

			// Maakt nieuwe "viewer" aan
			$query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) ";
			$query .= "VALUES('{$username}','{$password}','{$firstname}', '{$lastname}','$email','viewer')";
			$register_user_query = mysqli_query($connection, $query);
			if (!$register_user_query) {
				die("QUERY FAILED " . mysqli_error($connection) . '' .
					mysqli_errno($connection));
			}
			$message = "Registratie compleet";
		}
	}
}

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Registratie</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h6 class="text-center"><?php echo $message ?> </h6>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">username</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Voornaam">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">username</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Achternaam">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Je gebruikersnaam">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="jouwemail@voorbeeld.nl">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Wachtwoord">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password_control" id="key" class="form-control" placeholder="Nog een keer je Wachtwoord">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Registreer">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
