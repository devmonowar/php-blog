<?php 
   if(isset($_GET['U_ID'])){
     $id = $_GET['U_ID'];
      $result = $obj->get_particular_data($id);
      $data = mysqli_fetch_assoc($result);
      $edit_msg = $obj->edit_category();
   }
?>

<?php 
if(isset($edit_msg)){
    echo '<div class="alert alert-success mt-3 w-50" role="alert">
             Edit category sucessfully
         </div>';
}
else{
    echo '<div class="alert alert-dengar mt-3 w-50" role="alert">
             something wrong!
          </div>'; 
}
?>
<form action="" method="post" class="w-50 p-4 border border-dark mt-3">
<h2>Update Category</h2>
     <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $id?>">
     </div>
    <div class="form-group">
        <label class="small mb-1" for="cat_name">Category name</label>
        <input name="cat_name" class="form-control py-4 mb-2" id="cat_name" type="text" value="<?php echo $data['cat_name']?>"/>

        <label class="small mb-1" for="cat_des">Category Discription</label>
        <input name="cat_des" class="form-control py-4 mb-2" id="cat_des" type="text" value="<?php echo $data['cat_des']?>"/>

        <input type="submit" name="edit_cat" value="Update" class="form-control btn btn-block btn-primary mt-3">
    </div>
</form>