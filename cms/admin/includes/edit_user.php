
<?php

if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

$query = "SELECT * from users WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_users_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}}

include_once "functions.php";
if(isset($_POST['edit_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    //KOMT LATER!!!!!!!!!!!
    //    $user_image = $_FILES['Image']['name'];
    //    $user_image_temp = $_FILES['Image']['tmp_name'];
    //move_uploaded_file($post_image_temp, "../images/$post_image");

    //Update query voor posts
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_image = '{$user_image}' ";
    $query .= "WHERE user_id = '{$the_user_id}'";

    $update_user = mysqli_query($connection, $query);
    confirmQuery($update_user);
}


?>

<form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for='user_firstname'> First name</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for='user_lastname'> Last name</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for='username'> username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for='user_password'> Password</label>
        <br>
        <input type="password" value="<?php echo $user_password; ?>" name="user_password">
    </div>

    <div class="form-group">
        <label for='user_image'> User Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for='user_email'> User Email</label>
        <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for='user_role'> User Role</label>
        <br>
        <select name='user_role' id=''>
            <option value= 'viewer'> <?php echo $user_role ?> </option>
            <?php
                if ($user_role == 'admin') {
                    echo "<option value='viewer'>Viewer</option>";
                }
                 else {
                     echo "<option value='admin'>Administrator</option>";}
            ?>
        </select>
    </div>

    <div class='form-group'>
        <input class='btn btn-primary' type='submit' name='edit_user' value='Save Changes'>
    </div>

</form>