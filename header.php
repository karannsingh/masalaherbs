<?php 
  $link_old = $_SERVER['REQUEST_URI'];
  $link = explode('/', $link_old);
  $link_new = end($link);
?>
<!-- Preloader -->
<div id="loader-wrapper">
  <div id="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<!-- End Preloader -->
<div class="tm-top-header">
  <div class="container">
    <div class="row">
      <div class="tm-top-header-inner">
        <div class="tm-logo-container">
          
          <h1 class="tm-site-name tm-handwriting-font">Masala N Herbs</h1>
        </div>
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <nav class="tm-nav">
          <ul>
            <?php 
            if($link_new == "" || $link_new == "index.php"){
              ?>
              <li><a href="index.php" class="active">Home</a></li>
              <?php
            }
            else{
              ?>
              <li><a href="index.php">Home</a></li>
              <?php
            }
            ?>

            <?php 
            if($link_new == "booking.php"){
              ?>
              <li><a href="booking.php" class="active">Booking</a></li>
              <?php
            }
            else{
              ?>
              <li><a href="booking.php">Booking</a></li>
              <?php
            }
            ?>

            <?php 
            if($link_new == "menu.php"){
              ?>
              <li><a href="menu.php" class="active">Menu</a></li>
              <?php
            }
            else{
              ?>
              <li><a href="menu.php">Menu</a></li>
              <?php
            }
            ?>

            <?php 
            if($link_new == "contact.php"){
              ?>
              <li><a href="contact.php" class="active">Contact</a></li>
              <?php
            }
            else{
              ?>
              <li><a href="contact.php">Contact</a></li>
              <?php
            }
            ?>
            
            <?php 
        if(isset($_SESSION['USER_LOGIN'])){
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbar-Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hi <?php echo $_SESSION['USER_NAME']?>
              <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbar-Dropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
          <?php
        }else{
          if($link_new == "login.php"){
              ?>
              <li><a href="login.php" class="active">Login/ Register</a></li>
              <?php
            }
            else{
              ?>
              <li><a href="login.php">Login/ Register</a></li>
              <?php
            }
        }
        ?>
          </ul>
        </nav>   
      </div>           
    </div>    
  </div>
</div>