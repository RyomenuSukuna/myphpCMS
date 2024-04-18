<?php include "includes/admin_header.php"; ?>


<?php ob_start(); ?>

<?php 
if(isset($_SESSION['username'])){

    $username =  $_SESSION['username'];

    $query = "SELECT * from users WHERE username = '$username'";

    $select_user_profile = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($select_user_profile)){

        $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
    }
}

?>

<?php 

if (isset($_POST['update_user'])) {


    // $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname =$_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    // $user_image = $_POST['user_image'];
    // $user_role = $_POST['user_role'];

//     // if (empty($post_image)) {
//     //     $query = "SELECT * from posts where  post_id = $the_post_id ";
//     //     $select_posts = mysqli_query($connection, $query);
//     //     while ($row = mysqli_fetch_assoc($select_posts)) {
//     //         $post_image = $row['post_image'];
//     //     }
//     }


    $query ="UPDATE users set username = '$username' , user_password ='{$user_password}', user_firstname ='{$user_firstname}', user_lastname ='{$user_lastname}', user_email ='{$user_email}'  WHERE username = '$username' ";

    $update_user = mysqli_query($connection,$query);
    
    header("Location: users.php");
}






?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

        <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
                    <form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" value = "<?php echo $user_firstname ;?>"  name="user_firstname">
    </div>
    
    
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" value = "<?php echo $user_lastname ;?>" name="user_lastname">
    </div>
    
    <!-- <div class="form-group">
        <label for="image">Image:</label>
        <input class="form-control form-control-sm"  type="file"  id="image" name="image">
    </div> -->
    
    
    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" value = "<?php echo $username ;?>" id="geenration" name="username">
    </div>
    
    <div class="form-group">
        <label for="status">Email</label>
        <input type="text" class="form-control" value = "<?php echo $user_email ;?>" id="status" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="status">Password</label>
        <input type="password" autocomplete="off" class="form-control"  id="status" name="user_password">
    </div>


    <!-- <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date'">
    </div> -->

    <!-- <div class="form-group">
        <label for="content">Content:</label>
        <textarea id="content" class="form-control" name="content" rows="4" cols="50"></textarea>
    </div> -->

    <!-- <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" class="form-control" id="tags" name="tags">
    </div>

    <div class="form-group">
        <label for="comment_count">Comment Count:</label>
        <input type="number" class="form-control" id="comment_count" name="comment_count">
    </div> -->

    <input type="submit" class="btn btn-primary" value="Update Profile" name="update_user">

</form>
            
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>
        


