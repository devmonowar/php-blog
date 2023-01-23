<?php

class adminBlog{
    private $conn;

    public function __construct(){
        $this->conn = mysqli_connect('localhost','root','','blog_project');
        if(!$this->conn){
            die('database faild');
        }
    }

    public function admin_login($data){
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);
        
        $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

        if(mysqli_query($this->conn, $query)){
            $admin_info = mysqli_query($this->conn, $query);

            if($admin_info){
                header('location: dashbaord.php');
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminId'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
            }
        }
    }

    public function admin_logout(){
        unset( $_SESSION['adminId']);
        unset( $_SESSION['admin_name']);
        header('location: index.php');
    }

    public function add_category($data){
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query = "INSERT INTO category(cat_name,cat_des) VALUES('$cat_name','$cat_des')";

        if(mysqli_query($this->conn,$query)){
            return '<div class="alert alert-success" role="alert">
                      category added sucessfully
                  </div>';
        }
    }


    public function display_category(){
        $query = "SELECT * FROM category";
        if(mysqli_query($this->conn, $query)){
            $category = mysqli_query($this->conn, $query); 
            return $category;
        }
    }


    public function delate_category($id){
        $query = "DELETE FROM category WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            return '<div class="alert alert-danger" role="alert">
                     category delate sucessfully
                   </div>';
        }
    }


   public function get_particular_data($id){
        $query = "SELECT * FROM category WHERE id=$id";
        $result = mysqli_query($this->conn, $query);
        return $result;
   }


   public function edit_category(){
       if(isset($_POST['edit_cat'])){
          $id = $_POST['id'];
          $cat_name = $_POST['cat_name'];
          $cat_des = $_POST['cat_des'];
          
          $sql = "UPDATE category set id='$id', cat_name='$cat_name', cat_des='$cat_des' WHERE id=$id";
          $result = mysqli_query($this->conn,$sql);
          if($result){
             return true;
          }
          else {
            return false;
          }
       }
   }


   public function add_post($data){
       $post_title = $data['post_title'];
       $post_content = $data['post_content'];
       $post_img = $_FILES['post_img']['name'];
       $post_tmp_name = $_FILES['post_img']['tmp_name'];
       $post_category = $data['post_category'];
       $post_summary = $data['post_summary'];
       $post_tag = $data['post_tag'];
       $post_status = $data['post_status'];

       $query = "INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_content_count,post_summary,post_tag,post_status) VALUES('$post_title','$post_content','$post_img', $post_category,'Admin',now()
       ,3,'$post_summary','$post_tag',$post_status)";

       if(mysqli_query($this->conn,$query)){
          move_uploaded_file($post_tmp_name, '../upload/'.$post_img);
          return 'post added sucessfully';
       }
   }


   public function display_post(){
      $query = "SELECT * FROM post_with_ctg";
      if(mysqli_query($this->conn,$query)){
         $post = mysqli_query($this->conn,$query);
         return $post;
      }
   }

   public function display_post_public(){
    $query = "SELECT * FROM post_with_ctg WHERE post_status=1";
    if(mysqli_query($this->conn,$query)){
       $post = mysqli_query($this->conn,$query);
       return $post;
    }
 }

 public function edit_img($data){
    $id = $data['editimg_id'];
    $imgname = $_FILES['change_img']['name'];
    $tmp_name = $_FILES['change_img']['tmp_name'];
    $query = "UPDATE posts SET post_img='$imgname' WHERE post_id=$id";
    
    if(mysqli_query($this->conn, $query)){
        move_uploaded_file($tmp_name, '../upload/'.$imgname);
        return "Thumnail Updated sucessfully";
    }
 }

 public function get_post_info($id){
    $query = "SELECT * FROM post_with_ctg WHERE post_id=$id";
    if(mysqli_query($this->conn,$query)){
        $post_info = mysqli_query($this->conn, $query);
        $post = mysqli_fetch_assoc($post_info);
        return $post;
    }
 }

 public function update_post($data){
   $post_title = $data['change_title'];
   $post_content = $data['change_content'];
   $post_id = $data['edit_post_id'];

   $query = "UPDATE posts SET post_title='$post_title', post_content='$post_content' WHERE post_id=$post_id";
   if(mysqli_query($this->conn,$query)){
       return "post updated sucessfully";
   }
 }
}
?>