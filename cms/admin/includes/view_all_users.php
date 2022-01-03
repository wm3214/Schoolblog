<?php include_once "includes/header.php";
      include_once "functions.php";
      ob_start();
?>

<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>user_id</th>
                                    <th>username</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>email</th>
                                    <th>image</th>
                                    <th>role</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * from users";
                            $select_users = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_users)){
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_password = $row['user_password'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_image = $row['user_image'];
                                $user_role = $row['user_role'];
                                
                                echo "<tr>";
                                echo "<td>{$user_id} </td>";
                                echo "<td> {$username}</td>";
                                echo "<td>{$user_firstname} </td>";
                                echo "<td>{$user_lastname} </td>";
                                echo "<td>{$user_email} </td>";
                                echo "<td>{$user_image} </td>";
                                echo "<td>{$user_role} </td>";
                                
                                //Laat de namen van categories zien ipv de nummers
                            ##    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            ##    $select_categories_id = mysqli_query($connection,$query);


                            ##    while($row = mysqli_fetch_assoc($select_categories_id)){
                            ##    $cat_ID = $row["cat_id"];
                            ##   $cat_title = $row["cat_title"];

                            ##    echo "<td>{$cat_title} </td>";}


                            ##    echo "<td>{$post_status} </td>";
                            ##    echo "<td><img class='img-responsive' src='../images/$post_image'> </td>";
                            ##    echo "<td>{$post_tags} </td>";
                            ##    echo "<td>{$post_comment_count} </td>";
                            ##    echo "<td>{$post_date} </td>";
                                echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                echo "</tr>";
                            }


                            ?>


                            
                            </tr>
                        </tbody>
                        </table>

                        <?php 

                    // Deleten van content 
                        if(isset($_GET['delete'])){
                        $delete_user_id = $_GET['delete'];
                            $query = "DELETE FROM users WHERE user_id =  {$delete_user_id} ";
                            $delete_Query = mysqli_query($connection, $query);
                            header("Location: users.php");
                        }
                        
                        ?>