
<?php
include_once "functions.php";
if(isset($_POST['create_post'])) {
    
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_Status'];
    $post_image = $_FILES['Image']['name'];
    $post_image_temp = $_FILES['Image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    //move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts (post_category_id, 
    post_title, post_author, post_date,post_image,
    post_content, post_tags, post_comment_count, post_status) ";
    
    $query .= "VALUES ('{$post_category_id}',
    '{$post_title}', 
    '{$post_author}',
    now(),
    '{$post_image}',
    '{$post_content}',
    '{$post_tags}',
    '{$post_comment_count}', 
    '{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);
    confirmQuery($create_post_query);
}


?>

<form action='' method='post' enctype="multipart/form-data">

<div class="form-group">
    <label for='post_Title'> Post Title</label>
    <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <label for='post_category'> Post Category</label><br>
   <select name='post_category' id='post_category' >
        <?php
        
        //dynamisch editen van categories in add pagina
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        
        confirmQuery($select_categories);
        
        while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row["cat_id"];
            $cat_title = $row["cat_title"];
        
            echo " <option value='{$cat_id}' >{$cat_title}</option>";
        }
        ?>
       
    </select>
</div>

<div class="form-group">
    <label for='post_Author'> Post author</label>
    <input type="text" class="form-control" name="author">
</div>

<div class="form-group">
    <label for='Post_Status'> Post Status</label>
    <input type="text" class="form-control" name="post_Status">
</div>

<div class="form-group">
    <label for='post_Image'> Post Image</label>
    <input type="file" name="Image">
</div>

<div class="form-group">
    <label for='post_Tags'> Post Tags</label>
    <input type="text" class="form-control" name="tags">
</div>

<div class="form-group">
    <label for='summernote'> Post Content</label>
    <textarea class='form-control' name='post_content' id='summernote' cols='30' rows='10'>
</textarea>
</div>

<div class='form-group'>
    <input class='btn btn-primary' type='submit' name='create_post' value='Verzenden'>
</div>

</form>