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
        <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Our Menus&nbsp;&nbsp;<img src="img/header-line.png" alt="Line" class="tm-header-line"></h2>
        <h2 class="gold-text tm-welcome-header-2">Masala N Herbs</h2>
        <p class="gray-text tm-welcome-description">Masala N Herbs team invites you and your loved ones for a <span class="gold-text">Delightful</span> and <span class="gold-text">Memorable</span>. experience. Exploring new food has always been fascinating so, We offer you an authentic Italian Cousine</p>
        <a href="#main" class="tm-more-button tm-more-button-welcome">Read More</a>      
      </div>
      <img src="img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">  
    </div>      
  </section>
  <div class="tm-main-section light-gray-bg">
    <div class="container" id="main">
      <section class="tm-section row">
        <div class="col-lg-9 col-md-9 col-sm-8">
          <h2 class="tm-section-header gold-text tm-handwriting-font">Variety of Menus</h2>
          <h2>Masala N Herbs</h2>
          <p class="gray-text tm-welcome-description">Italian cuisine includes deeply rooted traditions common to the whole country, as well as all the regional gastronomies, Italian cuisine offers an abundance of taste, and is one of the most popular around the world.One of the main characteristics of Italian cuisine is its simplicity, with many dishes made up of few ingredients, and therefore Italian cooks often rely on the quality of the ingredients, rather than the complexity of preparation.</p>
          <a href="#" class="tm-more-button margin-top-30">Read More</a> 
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
          <div class="inline-block shadow-img">
            <img src="img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
          </div>              
        </div>            
      </section>          
      <section class="tm-section row">
        <div class="col-lg-12 tm-section-header-container margin-bottom-30">
          <h2 class="tm-section-header gold-text tm-handwriting-font">Our Menus</h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div>
          <div class="col-lg-3 col-md-3">
            <div class="tm-position-relative margin-bottom-30">              
              <nav class="tm-side-menu">
                <ul>
                  <li><a href="#" class="active">Penne in Alfredo and Arrabiata</a></li>
                  <li><a href="#">Penne in Pesto Sauce</a></li>
                  <li><a href="#">Fettuccine in Chilli Butter Sauce</a></li>
                  <li><a href="#">Fettuccine in Pesto Sauce</a></li>
                  <li><a href="#">Fettuccine in Aglio e Olio</a></li>
                  <li><a href="#">Raviol in Spinach Butter</a></li>
                  <li><a href="#">Tortellini in Ragu Bologense</a></li>
                  <li><a href="#">Spaghetti in Aglio e Olio</a></li>
                  <li><a href="#">Spaghetti Carbonara</a></li>
                  <li><a href="#">Pasta AL Promodoro</a></li>
                  <li><a href="#">Pansotti in Pesto Sauce</a></li>
                </ul>              
              </nav>    
              <img src="img/vertical-menu-bg.png" alt="Menu bg" class="tm-side-menu-bg">
            </div>  
          </div>            
          <div class="tm-menu-product-content col-lg-9 col-md-9"> <!-- menu content -->
            <?php
            $get_menu = get_menu($conn);
            foreach ($get_menu as $list) {
              ?>
              <div class="tm-product">
                <img src="img/menu-1.jpg" alt="Product">
                <div class="tm-product-text">
                  <h3 class="tm-product-title"><?php echo $list['name']?></h3>
                  <p class="tm-product-description"><?php echo $list['description']?></p>
                </div>
                <div class="tm-product-price">
                  <a href="form.php" value="<?php echo $list['id'] ?>" class="order-now-link tm-handwriting-font">Order Now</a>
                </div>
              </div>
              <?php
              }
            ?>              
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