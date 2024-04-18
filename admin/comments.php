<?php include "includes/admin_header.php"; ?>


<?php ob_start(); ?>



<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

        <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>
<?php 

if(isset($_GET['source'])){

$source = $_GET['source'];

}else{

    $source='';
}
switch($source) {


    case 'add_post';
    include "includes/add_post.php";
    break;
    case'edit_post';
    include "includes/edit_post.php";
    break;

    case '200';
    echo "Nice 200";
    break;

    default:

    include "includes/view_all_comments.php";


    break;
}







?>
     
            
        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>
        