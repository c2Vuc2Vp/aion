<?php

  $app = "../../app/";

  $assets = "../../assets/";

  $vendor = "../../vendor/";

  $views = "../../views/";
  
  $img_art = $assets.'img/articles/';

  require_once($app.'inc/db.php');

  require_once($app.'inc/functions.php');

?>

<html class="no-js" lang="fr">

  <!-- head start -->

  <?php 

    require_once("../layouts/_head.php");

  ?>

  <!-- head end -->

  <body class="full-wrapper">

    <!-- ? Preloader Start -->
    <?php 

      require_once("../layouts/_preloader.php");

    ?>
    <!-- Preloader Start-->

    <!-- Header Start -->   
    <?php 

      require_once("../layouts/_header.php");

    ?>        
    <!-- Header End -->
      
    <main id="main">
      <!--? Hero Area Start-->
      <div class="container-fluid">
          <div class="slider-area">
              <!-- Mobile Device Show Menu-->
              <div class="header-right2 d-flex align-items-center">
                  <!-- Search Box -->
                  <div class="search d-block d-md-none" >
                      <ul class="d-flex align-items-center">
                          <li class="mr-15">
                              <div class="nav-search search-switch">
                                  <i class="ti-search"></i>
                              </div>
                          </li>
                          <li>
                              <div class="card-stor">
                                  <img src="<?=$assets?>img/gallery/card.svg" alt="">
                                  <span>0</span>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <!-- /End mobile  Menu-->

              <div class="slider-active dot-style">
                  <!-- Single -->
                  <div class="single-slider slider-bg1 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>Perpetuel<br>changement<br>de la mode</h1>
                                      <a href="shop.php" class="btn">Acheter</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Single -->
                  <div class="single-slider slider-bg2 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>Perpetuel<br>changement<br>de la mode</h1>
                                      <a href="shop.php" class="btn">Acheter</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Single -->
                  <div class="single-slider slider-bg3 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>Perpetuel<br>changement<br>de la mode</h1>
                                      <a href="shop.php" class="btn">Acheter</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Hero -->
      <!--? Popular Items Start -->
      <?php

        require('../req/categorie_vitrine.php');

      ?>
      <!-- Popular Items End -->
      <!--? New Arrival Start -->
      <div class="new-arrival">
          <div class="container">
              <!-- Section tittle -->
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-8 col-md-10">
                      <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                          <h2>nouvel<br>arrivage</h2>
                      </div>
                  </div>
              </div>

              <div class="row">

                <?php 

                  $req = $pdo->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 8");

                    $req->execute([]);

                    while ($fetch = $req->fetch()) {

                      $nom = $fetch['nom'];

                      $prix = $fetch['prix'];

                      $img = $fetch['img'];

                      $img1 = $fetch['img1'];
         
                      $id = $fetch['id'];

                      $uniqid = $fetch['uniqid'];

                      $pays = $fetch['country'];

                      require('../req/news_art.php');

                    }

                ?>

              </div>
      <!-- Button -->
      <div class="row justify-content-center">
          <div class="room-btn">
              <a href="shop.php" class="border-btn">Plus</a>
          </div>
      </div>
      </div>
      </div>
      <!--? New Arrival End -->
      <!--? collection -->
      <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="<?=$assets?>img/gallery/parfum.jpg">
          <div class="container-fluid"></div>
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-9">
                  <div class="single-question text-center">
                      <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">Faites ressortir l'odeur de votre âme</h2>
                      <a href="shop.php?cat=Parfums" class="btn class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">Shop</a>
                  </div>
              </div>
          </div>
      </div>
      </section>
      <!-- End collection -->
      <!--? Popular Locations Start 01-->
      <div class="popular-product pt-50">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="single-product mb-50">
                          <div class="location-img">
                              <img src="<?=$assets?>img/gallery/lor.png" alt="">
                          </div>
                          <div class="location-details">
                              <p><a href="detail.php">L'or, le café de ceux qui valent de l'or</a></p>
                              <a href="shop.php?cat=Cafes" class="btn">Plus</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="single-product mb-50">
                          <div class="location-img">
                              <img src="<?=$assets?>img/gallery/lavazza.png" alt="">
                          </div>
                          <div class="location-details">
                              <p><a href="detail.php">Lavazza, le goût n'est pas une question de hasard</a></p>
                              <a href="shop.php?cat=Cafes" class="btn">Plus</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Popular Locations End -->
      <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="<?=$assets?>img/gallery/voiture.jpg">
         
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-9">
                  <div class="single-question text-center">
                      <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">Votre voiture votre profil</h2>
                      <a href="shop.php?cat=Cars" class="btn wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">Shop</a>
                  </div>
              </div>
          </div>

      </div>
      </section>
      <!--? Services Area Start -->
      <?php

        require('../req/service.php');

      ?>
      <!--? Services Area End -->
    
    </main>

    <!-- Footer Start -->   
    <?php 

      require_once("../layouts/_footer.php");

    ?>        
    <!-- Footer End -->
   
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <!-- script start -->
    <?php 

      require_once("../layouts/_script.php");

    ?>        
    <!-- script end -->

  </body>
</html>