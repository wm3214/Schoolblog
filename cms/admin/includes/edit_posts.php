<?php
include_once "functions.php";
if(isset($_GET['p_id'])){
  
$the_post_id = $_GET['p_id'];
    
}

//selecteer alle kolommen voor editen van de post
$query = "SELECT * from posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){
	$post_id = $row['Post_id'];
	$post_author = $row['Post_author'];
	$post_title = $row['Post_title'];
	$post_category_id = $row['Post_category_id'];
	$post_image = $row['Post_image'];
	$post_content = $row['Post_content'];
	$post_tags = $row['Post_tags'];
	$post_comment_count = $row['Post_comment_count'];
	$post_date = $row['Post_date'];
}

//als er op de knop gedrukt wordt, sla waardes op in variabelen
if(isset($_POST['Update_post'])){
	$post_author = $_POST['post_author'];
	$post_title = $_POST['post_title'];
	$post_image = $_FILES['Image']['name'];
	$post_image_temp = $_FILES['Image']['name'];
	$post_content = $_POST['post_content'];
	$post_tags = $_POST['post_tags'];
	$post_category_id = $_POST['post_category'];

	//als post image leeg blijft, geef message aan dat image niet leeg mag blijven
move_uploaded_file($post_image_temp, "../images/$post_image");
if(empty($post_image)){

	$query = "SELECT * FROM posts where post_id = $the_post_id ";
	$select_image = mysqli_query($connection, $query);
	
	while($row = mysqli_fetch_array($select_image)){
		$post_image = $row['Post_image'];
	}
	
}

	//Update query voor posts 
	$query = "UPDATE posts SET ";
	$query .= "post_title = '{$post_title}', ";
	$query .= "post_category_id = '{$post_category_id}', ";
	$query .= "post_date = now(), ";
	$query .= "post_author = '{$post_author}', ";
	$query .= "post_tags = '{$post_tags}', ";
	$query .= "post_content = '{$post_content}', ";
	$query .= "post_image = '{$post_image}' ";
	$query .= "WHERE post_id = '{$the_post_id}'";

	$update_post = mysqli_query($connection, $query);
	confirmQuery($update_post);

	//laat error zien zodra de query niet lukt.
	if(!$update_post){
		die("QUERY FAILED .". mysqli_error($connection));
	}

}
?>



<form action='' method='post' enctype="multipart/form-data">

<div class="form-group">
<label for='post_Title'>Title</label>
<input value='<?php echo $post_title; ?>' type="text" class="form-control" name="post_title">
</div>

<div class="form-group">
<label for='post_Title'> Post Category </label><br>
<select name='post_category' id='' >
<?php

//dynamisch editen van categories in edit pagina
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
    <input value='<?php echo $post_author; ?>' type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
    <img width='100' src='../images/<?php echo $post_image; ?>' alt='' >
</div>

<div class="form-group">
    <label for='post_Image'> Post Image</label>
    <input value='<?php echo $post_image; ?>' type="file" name="Image">
</div>

<div class="form-group">
    <label for='post_Tags'> Post Tags</label>
    <input value='<?php echo $post_tags; ?>' type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for='summernote'> Post Content</label>
    <textarea  class='form-control' name='post_content' id='summernote' cols='30' rows='10'>
    <?php echo $post_content; ?>
</textarea>
</div>

<div class='form-group'>
    <input class='btn btn-primary' type='submit' name='Update_post' value='Bijwerken'>
</div>

</form>
