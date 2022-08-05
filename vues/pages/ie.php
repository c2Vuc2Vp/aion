<?php

  $app = "../../app/";

  $assets = "../../assets/";

  $vendor = "../../vendor/";

  $views = "../../views/";

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
                      </ul>
                  </div>

              </div>
              <!-- /End mobile  Menu-->

              <div class="slider-active dot-style">
                  <!-- Single -->
                  <div class="single-slider slider-ie1 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                    <h1>Import-export</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Single -->
                  <div class="single-slider slider-ie2 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>Import-export</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Single -->
                  <div class="single-slider slider-ie3 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>Import-export</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Hero -->

      <div class="container">
        
        <div class="row">  
      
          <div class="col-lg-6">
          
            <div class="section-tittle mb-60 pt-10">
              
              <h2>Qui sommes nous?</h2>
              <p><?=WEBNAME?>, une entreprise pluridimensionnelle qui est spécialisée dans chacune de ses activitées. Le domaine de l'import-export ne fait exception.</p>
              <p>Notre entreprise, est une socété axée en partie sur le transport de vos produits, articles, marchandises... de tout type (produits agricole, cosmetique, vestimentaire, vehicule...) </p>
          
            </div>
          
          </div>
          
          <div class="col-lg-6">

            <div id="carousel" class="carousel slide" data-ride="carousel">
              
              <div class="carousel-inner">
                
                <div class="carousel-item active">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/logo/logo.png" alt="AION">

                </div>

                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/agricole.jpg" alt="materiaux">

                </div>
                
                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/cosmetique.jpg" alt="professionnel">

                </div>
                
                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/vestimentaire.jpg" alt="mur">

                </div>
                
                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/vehicule.jpg" alt="ciment">

                </div>

              </div>
            
            </div>

          </div>
          
        </div>

        <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="<?=$assets?>img/gallery/contenur.png">
         
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-9">
                  <div class="single-question text-center">
                      <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">N'hésitez plus</h2>
                      <a href="#contact" class="btn wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">RDV</a>
                  </div>
              </div>
          </div>

      </div>
      </section>

        <div class="popular-items">
            <div class="container-fluid">
                
                <h2 class="text-center">Produits disponibles</h2>
                
                <div class="row">
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="ie" href="<?=$assets?>img/gallery/bananerais1.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/bananerais1.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="ie" href="<?=$assets?>img/gallery/bananerais2.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/bananerais2.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="ie" href="<?=$assets?>img/gallery/matela.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/matela.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="ie" href="<?=$assets?>img/gallery/gobelet.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/gobelet.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
               
                </div>
            </div>
        </div>
        
        <div class="row justify-content-around">  
      
          <div class="col-lg-6">
              <div class="section-tittle mb-60 pt-10">
                  <h2>Notre expertise</h2>
                  <p class="pera">Nous vous proposons des produits en tout genre à export n'import où dans le monde avec une fiabilité et un rapidité qui ne dit pas son nom.</p>
              </div>
          </div>
          
          <div id="contact" class="col-lg-4">

              <div class="form-wrapper pt-80">
                  <div class="row ">
                      <div class="col-xl-12">
                          <div class="small-tittle mb-30">
                              <h2>Nous contacter</h2>
                          </div>
                      </div>
                  </div>
                  <form id="commande_form" enctype='multipart/form-data'>
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="form-box user-icon mb-15">
                                  <input type="text" id="nom" name="name" placeholder="Votre nom">
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-box email-icon mb-15">
                                  <input type="text" id="numero" name="numero" placeholder="numero">
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-box email-icon mb-15">
                                  <input type="text" id="email" name="email" placeholder="Email">
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-box message-icon mb-15">
                                  <textarea name="message" id="message" placeholder="Details de vos attentes"></textarea>
                              </div>
                          </div>
                      </div>
                  </form>
                  
                  <div class="col-lg-12">
                  
                      <div class="submit-info">
                  
                          <button id="commande" class="submit-btn2">Prendre un RDV</button>
                  
                      </div>
                  
                  </div>

              </div>
          
          </div>
          
        </div>
      
      </div>
    
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

    <script>
      
      $('.carousel').carousel({
        interval: 3000
      });

      $('[data-fancybox="ie"]').fancybox({

        animationEffect: "zoom-in-out",

        transitionEffect: "zoom-in-out",

        loop: true,

        buttons: [
          "zoom",
          "share",
          "slideShow",
          "fullScreen",
          "download",
          "thumbs",
          "close"
        ],

      });

      $("#commande").click(function(){

        // poste des valeur des champs du formulaire par ajax
        /*var data = $('#commande_form').serializeArray();*/
        var nom = $('#nom').val();

        var numero = $('#numero').val();

        var email = $('#email').val();

        var msg = $('#message').val();

        var url = 'commande.php';

        $.ajax({

          url: url,

          method: 'post',

          data: {

            nom: nom,

            numero: numero,

            email: email,

            msg: msg,

            service: 'ie',

            /*data: data,*/

          },

          dataType: 'text',

          success: function(rep){

            if(rep !== "success"){

              alert("Remplissez tous les champs!");
            
            };

            if(rep == "success"){

              Swal.fire({

                title: 'RDV',
                text: "Votre rendez vous a étée validé, vous serai contacté sous peu.",
                type: 'success',
                showConfirmButton: true,
              
              });
            
            };
            
            console.log(rep);

          },

        });/*
        $.each(data, function (key, el){
          console.log(el.name, el.value);
        });*/

      });

    </script>
    <!-- script end -->

  </body>
</html>