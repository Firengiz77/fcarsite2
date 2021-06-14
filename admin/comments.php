<?php include "db.php"; ?>
<link href="style.css" rel="stylesheet" />
<?php include "index.php"; ?>




<div id="layoutSidenav_content">
 <main>
  <div class="container-fluid">
 <h1 class="mt-4">Welcome Admin Page</h1>
 <div class="row">
 <div class="col-xl-3 col-md-6">                        
<table class="table" border="2">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Comments</th>
      <th>File</th>
      <th>ADD-EDIT-DELETE </th>
    </tr>
  </thead>
  <tbody>
    
  <?php 

  $select_query="SELECT * FROM comments ORDER BY comments_id DESC" ;
  $select_all_comments=mysqli_query($conn,$select_query);
  $k=1;
  while($row=mysqli_fetch_assoc($select_all_comments)){
    $comments_id=$row["comments_id"];
    $comments_fname=$row["comments_fname"];
    $comments_lname=$row["comments_lname"];
    $comments_com=$row["comments_com"];
    $comments_file=$row["comments_file"];
    
    
    echo "
    <tr>
    <th scope='row'>$comments_id </th>
    <td> $comments_fname  </td>
    <td> $comments_lname </td>
    <td> $comments_com </td>
    <td> <td><img src='../img/$comments_file' width='85px' height='80px'> </td> </td>
    
  </tr>
  ";

  ?>

   <?php $k++ ; } ?>

  </tbody>
</table>
</div>
</div>
</div>
</div>
</main>
</div>
<?php include "footer.php"; ?>
