<?php include "includes/admin_header.php"; ?>


<?php ob_start(); ?>



<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

        <h1 class="page-header">
                        Welcome to Comments
                        <small>Author</small>
                    </h1>


<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Disapprove</th>
            <th>Delete</th>

            
            <!-- <th>Status</th> -->
        </tr>
    </thead>
    <tbody>
        <?php

        global $connection;
        include "./includes/admin_db.php";
        $query = "SELECT * from comments WHERE comment_post_id =". mysqli_real_escape_string($connection,$_GET['id']);
        $select_comments = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            // $comment_ = $row['comment_'];
            $comment_date = $row['comment_date'];
            // $comment_tags = $row['comment_tags'];
            // $comment_comment_count = $row['comment_comment_count'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            
            
            // $query = "SELECT * from posts where cat_id = $comment_category_id";
            // $select_categories_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_categories_id)) {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];
                
            // echo "<td>{$cat_title}</td>";
            
            // }
            
            echo "<td>{$comment_email}</td>";


            echo "<td>{$comment_status}</td>";
                
            
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";


                $select_post_id_query = mysqli_query($connection,$query);
                while($row  = mysqli_fetch_assoc($select_post_id_query)){


                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    
                    
                    
                    echo "<td><a href='../posts.php?p_id=$post_id'>{$post_title}</a></td>";


                }


            
            echo "<td>{$comment_date}</td>";
            // echo "<td><img height ='100' ,width='100'src ='../images/$comment_image' alt='image'></td>";
            // echo "<td>{$comment_tags}</td>";
            // echo "<td>{$comment_comment_count}</td>";
            // echo "<td>{$comment_status}</td>";
            echo "<td><a href= 'post_comments.php?approve={$comment_id}&id=" . $_GET['id']. "'>Approve</a></td>";
            echo "<td><a href= 'post_comments.php?disapprove={$comment_id}&id=" . $_GET['id']. "'>Disapprove</a></td>";
            
            echo "<td><a href= 'post_comments.php?delete={$comment_id}&id=" . $_GET['id']. "'>Delete</a></td>";
            
            echo "</tr>";
        }

        ?>
    </tbody>
</table>
<?php 

if (isset($_GET['approve'])) {
    $the_comment_id =$_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id={$the_comment_id}";
    $approve_query = mysqli_query($connection,$query);
    header("Location: post_comments.php?id=".$_GET['id']."");
}


if (isset($_GET['disapprove'])) {
    $the_comment_id =$_GET['disapprove'];
    $query = "UPDATE comments SET comment_status = 'Dispproved' WHERE comment_id={$the_comment_id}";
    $disapprove_query = mysqli_query($connection,$query);
    header("Location: post_comments.php?id=".$_GET['id']."");
}



if (isset($_GET['delete'])) {
    $the_comment_id =$_GET['delete'];
    $query = "DELETE from comments where comment_id={$the_comment_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: post_comments.php?id=".$_GET['id']."");
}




?>

        </div>
        </div>
        </div>

<?php include "includes/admin_footer.php" ?>