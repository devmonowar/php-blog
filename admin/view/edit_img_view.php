<?php
  if(isset($_GET['status'])){
    if($_GET['status'] == 'editimg'){
        $id = $_GET['id'];
    }
     if(isset($_POST['change_img_btn'])){
        $msg = $obj->edit_img($_POST);
     }
  }
?>
<div class="shadow m-5 p-5">
<?php 
   if(isset($msg)){
    echo "<div class='alert alert-success' role='alert'>
              $msg
          </div>";
}
?>
    
    <form action="" method="POST" enctype="multipart/form-data" class='form'>
        <input type="hidden" name="editimg_id" value="<?php echo $id?>">
        <div class="form-group">
            <label class="small" for="change_img">Change thumnail</label>
            <input name="change_img" class="py-4" id="change_img" type="file" />
        </div>
        <input type="submit" value="Chnage thumnail" name="change_img_btn" class="btn btn-primary">
    </form>
</div>