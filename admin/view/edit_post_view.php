<?php
  if(isset($_GET['status'])){
    if($_GET['status'] == 'editpost'){
        $id = $_GET['id'];
        $postdata = $obj->get_post_info($id);
    }
     if(isset($_POST['update_post'])){
        $msg = $obj->update_post($_POST);
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
    
    <form action="" method="POST" class='form'>
        <input type="hidden" name="edit_post_id" value="<?php echo $id?>">
        <div class="form-group">
            <label class="small" for="change_title">Change title</label>
            <input name="change_title" class="form-control py-4" id="change_title" type="text" value="<?php echo $postdata['post_title']?>"/>
        </div>

        <div class="form-group">
            <label class="small" for="change_content">Change content</label>
            <textarea name="change_content" id="change_content" cols="30" rows="10" class="form-control">
               <?php echo $postdata['post_content']?>
            </textarea>
        </div>

        <input type="submit" value="update post" name="update_post" class="btn btn-primary">
    </form>
</div>

