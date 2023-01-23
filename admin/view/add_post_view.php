<?php
  $categoryName = $obj->display_category();

  if(isset($_POST['add_post'])){
     $msg = $obj->add_post($_POST);
  }
?>
<h2>add post view</h2>
<?php 
  if(isset($msg)) {
    echo "<div class='alert alert-success' role='alert'>
             $msg
          </div>";
   }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="small mb-1" for="post_title">Post Title</label>
        <input name="post_title" class="form-control py-4" id="post_title" type="text" />
    </div>

    <div class="form-group">
        <label class="small mb-1" for="post_content">Post content</label>
        <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control py-4"></textarea>
    </div>

    <div class="form-group">
        <label class="small" for="post_img">upload thumnail</label>
        <input name="post_img" class="form-control" id="post_img" type="file" />
    </div>

    <div class="form-group">
        <label class="small mb-1" for="cat_name">Select Post Category</label>
        <select name="post_category" class="form-select w-100 p-2" aria-label="Default select example">
            <?php while($category = mysqli_fetch_assoc($categoryName)){?>
            <option value="<?php echo $category['id']?>"><?php echo $category['cat_name']?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label class="small mb-1" for="cat_name">Post Summary</label>
        <input name="post_summary" class="form-control py-4" id="post_summary" type="text" />
    </div>

    <div class="form-group">
        <label class="small mb-1" for="cat_name">Post tag</label>
        <input name="post_tag" class="form-control py-4" id="post_tag" type="text" />
    </div>

    <div class="form-group">
        <label class="small mb-1" for="cat_name">Post Status</label>
        <select name="post_status" class="form-select w-100 p-2" aria-label="Default select example">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <!-- submit --->
    <input type="submit" name="add_post" value="Add Post" class="form control py-2 btn btn-block btn-primary">
</form>