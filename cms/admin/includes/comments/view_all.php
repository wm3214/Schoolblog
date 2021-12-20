<?php include_once "includes/header.php";
      include_once "functions.php";
      ob_start();
?>
                            
                            <?php 
                            $query = "SELECT * from comments ORDER by post_id";
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
									
									echo "<p>$post_title</p>";
									
									print("
									<table class='table table-bordered table-hover'>
										<thead>
											<tr>
												<th>ID</th>
												<th>Author</th>
												<th>Check</th>
												<th>Date</th>
											<th>Content</th>
										</tr>
									</thead>
									<tbody>");
								} 
								
                                $comment_id = $row['comment_id'];
                                $comment_author = $row['user_id'];
                                if($comment_author == NULL){
									$comment_author = "Anonymous";
								}
								else{
									$query = "SELECT user_name FROM users WHERE user_id = $comment_author";
									$username  = mysqli_query($connection,$query);
									//Database is er nog niet kan ook niet testen
								}
                                $comment_check = $row['comment_check'];
                                $comment_date = $row['comment_date'];
                                $comment_cont = $row['comment_cont'];
                                
                                
                                echo "<tr>";
                                echo "<td>{$comment_id} </td>";
                                echo "<td> {$comment_author}</td>";
                                echo "<td>{$comment_check} </td>";
                                echo "<td>{$comment_date} </td>";
                                echo "<td>{$comment_cont} </td>";
                                echo "<td><a href='comments.php?source=edit_post&p_id={$comment_id}'>Edit</a></td>";
                                echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                echo "</tr>";
                            }


                            ?>


                            
                            </tr>
                        </tbody>
                        </table>

                        <?php 

                    // Deleten van content 
                        if(isset($_GET['delete'])){
                        $delete_comment_id = $_GET['delete'];
                            $query = "DELETE FROM comments WHERE comment_id =  {$delete_comment_id} ";
                            $delete_Query = mysqli_query($connection, $query);
                            header("Location: comments.php");
                        }
                        
                        ?>
