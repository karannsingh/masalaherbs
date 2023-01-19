<?php 
require('top.php');

$status = "";
if (isset($_POST['submit'])) {
  $name=get_safe_value($conn,$_POST['name']);
  $email=get_safe_value($conn,$_POST['email']);
  $subject=get_safe_value($conn,$_POST['subject']);
  $content=get_safe_value($conn,$_POST['content']);

  $added_on=date('Y-m-d h:i:s');
  $res = mysqli_query($conn,"insert into contact(name,email,subject,content,added_on) values('$name','$email','$subject','$content','$added_on')");  
  if ($res) {
    $status = "ture";
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
          <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Contact Us&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
          <h2 class="gold-text tm-welcome-header-2">Masala N Herbs</h2>
          <p class="gray-text tm-welcome-description">Masala N Herbs team invites you and your loved ones for a <span class="gold-text">Delightful</span> and <span class="gold-text">Memorable</span>. experience. Exploring new food has always been fascinating so, We offer you an authentic Italian Cousine</p>
          <a href="#main" class="tm-more-button tm-more-button-welcome">Message Us</a>      
        </div>
        <img src="img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">            
      </div>      
    </section>
    <div class="tm-main-section light-gray-bg">
      <div class="container" id="main">
        <section class="tm-section row">
          <h2 class="col-lg-12 margin-bottom-30">Your Feedback</h2>
          <form method="post" class="tm-contact-form">
            <div class="col-lg-6 col-md-6">
              <div class="form-group">
                <input type="text" id="contact_name" name="name" class="form-control" required placeholder="NAME" />
              </div>
              <div class="form-group">
                <input type="email" id="contact_email" name="email" class="form-control" required placeholder="EMAIL" />
              </div>
              <div class="form-group">
                <input type="text" id="contact_subject" name="subject" class="form-control" required placeholder="SUBJECT" />
              </div>
              <div class="form-group">
                <textarea id="contact_message" name="content" class="form-control" rows="6" required placeholder="MESSAGE"></textarea>
              </div>
              <div class="form-group">
                <button class="tm-more-button" type="submit" name="submit">Send message</button> 
              </div>   
              <div style="color: Green">
                <?php
                  if ($status == "ture") {
                    echo "Recorded Successfully!";
                  }
                ?>
              </div>            
            </div>
            <div class="col-lg-6 col-md-6">
              <div id="google-map"></div>
            </div> 
          </form>
        </section>
      </div>
    </div> 
    <?php
      include('footer.php');
    ?> 
   <script>
      /* Google map
      ------------------------------------------------*/
      var map = '';
      var center;

      function initialize() {
        var mapOptions = {
          zoom: 16,
          center: new google.maps.LatLng(13.758468,100.567481),
          scrollwheel: false
        };
        
        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
          calculateCenter();
        });
        
        google.maps.event.addDomListener(window, 'resize', function() {
          map.setCenter(center);
        });
      }

      function calculateCenter() {
        center = map.getCenter();
      }

      function loadGoogleMap(){
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
      }
      $(document).ready(function(){                
        loadGoogleMap();                
      });
      </script>
    </body>
    </html>