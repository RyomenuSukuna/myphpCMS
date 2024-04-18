<div class="col-md-4">

<?php 




?>



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <?php if(isset($_SESSION['user_role'])):?>
                    <div class="well">
                    <h4>Logged is as <?php echo $_SESSION['username']?></h4>
                    <a href="includes/logout.php" class="btn btn-primary">Logout</a>
                    </div>
                    <?php else:?>
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        </div>


                        <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Login</button>

                        </span>
                        </div>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                    <?php endif;?>
                </div>









                <!-- Blog Categories Well -->
                <div class="form" style="text-align: right;">



                <?php   
                $querry = "SELECT * from categories";
                $select_categories_sidebar = mysqli_query($connection,$querry);
               

                ?>
                    <h4 style="text-align: center;">Blog Categories</h4>
                        
                        <div style="text-align: center;">
                            <ul class="list-unstyled" style="display: inline-block; padding-left: 0;">


                            <?php
                        while($row= mysqli_fetch_assoc($select_categories_sidebar)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }

                ?>

                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>








                <!-- Side Widget Well -->
                <?php include "widget.php";?>

            </div>