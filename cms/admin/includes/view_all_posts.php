<?php include_once "includes/header.php";
      include_once "functions.php";
      ob_start();
?>

<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * from posts";
                            $select_posts = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_posts)){
                                $post_id = $row['Post_id'];
                                $post_author = $row['Post_author'];
                                $post_title = $row['Post_title'];
                                $post_category_id = $row['Post_category_id'];
                                $post_status = $row['Post_status'];
                                $post_image = $row['Post_image'];
                                $post_tags = $row['Post_tags'];
                                $post_comment_count = $row['Post_comment_count'];
                                $post_date = $row['Post_date'];
                                
                                echo "<tr>";
                                echo "<td>{$post_id} </td>";
                                echo "<td> {$post_author}</td>";
                                echo "<td>{$post_title} </td>";
                                
                                //Laat de namen van categories zien ipv de nummers
                                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                                $select_categories_id = mysqli_query($connection,$query);
        
        
                                while($row = mysqli_fetch_assoc($select_categories_id)){
                                $cat_ID = $row["cat_id"];
                                $cat_title = $row["cat_title"];

                                echo "<td>{$cat_title} </td>";}
                               
                               
                                echo "<td>{$post_status} </td>";
                                echo "<td><img class='img-responsive' src='../images/$post_image'> </td>";
                                echo "<td>{$post_tags} </td>";
                                echo "<td>{$post_comment_count} </td>";
                                echo "<td>{$post_date} </td>";
                                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                echo "</tr>";
                            }


                            ?>


                            
                            </tr>
                        </tbody>
                        </table>

                        <?php 

                    // Deleten van content 
                        if(isset($_GET['delete'])){
                        $delete_Post_Id = $_GET['delete'];
                            $query = "DELETE FROM posts WHERE post_id =  {$delete_Post_Id} ";
                            $delete_Query = mysqli_query($connection, $query);
                            header("Location: posts.php");
                        }
                        
                        ?>