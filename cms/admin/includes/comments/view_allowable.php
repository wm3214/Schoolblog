<?php include_once "includes/header.php";
      include_once "functions.php";
      ob_start();
?>
                            
<?php 
		$query = "SELECT * from comments WHERE comment_check = 0 ORDER by post_id";
		$select_comments = mysqli_query($connection, $query);
		
		$post_id = 0;
		$first_post = true;
		
		while($row = mysqli_fetch_assoc($select_comments)){
			if($post_id != $row['post_id']){
				$post_id = $row['post_id'];
				$query = "SELECT Post_title FROM posts WHERE Post_id = $post_id";
				$post_titles  = mysqli_query($connection,$query);
				
				$post_title = "";
				while($titles = mysqli_fetch_assoc($post_titles)){
					$post_title = $titles['Post_title'];
				}
				if(!$first_post){
					print("
								</tr>
							</tbody>
						</table>");
				}
				else{
					$first_post = false;
				}
				
				echo "<h4>$post_title</h4>";
				
				print("
				<table class='table table-bordered table-hover'>
					<thead>
						<tr>
							<th>Gebruiker</th>
							<th>Datum</th>
						<th>Content</th>
					</tr>
				</thead>
				<tbody>");
			} 
			
			$comment_id = $row['comment_id'];
			$comment_author = $row['user_id'];
			if($comment_author == NULL){
				$comment_author = "Gast";
			}
			else{
				$query = "SELECT * FROM users WHERE user_id = $comment_author";
				$username  = mysqli_query($connection,$query);
				while($names = mysqli_fetch_assoc($username)){
					$comment_author = $names['username'];
				}
			}
			$comment_date = $row['comment_date'];
			$comment_cont = $row['comment_cont'];
			
			
			echo "<tr>";
			echo "<td> {$comment_author}</td>";
			echo "<td>{$comment_date} </td>";
			echo "<td>{$comment_cont} </td>";
			echo "<td><a href='comments.php?source=allowable&allow={$comment_id}'>Toestaan</a></td>";
			echo "<td><a href='comments.php?source=allowable&delete={$comment_id}'>Delete</a></td>";
			echo "</tr>";
		}
		?> 
		</tr>
	</tbody>
</table>

