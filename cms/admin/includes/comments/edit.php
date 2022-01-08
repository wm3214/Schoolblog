<?php
if(isset($_GET['edit'])){
  
$comment_id = $_GET['edit'];
    
}

$query = "SELECT * from comments WHERE comment_id = $comment_id";
$select_comment = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_comment)){
	$comment_check = $row['comment_check'];
	$comment_content = $row['comment_cont'];
	$comment_post = $row['post_id'];
	$comment_date = $row['comment_date'];
	
	$query = "SELECT Post_title from posts WHERE Post_id = $comment_id";
	$select_post = mysqli_query($connection, $query);
	while($rotwo = mysqli_fetch_assoc($select_post)){
		$comment_post = $rotwo['Post_title'];
	}
	
	$comment_author = $row['user_id'];
	if($comment_author == NULL)
	{
		$comment_author = "Gast";
	}
	else
	{
		$query = "SELECT username from users WHERE user_id = $comment_author";
		$select_user = mysqli_query($connection, $query);
		while($rotwo = mysqli_fetch_assoc($select_user)){
			$comment_author = $rotwo['username'];
		}
	}
}

//Save Edit
if(isset($_POST['Update'])){
	$comment_check = $_POST['comment_check'];
	$comment_content = $_POST['comment_content'];

	//Update query
	$query = "UPDATE comments SET ";
	$query .= "comment_check = {$comment_check}, ";
	$query .= "comment_cont= '{$comment_content}'  ";
	$query .= "WHERE comment_id = {$comment_id}";

	$update = mysqli_query($connection, $query);
	confirmQuery($update);

	//laat error zien zodra de query niet lukt.
	if(!$update){
		die("QUERY FAILED .". mysqli_error($connection));
	}

}
?>



<form action='' method='post' enctype="multipart/form-data">

<div class="form-group">
    <label> Comment Editor</label>
    <p>ID : <?php echo $comment_id;?></p>
    <p>Post : <?php echo $comment_post;?></p>
    <p>Gebruiker : <?php echo $comment_author;?></p>
    <p>Datum : <?php echo $comment_date;?></p>
</div>

<div class="form-group">
   <select name='comment_check' id='' >
	   <option value='1' >Toestaan</option>
	   <option value='0' >Niet Toestaan</option>
    </select>
</div>

<div class="form-group">
    <label for='comment_content'>Content</label>
    <textarea  class='form-control' name='comment_content' id='' cols='30' rows='10' maxlength="255">
    <?php echo $comment_content; ?>
</textarea>
</div>

<div class='form-group'>
    <input class='btn btn-primary' type='submit' name='Update' value='Bijwerken'>
</div>

</form>
