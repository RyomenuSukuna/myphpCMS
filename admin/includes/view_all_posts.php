<?php 

if(isset($_POST['checkBoxArray'])){

foreach($_POST['checkBoxArray'] as $postValueId){
  
$bulk_options = $_POST['bulk_options'];

switch($bulk_options) {
    case 'published':

        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id='$postValueId' ";


        $update_to_publish = mysqli_query($connection,$query);


    break;
    case 'draft':

        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id='$postValueId' ";


        $update_to_draft = mysqli_query($connection,$query);


    break;
    case 'delete':

        $query = "DELETE  FROM posts WHERE post_id='$postValueId' ";


        $update_to_delete = mysqli_query($connection,$query);


    break;

    // case 'clone':

    //     $query = "SELECT * from posts WHERE post_id = '$postValueId' ";
    //     $select_posts = mysqli_query($connection, $query);
    //     while ($row = mysqli_fetch_assoc($select_posts)) {
            
    //         $post_title = $row['post_title'];
            
    //         $post_category_id = $row['post_category_id'];
            
    //         $post_date = $row['post_date'];
            
    //         $post_author = $row['post_author'];
            
    //         $post_image = $row['post_image'];
    //         $post_tags = $row['post_tags'];
    //         $post_content = $row['post_content'];
    //     //     $post_id = $row['post_id'];
    //     //     $post_comment_count = $row['post_comment_count'];
    //     //    $post_status = $row['post_status'];

    //     }


    //     $query = "INSERT INTO posts(post_title,post_category_id,post_date,post_author,post_image,post_tags,post_content VALUES('$post_title','$post_category_id',now(),'$post_author','$post_image','$post_tags','$post_content')";

    //     // $clone_posts = mysqli_query($connection, $query);


    // break;


    case 'clone':
        $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
        $select_post_query = mysqli_query($connection, $query);


        while($row = mysqli_fetch_array($select_post_query)) {
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_author = $row['post_author'];
        $post_user = $row['post_user'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];

            if(empty($post_tags)){
                $post_tags = "No tags";
            }



        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_user,post_date, post_image, post_content, post_tags, post_status) ";
        $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', '{$post_user}',now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
        }
        $copy_query = mysqli_query($connection, $query);
        if(!$copy_query) {
            die("QUERY FAILED"  . mysqli_error($connection));
        }
        break;


}


}


}



?>

<form action="" method="post">


<table class="table table-bordered table-hover">

            <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
            </select>
            </div>
            <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="post.php?source=add_post">Add New</a>


            </div>
            </div>
    <thead>
        <tr>
            <th><input type="checkbox" name="" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Categories</th>
            <th>Title</th>
            <th>User</th>
            <th>Date</th>
            <th>Status</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Views</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * from posts  ORDER BY post_id DESC";
        $select_posts = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
           $post_status = $row['post_status'];
           $post_views_count = $row['post_views_count'];

            echo "<tr>";
            ?>
            <td><input type='checkbox' name='checkBoxArray[]' value = '<?php echo $post_id ?>' class='checkBoxes'></td>
            <?php
            echo "<td>{$post_id}</td>";

            $query = "SELECT * from categories where cat_id = $post_category_id";
            $select_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
                                
            echo "<td>{$cat_title}</td>";

            }

            echo "<td>{$post_title}</td>";


if(!empty($post_author)){

    echo "<td>{$post_author}</td>";
}elseif(!empty($post_user)){

    echo "<td>{$post_user}</td>";
}
               
            echo "<td>{$post_date}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img height ='100' ,width='100'src ='../images/$post_image' alt='image'></td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";


            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";

            $send_comment_count=mysqli_query($connection,$query);

            $row = mysqli_fetch_array($send_comment_count);
            // $comment_id = $row['comment_id'];
            if (!isset($row['comment_id'])){
                $row['comment_id'] = NULL;
            }else{
                $comment_id = $row['comment_id'];
            }
            $count_comment = mysqli_num_rows($send_comment_count);
            

            echo "<td><a href='post_comments.php?id=$post_id'>{$count_comment}</a></td>";





            echo "<td><a href= '../posts.php?p_id={$post_id}'>View Post</a></td>";
            echo "<td><a href= 'post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href= 'post.php?delete={$post_id}'>Delete</a></td>";
            
            echo "<td><a href='post.php?reset={$post_id}'>{$post_views_count}</a></td>";
            echo "</tr>";
        }

        ?>
    </tbody>
</table>
</form>
<?php 
if (isset($_GET['delete'])) {
    $delete_id =$_GET['delete'];
    $query = "DELETE from posts where post_id = {$delete_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: post.php");
}
if (isset($_GET['reset'])) {
    $reset_id =$_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =". mysqli_real_escape_string($connection,$_GET['reset'])." " ;
    $reset_query = mysqli_query($connection,$query);
    header("Location: post.php");
}

?>