<?php

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED .".mysqli_error($connection));
    }
}


function insert_categories(){

    global $connection;
                       if(isset($_POST['submit'])){
                       $cat_title =  $_POST['cat_title'];

                       if($cat_title == "" || empty($cat_title)){
                           echo "This field should not be empty";
                       }else { 
                           
                                $query = "INSERT INTO categories(cat_title) ";
                                $query .= "VALUE('{$cat_title}')";
                                $create_category_query = mysqli_query($connection, $query);

                                if(!$create_category_query){
                                    die('Query failed ' . mysqli_error($connection));
                                }}}}


function update_categories(){
global $connection;
    if(isset($_GET['edit'])){
        $cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $select_categories_id = mysqli_query($connection,$query);
        
        
        while($row = mysqli_fetch_assoc($select_categories_id)){
            $cat_ID = $row["cat_id"];
            $cat_title = $row["cat_title"];
            ?>
            <input value='<?php if(isset($cat_title)){echo $cat_title;} ?>' class='form-control' type='text' name='cat_title'>
              <?php    }}?>

              <?php 
              //Update query
             if (isset($_POST['Update'])){

                $the_cat_title = $_POST['cat_title'];
                $query = "Update categories SET cat_title = '{$the_cat_title}'WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($connection, $query);
                header("Location: categories.php");
                if(!$update_query){
                    die("QUERY FAILED". mysqli_error($connection));
}}}


function delete_Categories(){
global $connection;
    if (isset($_GET['delete'])){

        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function find_Categories(){
    global $connection;
    $query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($select_categories)){
    $cat_ID = $row["cat_id"];
    $cat_title = $row["cat_title"];
    echo "<tr>";
    echo "<td>{$cat_ID}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_ID}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_ID}'>Update</a></td>";
    echo "</tr>";                    }
}

                       ?>