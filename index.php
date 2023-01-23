<?php include('admin/class/function.php');
    $obj = new adminBlog();
    $getcat = $obj->display_category();
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
          <?php include_once('includes/blog_post.php')?>
          <?php include_once('includes/sidebar.php')?>
        </div>
      </div>
    </section>

    
    <?php include_once('includes/footer.php')?>

   

    <?php include_once('includes/script.php')?>

 