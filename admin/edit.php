<?php include "db.php"; ?>
<link href="add.css" rel="stylesheet" />






<?php  
            if(isset($_POST["edit_post"])){
                $post_name=$_POST["post_name"];

                $post_photo=$_FILES["post_photo"]["name"];
                $post_photo_temp=$_FILES["post_photo"]["tmp_name"];
    
                move_uploaded_file($post_photo_temp,"img/$post_photo");
          
                $sql_query2="UPDATE post SET post_name='{$post_name}',post_photo='{$post_photo}' WHERE post_id='$_POST[post_id]' ";
                
                $edit_post=mysqli_query($conn,$sql_query2);
                header("Location: post.php");
              

            }
            ?>
    
    <?php 
    
    $sql_query="SELECT * FROM post ORDER BY post_id DESC";
    $select_all_post=mysqli_query($conn,$sql_query);
   $k=0;
   while($row=mysqli_fetch_assoc($select_all_post)){
     $post_id=$row["post_id"];
     $post_photo=$row["post_photo"];
     $post_name=substr($row["post_name"],0,50);
     
        ?>

           
  <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="post_name">Post Name</label>
                                        <input type="text" class="form-control" name="post_name" value="<?php echo $post_name; ?>">
                                    </div>
                                   

                                    <div class="form-group">
                                        <label for="post_photo">Post Image</label>
                                        <input width="80px" src="../img/<?php echo $post_photo; ?>">
                                        <input type="file" class="form-control" name="post_photo">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="post_id" value="<?php echo $row["post_id"]; ?> ">
                                        <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php $k++;} ?>
          
               

