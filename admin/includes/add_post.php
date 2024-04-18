<?php 


if (isset($_POST['create_post'])) {
    global $connection;
        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['title'];
        $post_user = $_POST['post_user'];
        $post_date = date('d-m-y');
        $post_status = $_POST['status'];

        $post_image = $_FILES ['image']['name'];
        $post_image_temp = $_FILES ['image']['tmp_name'];

        $post_content = $_POST['content'];
        $post_tags = $_POST['tags'];
        // $post_comment_count = $_POST['comment_count'];

        move_uploaded_file($post_image_temp, "../images/$post_image");
        $query = "INSERT into posts (post_category_id,post_title,post_user,post_date,post_status,post_image,post_content,post_tags) values ({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_status}','{$post_image}','{$post_content}','{$post_tags}') ";
        $insert_post_query = mysqli_query($connection,$query);

        confirmQuery($insert_post_query);


        $the_post_id = mysqli_insert_id($connection);
        echo "<p>Post Created. <a href='../posts.php?p_id={$the_post_id}'>View Post</a> or <a href='post.php?p_id={$the_post_id}'>Edit More post..</a> </p>";
        

        
}

?>






<form action="" method="POST" enctype="multipart/form-data">
<div class="input-group mb-3">
    <label for="category">Category</label>
    <select name="post_category" class="form-control" id="">
    
    <?php 
    $query="SELECT * FROM categories" ; 
    $select_categories = mysqli_query($connection,$query);
    confirmQuery($select_categories); 
    while ($row= mysqli_fetch_assoc($select_categories))
    {
        $cat_id=$row['cat_id'];
        $cat_title = $row['cat_title'];
                
        
        
        echo "<option value='$cat_id'>$cat_title</option>";

        }
        
    ?>
    </select>
           
    </div>

    <div class="form-group">
        <label for="title">Post Title:</label>
        <input type="text" class="form-control" name="title">
    </div>




    <div class="form-group">
    <label for="post_user">Author</label>
    <select name="post_user" class="form-control" id="">
    
    <?php 
    $query="SELECT * FROM users" ; 
    $select_users = mysqli_query($connection,$query);
    confirmQuery($select_users); 
    while ($row= mysqli_fetch_assoc($select_users))
    {
        $user_id=$row['user_id'];
        $username = $row['username'];
                
        
        
        echo "<option value='$username'>$username</option>";

        }
        
    ?>
    </select>
           
    </div>

    <!-- <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" id="geenration" name="author">
    </div> -->

    <!-- <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date'">
    </div> -->

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" class="form-control" id="status">
        <option value="draft">Select Options</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>


        </select>
        <!-- <input type="text" class="form-control" id="status" name="status"> -->
    </div>


    <div class="form-group">
        <label for="image">Image:</label>
        <input class="form-control form-control-sm"  type="file"  id="image" name="image">
    </div>

    <div class="form-group">
        <label for="summernote">Content:</label>
        <textarea id="summernote" class="form-control" name="content" rows="4" cols="50"></textarea>
    </div>

    <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" class="form-control" id="tags" name="tags">
    </div>

    <!-- <div class="form-group">
        <label for="comment_count">Comment Count:</label>
        <input type="number" class="form-control" id="comment_count" name="comment_count">
    </div> -->

    <input type="submit" class="btn btn-primary" value="Submit" name="create_post">

</form>