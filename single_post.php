<?php include('admin/class/function.php');
    $obj = new adminBlog();
    $getcat = $obj->display_category();

    if(isset($_GET['view'])){
        if($_GET['view'] == 'postview'){
            $id = $_GET['id'];
           $singlePost = $obj->get_post_info($id);
        }
    }
?>

<?php include_once('includes/head.php')?>

<!-- ***** Preloader Start ***** -->
<?php include_once('includes/prealoadar.php')?>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<?php include_once('includes/header.php')?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<?php include_once('includes/banner.php')?>
<!-- Banner Ends Here -->

<!-- call to action -->
<?php include_once('includes/cta.php')?>

<!-- blog post -->
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <img src="upload/<?php echo $singlePost['post_img']?>" alt="" class="img-fluid mb-1">
                 <h2><?php echo $singlePost['post_title']?></h2>
              <p>
                <?php echo $singlePost['post_content']?>
              </p>
            </div>
            <?php include_once('includes/sidebar.php')?>
        </div>
    </div>
</section>


<?php include_once('includes/footer.php')?>



<?php include_once('includes/script.php')?>