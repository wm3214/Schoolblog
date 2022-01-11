<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
if(!isset($_POST['login'])){
	header("Location: /index.php");
}
else
{
    $username = $_POST['username'];
    $password = $_POST['password'];

$username = mysqli_real_escape_string($connection, $username );
$password = mysqli_real_escape_string($connection, $password);

    // hashes password
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if (!$select_randsalt_query) {
        die("Query Failed" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    $password = crypt($password,$salt);

$query = "SELECT * FROM users WHERE username = '{$username}'";
$select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("QUERY FAILED". mysqli_error($connection));
    }

while($row = mysqli_fetch_array($select_user_query)) {
    $db_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
}
    // checks if stored hash is the same
if($username !== $db_username && $password !== @$db_user_password) {
    header("Location: ../index.php");
    }   else if ($username == $db_username && $password == @$db_user_password) {
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            header("Location: /admin");
        } else {
            header("Location: /index.php");
}



}
?>
