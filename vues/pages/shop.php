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

  <main>

    <!-- breadcrumb Start-->
    <div class="page-notification">

      <div class="container">

        <div class="row">
       
          <div class="col-lg-12">
       
            <nav aria-label="breadcrumb">
       
              <ol class="breadcrumb justify-content-center">
       
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
       
                <li class="breadcrumb-item"><a href="#">Shop</a></li> 
       
              </ol>
       
            </nav>
       
          </div>
       
        </div>

      </div>

    </div>
   
    <!-- listing Area Start -->
    <div class="">
       
      <div class="container">
       
        <div class="row">
       
          <div class="col-xl-7 col-lg-8 col-md-10">
       
            <div class="section-tittle mb-50">
       
              <h2>Chez nous</h2>

              <?php

                if (isset($_GET['cat']) and $_GET['cat'] == 'Vetements') {

                  $get = $_GET['cat'];

                  $req = $pdo->prepare("SELECT count(*) as c FROM articles WHERE cat = ?");

                  $req->execute([$get]);

                  $fetch = $req->fetch();

                  $nombre_articles = $fetch['c'];

                  ?>

                    <p>Près de <?=$nombre_articles.' différents '.$get?></p>

                  <?php

                }elseif (isset($_GET['cat']) and $_GET['cat'] == 'Cafes') {

                  $get = $_GET['cat'];

                  $req = $pdo->prepare("SELECT count(*) as c FROM articles WHERE cat = ?");

                  $req->execute([$get]);

                  $fetch = $req->fetch();

                  $nombre_articles = $fetch['c'];

                  ?>

                    <p>Près de <?=$nombre_articles.' différents '.$get?></p>

                  <?php

                }elseif (isset($_GET['cat']) and $_GET['cat'] == 'Parfums') {

                  $get = $_GET['cat'];

                  $req = $pdo->prepare("SELECT count(*) as c FROM articles WHERE cat = ?");

                  $req->execute([$get]);

                  $fetch = $req->fetch();

                  $nombre_articles = $fetch['c'];

                  ?>

                    <p>Près de <?=$nombre_articles.' différents '.$get?></p>

                  <?php

                }elseif (!isset($_GET['cat'])){

                  $req = $pdo->query("SELECT count(*) as c FROM articles");

                  $fetch = $req->fetch();

                  $nombre_articles = $fetch['c'];

                  ?>

                    <p>Près de <?=$nombre_articles.' types articles'?></p>

                  <?php

                }

              ?>
              
            </div>
       
          </div>
       
        </div>

        <div class="row">

          <!--? Left content -->
          <div class="col-xl-3 col-lg-3 col-md-4 ">
            <!-- Job Category Listing start -->
            <div class="category-listing mb-50">
                <!-- single one -->
                <div class="single-listing">
                  <!-- Select categories items start -->
                  <div class="select-job-items2"> 
                    <select name="select2" style="display: none;">
                      
                    </select>

                    <div class="nice-select" tabindex="0">
                    
                      <span class="current">Categories</span>
                    
                      <ul class="list" style="height: 120px;overflow: auto;">
                                
                          <li id="categorie_all" data-cat_all="all" class="option selected">All></li>
                      
                          <?php 
                          
                              $req = $pdo->query("SELECT * FROM categories ORDER BY list_cat ASC");

                              while ($cat = $req->fetch()) {

                                $cat_id = $cat['id'];

                                $cat_nom = $cat['list_cat'];

                                ?>
                                
                                  <li id="categorie_side" data-cat_side="<?=$cat_nom?>" class="option selected"><?=$cat_nom?>></li>

                                <?php

                                $sreq = $pdo->query("SELECT * FROM sous_categories WHERE id_categories = $cat_id ORDER BY list_cat ASC");

                                while ($scat = $sreq->fetch()) {
                                  
                                  $scat_nom = $scat['list_cat'];

                                  ?>
                                  
                                    <li id="sc_side" data-sc_side="<?=$scat_nom?>" class="option"><?=$scat_nom?></li>

                                  <?php
                                
                                }
                              
                              }
                          
                          ?>

                      </ul>

                    </div>
                 
                  </div>
                  <!--  Select categories items End-->

                  <!-- Select prix items start -->
                  <div class="select-job-items2"> 

                    <div class="nice-select" tabindex="0">
                    
                      <span class="current">Prix</span>
                    
                      <ul class="list" style="height: 120px;overflow: auto;">

                          <?php 
                          
                              $req = $pdo->query("SELECT * FROM categories ORDER BY list_cat ASC");

                              while ($cat = $req->fetch()) {

                                $cat_id = $cat['id'];

                                $cat_nom = $cat['list_cat'];

                                ?>
                                
                                  <li class="option selected"><?=$cat_nom?>></li>

                                <?php

                                $sreq = $pdo->query("SELECT DISTINCT (prix) FROM articles WHERE cat = '$cat_nom' ORDER BY prix ASC");

                                while ($scat = $sreq->fetch()) {
                                  
                                  $scat_prix = $scat['prix'];

                                  ?>
                                  
                                    <li id="prix" data-prix="<?=$scat_prix?>" class="option"><?=$scat_prix?></li>

                                  <?php
                                
                                }
                              
                              }
                          
                          ?>

                      </ul>

                    </div>
                 
                  </div>
                  <!--  Select prix items End-->
                </div>

            </div>
            <!-- Job Category Listing End -->
          </div>

          <!--?  Right content -->
          <div class="col-xl-9 col-lg-9 col-md-8 " style="height: 500px;overflow-y: auto;">
            <!--? New Arrival Start -->
            <div class="new-arrival new-arrival2">
                
              <div id="articles" class="row">

                <?php

                  /*if (isset($_GET['cat']) and $_GET['cat'] == 'Vetements') {

                    $get = $_GET['cat'];

                    $req = $pdo->prepare("SELECT * FROM articles WHERE cat = ? ORDER BY id DESC");

                    $req->execute([$get]);

                    while ($fetch = $req->fetch()) {

                      $nom = $fetch['nom'];

                      $prix = $fetch['prix'];

                      $img = $fetch['img'];

                      $img1 = $fetch['img1'];
         
                      $id = $fetch['id'];

                      $uniqid = $fetch['uniqid'];

                      $pays = $fetch['country'];

                      require('../req/cart_art.php');

                    }

                  }elseif (isset($_GET['cat']) and $_GET['cat'] == 'Cafes') {

                    $get = $_GET['cat'];

                    $req = $pdo->prepare("SELECT * FROM articles WHERE cat = ? ORDER BY id DESC");

                    $req->execute([$get]);

                    while ($fetch = $req->fetch()) {

                      $nom = $fetch['nom'];

                      $prix = $fetch['prix'];

                      $img = $fetch['img'];

                      $img1 = $fetch['img1'];
         
                      $id = $fetch['id'];

                      $uniqid = $fetch['uniqid'];

                      $pays = $fetch['country'];

                      require('../req/cart_art.php');

                    }

                  }elseif (isset($_GET['cat']) and $_GET['cat'] == 'Parfums') {

                    $get = $_GET['cat'];

                    $req = $pdo->prepare("SELECT * FROM articles WHERE cat = ? ORDER BY id DESC");

                    $req->execute([$get]);

                    while ($fetch = $req->fetch()) {

                      $nom = $fetch['nom'];

                      $prix = $fetch['prix'];

                      $img = $fetch['img'];

                      $img1 = $fetch['img1'];
         
                      $id = $fetch['id'];

                      $uniqid = $fetch['uniqid'];

                      $pays = $fetch['country'];

                      require('../req/cart_art.php');

                    }

                  }elseif (!isset($_GET['cat'])){

                    $req = $pdo->prepare("SELECT * FROM articles ORDER BY id DESC");

                    $req->execute([]);

                    while ($fetch = $req->fetch()) {

                      $nom = $fetch['nom'];

                      $prix = $fetch['prix'];

                      $img = $fetch['img'];

                      $img1 = $fetch['img1'];
         
                      $id = $fetch['id'];

                      $uniqid = $fetch['uniqid'];

                      $pays = $fetch['country'];

                      require('../req/cart_art.php');

                    }

                  }*/

                ?>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

</div>
<!--? New Arrival End -->

</div>
<!-- listing-area Area End -->

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

<!-- script Start -->   
  <?php 

    require_once("../layouts/_script.php");

  ?>        

  <script type="text/javascript">

    $(document).ready(function() {

      $('#articles').load('article.php')
    
    });

    $('li#categorie_all').click(function(){

      var th = $(this);

      var url = 'article.php';

      var cat = th.data('cat_all');

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    $('li#categorie_side').click(function(){

      var th = $(this);

      var url = 'article.php';

      var cat = th.data('cat_side');

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          categorie : cat,
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    $('li#sc_side').click(function(){

      var th = $(this);

      var url = 'article.php';

      var Scat = th.data('sc_side');

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          sc : Scat,
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    $('li#prix').click(function(){

      var th = $(this);

      var url = 'article.php';

      var prix = th.data('prix');

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          prix : prix,
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });
    
    function onlyOne(checkbox) {

      var checkboxes = document.getElementsByName('marque')

      checkboxes.forEach((item) => {
      
        if (item !== checkbox) item.checked = false
    
      });

      var values = (function() {

          var a = [];
        
          $(".checkbox:checked").each(function() {
        
              a.push(this.value);
        
          });
        
          return a[0];
      
      })()

      var url = 'vues/catalog/article.php'

      if (values != '') {

        $.ajax({

          type : 'POST',

          url : url,

          data : {

            marque : values

          },

          success: function(data){

            $('#articles').html(" "+data).show();

          }

        });

      }else{

      }
    
    }

  </script>
<!-- script End -->

</body>
</html>