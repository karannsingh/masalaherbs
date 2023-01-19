<?php

include('top.php');

include('sidebar.php');

if (!isset($_SESSION['ADMIN_LOGIN'])) {
  header('location:login.php');
}

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

<section class="section dashboard">
  <div class="container">
      <div class="row">
        <div class="colg-lg-6 col-md-6 col-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Total Clients</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-user"></i>
                    </div>
                    <?php 
                      $sql = "SELECT * from users";
                      $res = mysqli_query($conn, $sql);
                      $count = mysqli_num_rows($res);
                    ?>
                    <div class="ps-3">
                      <h6><?php echo $count; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
        </div>
        <div class="colg-lg-6 col-md-6 col-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Total Staff</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <?php 
                      $sql = "SELECT * from admin_users";
                      $res = mysqli_query($conn, $sql);
                      $count = mysqli_num_rows($res);
                    ?>
                    <div class="ps-3">
                      <h6><?php echo $count; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
        </div>
      </div>
      <div class="row">
        <div class="colg-lg-12 col-md-12 col-12">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Revenue<span> | This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Rs. 3,264 /-</h6>
                    </div>
                  </div>
                </div>

              </div>
        </div>
      </div>
    </div> 
</section>      

  </main><!-- End #main -->
<?php
  include('footer.php');
?>