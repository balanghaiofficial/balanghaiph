<?php require_once ('./admin_includes/header.php'); ?>

    <?php require_once ('./admin_includes/nav.php'); ?>

                <?php 
                
                    if (isset($_POST['btn_add_user'])) {

                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $user_role = $_POST['user_role'];
                        $user_name = $_POST['user_name'];
                        $user_email = $_POST['user_email'];
                        $user_password = $_POST['user_password'];

                        /* $Post_Image = $_FILES['image']['name'];
                        $Post_Temp = $_FILES['image']['tmp_name'];

                        $Post_Tags = $_POST['post_tags'];
                        $Post_Content = $_POST['post_content'];
                        
                        */ 
                        $sql = "insert into users (user_name, user_password, first_name, last_name, user_email, user_role) values('$user_name', '$user_password', '$first_name', '$last_name', '$user_email', '$user_role')";

                        $result = mysqli_query($con,$sql);

                        if($result){

                            echo "Record Has Successfully Created";
                          //  move_uploaded_file($Post_Temp, "../imgs/$Post_Image");

                        } else {

                            echo "Query Failed";

                        }      

                    }
                    
                
                ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col">

                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">

                            <label>First Name</label>

                            <input type="text" name="first_name" placeholder="First Name" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>Last Name</label>

                            <input type="text" name="last_name" placeholder="Last Name" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                        <label>Role</label>

                            <select name="user_role" id="" class="form-control">

                                <option name="user" id="">Select User</option>

                                <option name="admin" id="">Admin</option>

                                <option name="User" id="">User</option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label>Username</label>

                            <input type="text" name="user_name" placeholder="Username" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>User Email</label>

                            <input type="email" name="user_email" placeholder="Email" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>User Password</label>

                            <input type="password" name="user_password" placeholder="Password" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <button class="btn btn-primary" type="submit" name="btn_add_user">Add User</button>

                        </div>
                            
                        </form>

                    </div>                 

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

            <?php require_once ('./admin_includes/footer.php'); ?>