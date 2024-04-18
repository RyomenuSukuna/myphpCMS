<?php

global $connection;

if (isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];


    $query = "SELECT * from users where  user_id = $the_user_id ";
    $select_user = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_user)) {
        // $post_id = $row['post_id'];
        // $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }

    if (isset($_POST['update_user'])) {

?>

        <h5>User Updated <a href="users.php">View users</a></h5>
<?php
        // $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        // $user_image = $_POST['user_image'];
        $user_role = $_POST['user_role'];

        //     // if (empty($post_image)) {
        //     //     $query = "SELECT * from posts where  post_id = $the_post_id ";
        //     //     $select_posts = mysqli_query($connection, $query);
        //     //     while ($row = mysqli_fetch_assoc($select_posts)) {
        //     //         $post_image = $row['post_image'];
        //     //     }
        //     }
        if (!empty($user_password)) {
            $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
            $get_user = mysqli_query($connection, $query_password);

            $row = mysqli_fetch_array($get_user);

            $db_user_password = $row['user_password'];

            if ($db_user_password != $user_password) {
                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
            }


            $query = "UPDATE users set username = '$username' , user_password ='{$hashed_password}', user_firstname ='{$user_firstname}', user_lastname ='{$user_lastname}', user_email ='{$user_email}', user_role ='{$user_role}'  WHERE user_id = '{$the_user_id}' ";

            $update_user = mysqli_query($connection, $query);

            // header("Location: users.php");
        }
    }
} else {

    header("Location: index.php");
}



?>


<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
    </div>

    <!-- <div class="form-group">
        <label for="image">Image:</label>
        <input class="form-control form-control-sm"  type="file"  id="image" name="image">
    </div> -->
    <div class="input-group mb-3">
        <label for="title">Role: </label>
        <select name="user_role" class="form-control" id="">
            <option value="<?php echo $user_role;   ?>"><?php echo $user_role;   ?></option>


            <?php


            if ($user_role == 'Admin') {

                echo "<option value='Subscriber'>Subscriber</option>";
            } else {
                echo "<option value='Admin'>Admin</option>";
            }
            //    $query="SELECT * FROM users" ; 
            //    $add_user = mysqli_query($connection,$query);
            //    confirmQuery($add_user); 
            //    while ($row= mysqli_fetch_assoc($add_user))
            //    {
            //        $user_id=$row['user_id'];
            //        $user_role = $row['user_role'];



            //        echo "<option value='$user_id'>$user_role</option>";

            //        }

            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" value="<?php echo $username; ?>" id="geenration" name="username">
    </div>

    <div class="form-group">
        <label for="status">Email</label>
        <input type="text" class="form-control" value="<?php echo $user_email; ?>" id="status" name="user_email">
    </div>

    <div class="form-group">
        <label for="status">Password</label>
        <input autocomplete="off" type="password" class="form-control" id="status" name="user_password">
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

    <input type="submit" class="btn btn-primary" value="Update" name="update_user">

</form>