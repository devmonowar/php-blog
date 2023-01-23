<?php 
  $posts = $obj->display_post();
?>
<h2>Mange Post Page</h2>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
       <th>ID</th>
       <th>Title</th>
       <th>content</th>
       <th>Thumnail</th>
       <th>Author</th>
       <th>Date</th>
       <th>category</th>
       <th>Status</th>
       <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($postdata= mysqli_fetch_assoc($posts)){?>
     <tr>
       <td><?php echo $postdata['post_id']?></td>
       <td><?php echo $postdata['post_title']?></td>
       <td><?php echo $postdata['post_content']?></td>
       <td>
        <img height="100px" src="../upload/<?php echo $postdata['post_img']?>" alt=""><br>
        <a href="edit_img.php?status=editimg&&id=<?php echo $postdata['post_id']?>">Change</a>
      </td>
       <td><?php echo $postdata['post_author']?></td>
       <td><?php echo $postdata['post_date']?></td>
       <td><?php echo $postdata['cat_name']?></td>
       <td>
         <?php if($postdata['post_status'] == 1){
             echo 'Published';
         }else{
             echo 'Unpublished';
         }?>
       </td>
       <td>
          <a href="edit_post.php?status=editpost&&id=<?php echo $postdata['post_id']?>" class="btn btn-success">Edit</a>
          <a href="#" class="btn btn-danger">Delate</a>
       </td>
     </tr>
     <?php }?>
  </tbody>
</table>
</div>