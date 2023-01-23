<?php
  $category_data = $obj->display_category();

  if(isset($_GET['status'])){
     if($_GET['status'] == 'delete'){
        $delateId = $_GET['id'];
        $delateMsg = $obj->delate_category($delateId);
     }
  }
?>

<h2>manage category view</h2>
<?php
  if(isset($delateMsg)){
    echo $delateMsg;
  }
?>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>category name</th>
            <th>category discription</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($data = mysqli_fetch_assoc($category_data)){?>
        <tr>
            <td><?php echo $data['id']?></td>
            <td><?php echo $data['cat_name']?></td>
            <td><?php echo $data['cat_des']?></td>
            <td>
                <a href="edit_category.php?U_ID=<?php echo$data['id']?>" class="btn btn-primary">Edit</a>
                <a href="?status=delete&&id=<?php echo $data['id']?>" class="btn btn-danger">Delate</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>