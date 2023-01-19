<?php
include('top.php');

include('sidebar.php'); 
if (!isset($_SESSION['ADMIN_LOGIN'])) {
  header('location:login.php');
}
$admin = getAdminInfo($conn, $_SESSION['ADMIN_EMAIL']);

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">
        <div class="colg-lg-12 col-md-12 col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Post</h5>
              <form action="../add_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control mb-4" name="post_title" required>
                </div>
                <div class="form-group">
                  <label>Post Content</label>
                  <textarea class="form-control quill-editor-full" name="post_content" rows="8" required></textarea>
                </div> 
                <div class="row">
                  <div class="form-group mt-3 col-lg-6 col-md-6 col-6">
                    <label>Select Post Category</label>
                    <select class="form-control" name="post_category">
                      <?php 
                      $categories = getAllCategory($conn);
                      foreach ($categories as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['category_name'] ?></option>
                        <?php
                      }
                      ?>                    
                    </select>
                  </div>   
                  <div class="form-group mt-3 col-lg-6 col-md-6 col-6">
                  <label>Upload Posts (Max 3):</label>
                  <input type="file" class="form-control" name="post_image[]" accept="image/*" multiple required>
                </div> 
                </div> 
                <input type="submit" class="btn btn-success mt-4" name="add_post" value="Add Post">                       
              </form>                          
            </div>
          </div>
        </div>
      </div>
    </div>    

  </main><!-- End #main -->
<?php
  include('footer.php');
?>