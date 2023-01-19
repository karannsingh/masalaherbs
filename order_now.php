<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masala N Herbs</title>
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/templatemo-style.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <style>
      .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
      }
      .red{ background: #ff0000; }
      .green{ background: #228B22; }
      .blue{ background: #0000ff; }
    </style>
  </head>
  <body>
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </nav>   
          </div>           
        </div>    
      </div>
    </div>
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
          <a href="#order" class="tm-more-button tm-more-button-welcome">Details</a>      
        </div>
        <img src="img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">             
      </div>      
    </section>

    <section class="order_form">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12 col-md-12">
            <div class="headings text-center">
              <h1 class="text-center font-weight-bold">Order Now</h1>
              <p>Select the Order Type</p>
            </div>
          </div>
        </div>
        <div class="row text-center mt-5">
          <div class="col-12 col-lg-12 col-md-12" style="margin: 30px 0px;">
            <!-- Dining Button -->
            <button class="btn btn-success" data-target="#DineIn" data-toggle="modal" text-align="center">Dine in</button>
          </div>
        </div>
        <div class="row text-center mt-5">
          <div class="col-12 col-lg-12 col-md-12">
            <!-- Take Away Button -->
            <button class="btn btn-success" data-target="#TakeAway" data-toggle="modal" text-align="center">Take Away</button>
          </div>
        </div>
      </div>

      <!-- Modal Start -->
      <div class="modal text-center" id="DineIn">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-primary">Dinning In</h3>
              <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>
            <div class="modal-body">
              <form action="/action_page.php" autocomplete="off">
                <div class="form-group">
                  <label for="DateTime">Date Time:</label>
                  <input type="datetime-local" class="form-control" id="datetime">
                </div>
                <div class="form-group">
                  <label for="MobileNo">Mobile No:</label>
                  <input type="tel" class="form-control" id="mobile" placeholder="Enter Your Mobile Number">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal End -->

      <!-- Modal Start -->
      <div class="modal text-center" id="TakeAway">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title text-primary">Take Away</h3>
              <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>
            <div class="modal-body">
              <form action="/action_page.php" autocomplete="off">
                <div class="form-group">
                  <label for="Name">Name:</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="DateTime">Date Time:</label>
                  <input type="datetime-local" class="form-control" id="datetime">
                </div>
                <div class="form-group">
                  <label for="DateTime">Date Time:</label>
                  <input type="datetime-local" class="form-control" id="datetime">
                </div>
                <div class="form-group">
                  <label for="MobileNo">Mobile No:</label>
                  <input type="tel" class="form-control" id="mobile" placeholder="Enter Your Mobile Number">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal End -->
    </section>

    </div>
  </div>
</div>
</section>

<?php
include('footer.php');
?>
<script type=""></script>    
$(document).ready(function(){
  $(".select_type").Dinning(function(){
    $(this).find("option:selected").each(function(){
      var optionValue = $(Dinning).attr("Dinning");
      if(optionValue){
        $(".box").not("." + optionValue).hide();
        $("." + optionValue).show();
      } else{
        $(".box").hide();
      }
    });
  }).change();
});
</script>
</body>
</html>