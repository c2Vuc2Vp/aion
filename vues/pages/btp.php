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
                  <div class="single-slider slider-btp1 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>La construction<br>un art<br>dans la sécurité</h1>
                                  </div>
                              
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Single -->
                  <div class="single-slider slider-btp2 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>La construction<br>un art<br>dans la sécurité</h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Single -->
                  <div class="single-slider slider-btp3 hero-overly slider-height d-flex align-items-center">
                      <div class="container">
                          <div class="row justify-content-center">
                              <div class="col-xl-8 col-lg-9">
                                  <!-- Hero Caption -->
                                  <div class="hero__caption">
                                      <h1>La construction<br>un art<br>dans la sécurité</h1>
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
                  <p><?=WEBNAME?>, une entreprise pluridimensionnelle qui est spécialisée dans chacune de ses activitées. Le domaine de la construction ne fait exception.</p>
                  <p>Elle, selectionne pour vous le meilleure depuis les soubassements jusqu'à la toiture en passant par le choix des materiaux et des professionnelles du corps. Avec <?=WEBNAME?> le resultat en temps est au rdv car votre projet est le nôtre.</p>
              </div>
          </div>
          
          <div class="col-lg-6">

            <div id="carousel" class="carousel slide" data-ride="carousel">
              
              <div class="carousel-inner">
                
                <div class="carousel-item active">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/logo/logo.png" alt="AION">

                </div>

                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/materiaux.jpg" alt="materiaux">

                </div>
                
                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/professionnel.jpg" alt="professionnel">

                </div>
                
                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/mur.jpg" alt="mur">

                </div>
                
                <div class="carousel-item">
                  
                  <img class="d-block w-100 img-fluid" src="<?=$assets?>img/gallery/ciment.jpg" alt="ciment">

                </div>

              </div>
            
            </div>

          </div>
          
        </div>

        <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="<?=$assets?>img/gallery/big_logo.png">
         
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-9">
                  <div class="single-question text-center">
                      <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">N'hésitez plus</h2>
                      <a href="#contact" class="btn wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">RDV</a>
                  </div>
              </div>
          </div>

      </section>

        <div class="popular-items">
            <div class="container-fluid">
                <div class="row">
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="btp" href="<?=$assets?>img/gallery/truelle.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/truelle.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="btp" href="<?=$assets?>img/gallery/machine.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/machine.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="btp" href="<?=$assets?>img/gallery/casque.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/casque.jpg" alt="">

                        </a>
            
                      </div>
              
                    </div>
                
                  </div>
                   
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    
                    <div class="single-popular-items mb-50 text-center">
                       
                      <div class="popular-img">
                         
                        <a data-fancybox="btp" href="<?=$assets?>img/gallery/gant.jpg" class="item-wrap fancybox">

                          <span class="fa fa-search"></span>

                          <img src="<?=$assets?>img/gallery/gant.jpg" alt="">

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
                  <p class="pera">Nous sommes votre meilleure solution de rénovation de maisons, de bureaux et de construction. Nous assurons la planification globale, la coordination et le contrôle d'un projet, pour que vous n'ayez à vous soucier de rien. Notre promesse en tant qu'entrepreneur est de créer une valeur communautaire dans chaque projet tout en offrant une expertise professionnelle.</p>
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
        interval: 2000
      });

      $('[data-fancybox="btp"]').fancybox({

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

            service: 'btp',

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