
<?php
include_once "functions.php";
if(isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    //    $user_image = $_FILES['Image']['name'];
    //    $user_image_temp = $_FILES['Image']['tmp_name'];
    //move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO users (username, user_password, user_firstname,user_lastname,
    user_email, user_role) ";

    $query .= "VALUES ('{$username}',
    '{$user_password}',
    '{$user_firstname}',
    '{$user_lastname}',
    '{$user_email}',
    '{$user_role}')";

    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);
}


?>

<form action='' method='post' enctype="multipart/form-data">

<div class="form-group">
    <label for='user_firstname'> First name</label>
    <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for='user_lastname'> Last name</label>
    <input type="text" class="form-control" name="user_lastname">
</div>
<div class="form-group">
    <label for='username'> username</label>
    <input type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <label for='user_password'> Password</label>
    <br>
    <input type="password" name="user_password">
</div>

<div class="form-group">
    <label for='user_image'> User Image</label>
    <input type="file" name="user_image">
</div>

<div class="form-group">
    <label for='user_email'> User Email</label>
    <input type="text" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for='user_role'> User Role</label>
    <br>
    <select name='user_role' id=''>
        <option value="admin">administrator</option>
        <option value="viewer">viewer</option>
    </select>
</div>

<div class='form-group'>
    <input class='btn btn-primary' type='submit' name='create_user' value='Create User'>
</div>

</form>