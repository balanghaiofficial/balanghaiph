<?php require_once ('./admin_includes/header.php'); ?>

    <?php require_once ('./admin_includes/nav.php'); ?>

    <?php 
                
                if (isset($_GET['p_id'])) {

                        $Post_ID = $_GET['p_id'];
                        $sql = "select * from posts where post_id='$Post_ID'";
                        $result = mysqli_query($con,$sql);

                        while($row = mysqli_fetch_assoc($result)){

                            $post_id = $row['post_id']; 
                            $post_author = $row['post_author']; 
                            $post_title = $row['post_title']; 
                            $post_cat_id = $row['post_cat_id']; 
                            $post_status = $row['post_status']; 
                            $img = $row['post_img'];
                            $post_tags = $row['post_tags'];
                            $post_content = $row['post_content'];

                        }
                  
                }

                //Update Record

                if (isset($_POST['btn_edit_post'])) {

                    $Post_Title = $_POST['post_title'];
                    $Post_Cat_id = $_POST['cat_name'];
                    $Post_Author = $_POST['post_author'];
                    $Post_Status = $_POST['post_status'];

                    $Post_Image = $_FILES['image']['name'];
                    $Post_Temp = $_FILES['image']['tmp_name'];

                    $Post_Tags = $_POST['post_tags'];
                    $Post_Content = $_POST['post_content'];

                    if (empty($Post_Image)) {

                        $query = "select * from posts where post_id='$Post_ID'";
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_assoc($result)){

                            $Post_Image = $row['post_img'];

                        }
                        
                    }

                    $sql = " update posts set post_cat_id='$Post_Cat_id', post_title='$Post_Title', post_author='$Post_Author', post_date=now(), post_img='$Post_Image', post_content='$Post_Content', post_status='$Post_Status' where post_id='$Post_ID'";

                    $result = mysqli_query($con,$sql);

                    if ($result) {
                        
                      //  header("location: ./posts.php");
                        move_uploaded_file($Post_Temp, "../imgs/$Post_Image");
                        echo "<p class='alert alert-success'>Post Has Been Updated. <a href='../post.php?p_id=$post_id' target='_blank'>View post</a></p>";

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

                            <input type="text" name="post_title" placeholder="Post Title" class="form-control pb-4" value="<?php echo $post_title ?>">

                        </div>

                        <div class="form-group">

                        <label>Post Category ID</label>

                            <select name="cat_name" id="" class="form-control">

                                <?php

                                    $query = "select * from categories";
                                    $data = mysqli_query($con,$query);

                                    while ($row = mysqli_fetch_assoc($data)) {

                                        $cat_id = $row['post_cat_id'];

                                        ?>

                                        <option value="<?php echo 
                                        $row['cat_id'] ?>"><?php echo $row['cat_title'];?></option>
                                <?php

                                    }

                                ?>
                            </select>

                        </div>

                        <div class="form-group">

                            <label>Post Author</label>

                            <input type="text" name="post_author" placeholder="Post Author" class="form-control pb-4" value="<?php echo $post_author ?>">

                        </div>

                        <div class="form-group">

                            <label>Post Status</label>

                            <!-- <input type="text" name="post_status" placeholder="Post Status" class="form-control pb-4" value=""> -->
                            
                            <select name="post_status" class="form-control">

                                    <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>

                                    <?php 
                                    
                                        if ($post_status=="published") {
                                            
                                            echo "<option value='draft'>Draft</opiton>";

                                        } else {

                                            echo "<option value='published'>Published</opiton>"; 

                                        }

                                    ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>Image</label>

                            <img width="150" height="130" class="img-responsive" 
                                    src="../imgs/<?php echo $img; ?>">

                            <input type="file" name="image" placeholder="Post Title" class="form-control pb-4" >

                        </div>

                        <div class="form-group">

                            <label>Post Tags</label>

                            <input type="text" name="post_tags" placeholder="Post Tags" class="form-control pb-4" value="<?php echo $post_tags ?>">

                        </div>

                        <div class="form-group">

                            <label>Post Content</label>

                            <textarea name="post_content" class="form-control" id="editor" cols="30" rows="10"><?php echo $post_content ?></textarea>

                        </div>

                        <div class="form-group">

                            <button class="btn btn-success" type="submit" name="btn_edit_post">Edit Post</button>

                        </div>
                            
                        </form>

                    </div>                 

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

            <?php require_once ('./admin_includes/footer.php'); ?>