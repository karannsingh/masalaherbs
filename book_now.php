<?php 
require('top.php');

$msg = "";
if(!isset($_SESSION['USER_LOGIN'])){
  ?>
  <script>
  alert("Please Login!");
  window.location.href='login.php';
  </script>
  <?php
}

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql="SELECT * from booking_list WHERE id=$id";
  $run=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($run);
}

if (isset($_POST['book'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $datetime = $_POST['datetime'];
  $head = $_POST['head'];
  $date = strtotime($datetime);
  $InputDate = date('Y-m-d h:i:s',$date);  
  $username = $_SESSION['USER_NAME'];  

  //$currentDateTime = $date = date('Y-m-d H:i:s');

  $currentDateTime = date("Y-m-d h:i:s", strtotime('+20 hours'));

  if ($currentDateTime > $InputDate) {
    $msg = "Date";
  }else{
    $added_on=date('Y-m-d h:i:s');
    $result = mysqli_query($conn,"insert into booking_order(name,email,title,DateAndTime,added_on,user_name) values('$name','$email','$head','$InputDate','$added_on','$username')");
    if ($result) {
      $msg = "Success";
    }
    else{
      $msg = "Error";
    }
  }
}

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
            <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 col-12 col-md-12 col-12 ">
          <div class="col-xs-12">
            <div class="contact-title">
              <h2>Book Now</h2>
            </div>
          </div>
          <div class="col-xs-12">
            <form method="post">
              <div class="form-group mt-5">
                <label>Booking For:</label>
                <label><?php echo $row['title']; ?></label> 
                <input type="hidden" name="head" value="<?php echo $row['title']; ?>">               
              </div>
              <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Your Name*" value="<?php echo $name; ?>" style="width:100%">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" id="email" required placeholder="Your Email*" value="<?php echo $email; ?>" style="width:100%">                
              </div>
              <div class="form-group">
                <label>Date:</label>
                <input type="datetime-local" class="form-control" name="datetime" required style="width:100%">
              </div>
              <button type="submit" name="book" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="form-output login_msg" style="margin-top: 30px!important;">
            <?php 
             if ($msg == "Success") {
               echo "Recored Successfully!";
             }else if ($msg == "Error") {
               echo "Error Occured!";
             }else if($msg == "Date"){
                echo "Please Select Proper Date Time!";
             }
            ?>
          </div>
        </div>
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