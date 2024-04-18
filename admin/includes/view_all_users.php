<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <!-- <th>Password</th> -->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <!-- <th>Image</th> -->
            <th>Role</th>
            <!-- <th>Date</th> -->
            

            
            <!-- <th>Status</th> -->
        </tr>
    </thead>
    <tbody>
        <?php

        global $connection;
        include "admin_db.php";
        $query = "SELECT * from users  ";
        $select_users = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            // $randSalt = $row['randSalt'];
           

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            
            
            // $query = "SELECT * from posts where cat_id = $comment_category_id";
            // $select_categories_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_categories_id)) {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];
                
            // echo "<td>{$cat_title}</td>";
            
            // }
            
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            
            
            echo "<td>{$user_role}</td>";
            // echo "<td>now()</td>";
            // echo "<td>{$user_lastname}</td>";
                
            
            // $query = "SELECT * FROM users WHERE user_id = $comment_post_id";


            //     $select_post_id_query = mysqli_query($connection,$query);
            //     while($row  = mysqli_fetch_assoc($select_post_id_query)){


            //         $post_id = $row['post_id'];
            //         $post_title = $row['post_title'];
                    
                    
                    
            //         echo "<td><a href='../posts.php?p_id=$post_id'>{$post_title}</a></td>";


                


            
            // echo "<td>{$comment_date}</td>";
            // echo "<td><img height ='100' ,width='100'src ='../images/$comment_image' alt='image'></td>";
            // echo "<td>{$comment_tags}</td>";
            // echo "<td>{$comment_comment_count}</td>";
            // echo "<td>{$comment_status}</td>";
            echo "<td><a href= 'users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href= 'users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";

            echo "<td><a href= 'users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
            
            echo "<td><a href= 'users.php?delete={$user_id}'>Delete</a></td>";
            
            echo "</tr>";
        }

        ?>
    </tbody>
</table>
<?php 

// if (isset($_GET['approve'])) {
//     $the_comment_id =$_GET['approve'];
//     $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id={$the_comment_id}";
//     $approve_query = mysqli_query($connection,$query);
//     header("Location: comments.php");
// }


// if (isset($_GET['disapprove'])) {
//     $the_comment_id =$_GET['disapprove'];
//     $query = "UPDATE comments SET comment_status = 'Dispproved' WHERE comment_id={$the_comment_id}";
//     $disapprove_query = mysqli_query($connection,$query);
//     header("Location: comments.php");
// }



if (isset($_GET['delete'])) {


    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){

            
            $the_user_id =mysqli_real_escape_string($connection,$_GET['delete']);
            $query = "DELETE from users where user_id={$the_user_id}";
            $delete_query = mysqli_query($connection,$query);
            header("Location: users.php");
        }
    }
}


if (isset($_GET['change_to_admin'])) {
    $the_user_id =$_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'Admin' where user_id={$the_user_id}";
    $admin_query = mysqli_query($connection,$query);
    header("Location: users.php");
}

if (isset($_GET['change_to_subscriber'])) {
    $the_user_id =$_GET['change_to_subscriber'];
    $query = "UPDATE users SET user_role = 'Subscriber' where user_id={$the_user_id}";
    $subscriber_query = mysqli_query($connection,$query);
    header("Location: users.php");
}




?>