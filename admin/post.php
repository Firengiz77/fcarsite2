<?php include "db.php"; ?>
<link href="style.css" rel="stylesheet" />
<?php include "index.php"; ?>
<link href="post.css" rel="stylesheet" />

<div id="wrapper">

<div id="layoutSidenav_content">


<main>




   
    
    
<div id="content-wrapper">
    <div class="container-fluid">
        <h1>Welcome to Admin Page</h1>
        <hr>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th> Name</th>
                    <th> Images</th>
                    <th>Add - Edit - Delete</th>
                </tr>
            </thead>
            <tbody>



            <?php 
              if(isset($_GET["delete"])){
                  $del_post_id=$_GET["delete"];
                  $sql_query="DELETE FROM post WHERE post_id={$del_post_id}";
                  $del_post_query=mysqli_query($conn,$sql_query);
                  
              }
             
             ?>
             






                <?php 
    
    $sql_query="SELECT * FROM post ORDER BY post_id DESC";
    $select_all_post=mysqli_query($conn,$sql_query);
   $k=1;
    while($row=mysqli_fetch_assoc($select_all_post))
    {
     $post_id=$row["post_id"];
     $post_photo=$row["post_photo"];
     $post_name=substr($row["post_name"],0,50);

      echo "   
            <tr>
                    <td>{$post_id}</td>
                    <td>{$post_name}</td>
                    <td><img src='../img/$post_photo' width='85px' height='80px'></td>
                    
                   
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Actions
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='edit.php'>Edit</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='post.php?delete={$post_id}'>Delete</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' data-toggle='modal' data-target='#add_modal' href='add.php'>Add</a>
                            </div>
                        </div>
                    </td>
                </tr> ";
               
                

               
?>

     <?php $k++; } ?>
            </tbody>
        </table>


        <?php include "footer.php"; ?>