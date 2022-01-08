<?php 

if(isset($_GET['p_id'])){
				            
$query = "SELECT * FROM comments WHERE post_id = $the_post_id "; 
$select_all_comments = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_all_comments)){
	if($row['comment_check'] == 1){
		print("
			<div class='media'>
			<a class='pull-left' href='#'>
			<img class='media-object'  src='http://placehold.it/64x64' alt=''>
			</a>
			<div class='media-body'>
			<h4 class='media-heading'>
			");
		$user_id = $row['user_id'];
		if($user_id  == NULL){
			echo "Gast";
		}
		else{
			$query = "SELECT user_firstname FROM users WHERE user_id = $user_id";
			$select_user_query = mysqli_query($connection, $query);
			while($user_row = mysqli_fetch_array($select_user_query)) 
			{
				$user_name = $user_row['user_firstname'];
			}
			echo $user_name;
			
		}
		
		
	
		print("<small> ");
		print($row['comment_date']);
		echo "</small></h4>";
		print($row['comment_cont']);                 
		echo "</div></div>";
}}}

?>
