<?php require_once ('./admin_includes/header.php'); ?>

    <?php require_once ('./admin_includes/nav.php'); ?>

                <?php 
                
                    if (isset($_POST['btn_add_post'])) {

                        $Post_Title = $_POST['post_title'];
                        $Post_Cat_id = $_POST['cat_name'];
                        $Post_Author = $_POST['post_author'];
                        $Post_Status = $_POST['post_status'];

                        $Post_Image = $_FILES['image']['name'];
                        $Post_Temp = $_FILES['image']['tmp_name'];

                        $Post_Tags = $_POST['post_tags'];
                        $Post_Content = $_POST['post_content'];
                        

                        $sql = "insert into posts (post_cat_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_status) values('$Post_Cat_id', '$Post_Title', '$Post_Author', now(), '$Post_Image', '$Post_Content', '$Post_Tags', '$Post_Status')";

                        $result = mysqli_query($con,$sql);

                        if($result){

                            /* echo "Record Has Successfully Created"; */
                            move_uploaded_file($Post_Temp, "../imgs/$Post_Image");
                            echo '<p class="alert alert-success">Post Has Been Stored</p>';

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

                            <label>Post Title</label>

                            <input type="text" name="post_title" placeholder="Post Title" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>Post Category ID</label>
                            
                            <select name="cat_name" id="" class="form-control">

                                    <?php

                                        $sql = "select * from categories";
                                        $value = mysqli_query($con,$sql);

                                        while ($row = mysqli_fetch_assoc($value)) {

                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];

                                            ?>

                                            <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
                                    <?php

                                        }

                                    ?>
                                    </select>
                                
                        </div>

                        <div class="form-group">

                            <label>Post Author</label>

                            <input type="text" name="post_author" placeholder="Post Author" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>Post Status</label>

                            <input type="text" name="post_status" placeholder="Post Status" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>Image</label>

                            <input type="file" name="image" placeholder="Post Title" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>Post Tags</label>

                            <input type="text" name="post_tags" placeholder="Post Tags" class="form-control pb-4">

                        </div>

                        <div class="form-group">

                            <label>Post Content</label>

                            <textarea name="post_content" class="form-control" id="editor" cols="30" rows="10"></textarea>

                        </div>

                        <div class="form-group">

                            <button class="btn btn-success" type="submit" name="btn_add_post">Add Post</button>

                        </div>
                            
                        </form>

                    </div>                 

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

            <?php require_once ('./admin_includes/footer.php'); ?>