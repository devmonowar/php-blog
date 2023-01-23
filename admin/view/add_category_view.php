<?php
 if(isset($_POST['add_cat'])){
   $return_msg = $obj->add_category($_POST);
 }
?>

<h2>add category view</h2>
<?php 
   if(isset($return_msg)){
     echo $return_msg;
   }

?>
<form action="" method="post">
    <div class="form-group">
        <label class="small mb-1" for="cat_name">Category name</label>
        <input name="cat_name" class="form-control py-4" id="cat_name" type="text"/>

        <label class="small mb-1" for="cat_des">Category Discription</label>
        <input name="cat_des" class="form-control py-4" id="cat_des" type="text"/>

        <input type="submit" name="add_cat" value="Add Category" class="form-control btn btn-block btn-primary mt-3">
    </div>
</form>