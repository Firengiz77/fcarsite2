<?php include "db.php"; ?>
<link href="add.css" rel="stylesheet" />

<?php  
               if(isset($_POST["add_post"])){
                   $post_name=$_POST["post_name"];
    
                   $post_photo=$_FILES["post_photo"]["name"];
                   $post_photo_temp=$_FILES["post_image"]["tmp_name"];
    
                   move_uploaded_file($post_photo_temp,"../img/$post_photo");
    
                   $query="INSERT INTO post (post_name,post_photo) VALUES ('{$post_name}','{$post_photo}')";
                   $create_query=mysqli_query($conn,$query);
                   header("Location: post.php");
    
    
               }
               
               ?>

<div id="add_modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                                    <div class="form-group">
                                        <label for="post_name">Post Name</label>
                                        <input type="text" class="form-control" name="post_name" >
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="post_image">Post Photo</label>
                                        <!-- <img width="60"  alt="ERROR"> -->
                                        <input type="file" class="form-control" name="post_photo" required>
                                    </div>

                             <div class="form-group">
                             <input type="hidden" name="post_id" value="<?php echo $post_name; ?>">
                                <input type="submit" class="btn btn-primary" name="add_post" value="Add Post" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>

