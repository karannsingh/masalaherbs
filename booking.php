<?php 
require('top.php');
?>
<body>
  <?php 
  require('header.php');
  ?>
  <section class="tm-welcome-section">
    <div class="container tm-position-relative">
      <div class="tm-lights-container">
        <img src="img/light.png" alt="Light" class="light light-1">
        <img src="img/light.png" alt="Light" class="light light-2">
        <img src="img/light.png" alt="Light" class="light light-3">  
      </div>        
      <div class="row tm-welcome-content">
        <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Welcome To&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
        <h2 class="gold-text tm-welcome-header-2">Masala N Herbs</h2>
        <p class="gray-text tm-welcome-description">Masala N Herbs team invites you and your loved ones for a <span class="gold-text">Delightful</span> and <span class="gold-text">Memorable </span>experience. Exploring new food has always been fascinating so, We offer you an authentic Italian Cousine</p>
        <a href="#main" class="tm-more-button tm-more-button-welcome">Details</a>      
      </div>
      <img src="img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">             
    </div>      
  </section>
  <div class="tm-main-section light-gray-bg">
    <div class="container" id="main">
      <section class="tm-section tm-section-margin-bottom-0 row">
        <div class="col-lg-12 tm-section-header-container">
          <h2 class="tm-section-header gold-text tm-handwriting-font"> Booking</h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div class="col-lg-12 tm-popular-items-container">
          <?php
          $get_booking = get_booking($conn);
          foreach ($get_booking as $list) {
            ?>
            <div class="tm-popular-item">
              <?php 
              $post_images = getBookingImages($conn, $list['id']);
              ?>
              <img src="admin/images/uploads/<?php echo $post_images['image'] ?>" class="img-responsive">
              <div class="tm-popular-item-description">
                <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">
                  <?php
                  $get_name = $list['title'];
                  $my_frst_char = substr($get_name, 0, 1);
                  $rest_letter = ltrim($get_name, $my_frst_char);
                  ?>
                  <?php echo $my_frst_char;?></span><?php echo $rest_letter;?>

                </h3><hr class="tm-popular-item-hr">
                <p><?php echo $list['short_desc'] ?></p>
                <div class="order-now-container">
                  <button type="button" class="order-now-link tm-handwriting-font" data-toggle="modal" data-target="#myModal<?php echo $list['id'] ?>">Book Now</button> 
                </div>
              </div>              
            </div>
            <div class="modal fade text-center" id="myModal<?php echo $list['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <form action="book_now.php?id=<?php echo $list['id'] ?>" method="POST">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Book Now</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                      <i class="fa fa-user prefix grey-text"></i>
                      <input type="text" id="orangeForm-name" name="name" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                    </div>
                    <div class="md-form mb-5">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <input type="email" id="orangeForm-email" name="email" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="book" class="btn btn-success">Book Now</button>
                  </div>
                </div>
              </div>
              </form>              
            </div>
            <?php
          }
          ?>                      
        </div>       
      </section>
      

      <section class="tm-section">
        <div class="row">
          <div class="col-lg-12 tm-section-header-container">
            <h2 class="tm-section-header gold-text tm-handwriting-font"> Daily Menu</h2> 
            <div class="tm-hr-container"><hr class="tm-hr"></div> 
          </div>  
        </div>          
        <div class="row">
          <div class="tm-daily-menu-container margin-top-60">
            <div class="col-lg-4 col-md-4">
              <img src="img/menu-board.png" alt="Menu board" class="tm-daily-menu-img">      
            </div>            
            <div class="col-lg-8 col-md-8">
              <p>Special discount on monday and thursday. Birthday special offer of 50%.</p>
              <ol class="margin-top-30">
                <li>Penne in Pesto Sauce</li> 
                <li>Cheese Potato Poppers</li>
                <li>Bruschetta</li> 
                <li>Ricotta di Bruschetta</li> 
                <li>Giant Tortellini in Bechamel Sauce<</li> 
                <li>Ravioli in Spinach Butter</li> 
              </ol>
              <a href="#" class="tm-more-button margin-top-30">Read More</a>    
            </div>
          </div>
        </div>          
      </section>
    </div>
  </div> 

  <?php
  include('footer.php');
  ?>    
</body>
</html>