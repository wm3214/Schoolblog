<?php 
if(isset($_GET['p_id']) AND isset($_POST['comment'])){
	$comment = $_POST['comment'];
	$the_post_id = $_GET['p_id'];
	if($comment != ""){

		$query = "INSERT INTO comments (`post_id`, `comment_cont`) ";
		$query .= "VALUES (
		 '{$the_post_id}',
		 '{$comment}');";
		 
		 $connection->query($query);
		 
		 /*			Debug Query Succes
		if ($connection->query($query) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query. "<br>" . $connection->error;
		}
		*/
	}
}
?>
