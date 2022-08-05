<?php
  
  $app = "../../app/";

  $assets = "../../assets/";

  $vendor = "../../vendor/";

  $views = "../../views/";

  $img_art = $assets.'img/articles/';

  require_once($app.'inc/db.php');

  require_once($app.'inc/functions.php');

  if (isset($_GET['detail'])) {

    $get = $_GET['detail'];

    if (!is_used("articles", "id", $get)) {

      redirect("shop.php");

    }

    $req = $pdo->prepare("SELECT * FROM articles WHERE id = ?");

    $req->execute([$get]);

    $fetch = $req->fetch();

    $nom = $fetch['nom'];

    $categorie = $fetch['cat'];

    $sous_categorie = $fetch['s_cat'];

    $prix = $fetch['prix'];

    $img = $fetch['img'];

    $img1 = $fetch['img1'];

    $img2 = $fetch['img2'];

    $descr = $fetch['descr'];

    $id = $fetch['id'];

    $uniqid = $fetch['uniqid'];

    $pays = $fetch['country'];

    $descr = htmlspecialchars_decode($descr);
   
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
          <main>
              <!-- breadcrumb Start-->
              <div class="page-notification">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12">
                              <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb justify-content-center">
                                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                      <li class="breadcrumb-item"><a href="shop.php">shop</a></li> 
                                      <li class="breadcrumb-item"><a href="#">Details</a></li> 
                                  </ol>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- breadcrumb End-->
              <!--?  Details start -->
              <div class="directory-details pt-padding">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8">
                              <div class="small-tittle mb-20">
                                  <h2>Description</h2>
                              </div>
                              <div class="directory-cap mb-40">
                                <p><?=$nom?></p>
                                <p><?=$descr?></p>
                              </div>
                              <div class="small-tittle mb-20">
                                  <h2>Images</h2>
                              </div>
                              <div class="gallery-img">
                              
                                <div class="row">
          
                                  <div class="col-4">
                                  
                                    <a data-fancybox="gallery" href="<?=$img_art.$uniqid.'/'.$img?>" class="item-wrap fancybox">

                                      <span class="fa fa-search"></span>

                                      <img class="img-fluid" src="<?=$img_art.$uniqid.'/'.$img?>">

                                    </a>

                                  </div>
          
                                  <div class="col-4">
                                  
                                    <a data-fancybox="gallery" href="<?=$img_art.$uniqid.'/'.$img1?>" class="item-wrap fancybox">

                                      <span class="fa fa-search"></span>

                                      <img class="img-fluid" src="<?=$img_art.$uniqid.'/'.$img1?>">

                                    </a>

                                  </div>
          
                                  <div class="col-4">
                                  
                                    <a data-fancybox="gallery" href="<?=$img_art.$uniqid.'/'.$img2?>" class="item-wrap fancybox">

                                      <span class="fa fa-search"></span>

                                      <img class="img-fluid" src="<?=$img_art.$uniqid.'/'.$img2?>">

                                    </a>

                                  </div>
                                  
                                  <?php  

                                    /*lister_images($img_art.$uniqid.'/');*/

                                  ?>

                                </div>
                              
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <!-- <div class="map">
                                  <img src="<?=$assets?>img/gallery/map.gif" alt="">
                              </div> -->
                              <div class="form-wrapper pt-80">
                                  <div class="row ">
                                      <div class="col-xl-12">
                                          <div class="small-tittle mb-30">
                                              <h2>Commandez</h2>
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
                                                  <textarea name="message" id="message" placeholder="Details de la commande"></textarea>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                                  <div class="col-lg-12">
                                      <div class="submit-info">
                                          <button id="commande" class="submit-btn2">Terminer la commande</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--  Details End -->
              <!-- listing-area Area End -->
              <!--? Popular Locations Start 01-->
              <?php 

                include_once("../req/similar.php");

              ?> 
              <!-- Popular Locations End -->
          </main>

          <!-- Footer Start -->   
          <?php 

            require_once("../layouts/_footer.php");

          ?>        
          <!-- Footer End -->

          <!--? Search model Begin -->
          <?php 

            require_once("../layouts/_search.php");

          ?>   
          <!-- Search model end -->

          <!-- Scroll Up -->
          <?php 

            require_once("../layouts/_top.php");

          ?> 

          <!-- JS here -->

          <!-- script start -->
          <?php 

            require_once("../layouts/_script.php");

          ?>        
          <!-- script end -->

          <script>

            $('[data-fancybox="gallery"]').fancybox({

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

                  service: 'shop',

                  /*data: data,*/

                },

                dataType: 'text',

                success: function(rep){

                  if(rep !== "success"){

                    alert("Remplissez tous les champs!");
                  
                  };

                  if(rep == "success"){

                    Swal.fire({

                      title: 'Commande validée',
                      text: "Votre commande a étée validée, vous serai contacté sous peu.",
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

        </body>

      </html>


    <?php

  }

?>