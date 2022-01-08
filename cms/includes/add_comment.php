<?php 
if(isset($_GET['p_id']) AND isset($_POST['comment'])){
	$comment = $_POST['comment'];
	$the_post_id = $_GET['p_id'];
	if($comment != ""){
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$query = "SELECT user_id FROM users WHERE username = '$username'";
			$select_user_query = mysqli_query($connection, $query);

			if(!$select_user_query){
				die("QUERY FAILED". mysqli_error($connection));
			}
			while($row = mysqli_fetch_array($select_user_query)) {
				$user_id = $row['user_id'];
			}
			
			$query = "INSERT INTO comments (`post_id`, `user_id`, `comment_check`, `comment_cont`) ";
			$query .= "VALUES (
			'{$the_post_id}',
			'{$user_id}',
			1,
			'{$comment}');";
		 
			$connection->query($query);
		}
		else
		{
			$query = "INSERT INTO comments (`post_id`, `comment_cont`) ";
			$query .= "VALUES (
			'{$the_post_id}',
			'{$comment}');";
		 
			$connection->query($query);
		 }
		 
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
