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
		
		if($row['user_id']  == NULL){
			echo "Anon";
		}
	
		print("<small> ");
		print($row['comment_date']);
		echo "</small></h4>";
		print($row['comment_cont']);                 
		echo "</div></div>";
}}}

?>
