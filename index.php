<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
        <h1 class="page-header">
                    Posts
                    <!-- <small>best ones till now</small> -->
                </h1>
           
           
           <?php

$per_page = 2;

if(isset($_GET['page'])){


$page = $_GET['page'];


}else{
    $page = "";
}

if($page == "" || $page == 1){
    $page_1=0;
}else{

    $page_1 = ($page*$per_page) - $per_page;
}

if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin' ){

    $post_query_count = "SELECT * FROM posts";

}else{

    $post_query_count = "SELECT * FROM posts WHERE post_status='published'";

} 



           
        
        $find_count = mysqli_query($connection, $post_query_count);
        $count = mysqli_num_rows($find_count);
        
        $count = ceil($count / $per_page);
        
        if($count<1){
            echo "<h2 style='text-align:center;'>No Posts available</h2>";
        }else{

            $query = " SELECT * FROM posts  LIMIT $page_1 ,$per_page  ";
            $select_all_posts_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                

                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_user'];
                $post_date = $row['post_date'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0,100);
                
                
                
                // if($post_status == 'published'){
                        

                
            ?>

                
                <h2>
                    <a href="posts.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>


                <hr>
                <a href="posts.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                </a>
                <hr>


                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="posts.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


            <?php
            }
        }
    

            ?>




        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>


    <ul class="pager">

    <?php 

    // for($i = 1;$i <= $count;$i++){


    //     if($i == $page || ($i == 1 && $page == NULL)){
    //         echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
    //     } 
          
        
    //     else{

    //         echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
    //     }
    // }

    // if($page != 1 && $page != ""){

    //     $prev_page = $page - 1;
        
    //     echo "<li><a href='index.php?page={$prev_page}'>PREV</a></li>";
        
    //     }
        
    //     for($i = 1; $i <= $count ; $i++){
        
    //     if($i == $page || ($i == 1 && $page == null)){
        
    //     echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
        
    //     } else {
        
    //     echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
        
    //     }
        
    //     }
        
    //     if($page != $count && $page != ""){
        
    //     $next_page = $page + 1;
        
    //     echo "<li><a href='index.php?page={$next_page}'>NEXT</a></li>";
        
    //     }
  
$query = "SELECT * from posts WHERE post_status = 'published'";
$pagination = (mysqli_query($connection,$query));
if(mysqli_num_rows($pagination)>0){



    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    if($page == $count && $count > 1){
        echo "<li><a href='index.php?page=1'>FIRST</a></li>";
    }
    
if($page != 1 && $page != ""){
    $prev_page = $page - 1;
    echo "<li><a href='index.php?page={$prev_page}'>PREV</a></li>";
}

$start_page = max(1, $page - 3); // Adjusted to show 6 pages at a time
$end_page = min($start_page + 5, $count); // Adjusted to limit maximum page number

for($i = $start_page; $i <= $end_page ; $i++){
    if($i == $page || ($i == 1 && $page == null)){
        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
    } else {
        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
    }
}

if($page != $count && $page != ""){
    $next_page = $page + 1;
    echo "<li><a href='index.php?page={$next_page}'>NEXT</a></li>";
}

// Button to go to the last page
echo "<li><a href='index.php?page={$count}'>LAST</a></li>";

// Button to go to the first page if on the last page
}
?>
    </ul>


    <?php include "includes/footer.php" ?>