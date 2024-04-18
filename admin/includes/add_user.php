<?php 


if (isset($_POST['create_user'])) {
    global $connection;
        // $user_id = $_POST['user_id'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        // $post_date = date('d-m-y');
        $username = $_POST['username'];

        // $post_image = $_FILES ['image']['name'];
        // $post_image_temp = $_FILES ['image']['tmp_name'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        // $post_comment_count = $_POST['comment_count'];

        // move_uploaded_file($post_image_temp, "../images/$post_image");

        $user_password = password_hash( $user_password, PASSWORD_BCRYPT ,array('cost' => 10) );
        $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}')";
        $insert_user_query = mysqli_query($connection,$query);

        confirmQuery($insert_user_query);
        
        echo "User Created: " . "" . "<a href='users.php'>View Users</a>";

        
}

?>






<form action="" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <!-- <div class="form-group">
        <label for="image">Image:</label>
        <input class="form-control form-control-sm"  type="file"  id="image" name="image">
    </div> -->
    <div class="input-group mb-3">
    <label for="title">Role: </label>
       <select name="user_role" class="form-control" id="">
            <option value="">Select Role</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
       </select> 
              
       </div>
    
    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" id="geenration" name="username">
    </div>
    
    <div class="form-group">
        <label for="status">Email</label>
        <input type="text" class="form-control" id="status" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="status">Password</label>
        <input type="password" class="form-control" id="status" name="user_password">
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

    <input type="submit" class="btn btn-primary" value="Add User" name="create_user">

</form>