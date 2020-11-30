<?php  

require_once "includes/db.php";
session_start();

?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   
                    <span class="sr-only">Toggle navigation</span>
                    
                    <span class="icon-bar"></span>
                    
                    <span class="icon-bar"></span>
                    
                    <span class="icon-bar"></span>
               
                </button>
                
                <a class="" href="index.php"><img src="imgs/logo.png" alt=""></a>
           
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
            <ul class="nav navbar-nav">
                    
            <li><a href="https://www.facebook.com/balanghaistudios" target="_blank">Facebook page</a></li>

            /*<li><a href="#">About us</a></li>

           <li><a href="#">Contact us</a></li> */

        <?php

           /* $query = "select *from categories";

            $result = mysqli_query($con, $query);

            while($row = mysqli_fetch_assoc($result)){

                $cat_title = $row['cat_title'];

                echo " <li><a href='#'>{$cat_title}</a></li>";

            } */

        ?>

            

            <?php 
            
                if(isset($_SESSION['db_user_role'])){

                    if (isset($_GET['p_id'])) {
                        
                        $P_ID = $_GET['p_id'];
                        echo "<li><a href='admin/posts.php?opt=edit_post&p_id={$P_ID}'>Edit Post</a></li>";

                    }

                    echo '<li><a href="admin">Admin</a></li>';

                }

            ?>

                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
        
    </nav>
