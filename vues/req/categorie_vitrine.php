<div class="popular-items pt-50">
 
  <div class="container-fluid">
   
    <div class="row justify-content-center">

      <?php 

        $req = $pdo->query("SELECT * FROM categories ORDER BY list_cat DESC");

        while ($cat = $req->fetch()) {
        
          $cat_nom = $cat['list_cat'];

          $cat_img = $cat['img'];

          ?>
           
            <div class="col-lg-3 col-md-6 col-sm-6">
         
              <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
         
                <div class="popular-img">
                 
                  <img src="<?=$assets?>img/gallery/<?=$cat_img?>" alt="" height="300">
                 
                  <div class="img-cap">
                 
                    <span><?=$cat_nom?></span>
                 
                  </div>
                 
                  <div class="favorit-items">
                 
                    <a href="shop.php" class="btn">Acheter</a>
                 
                  </div>

                </div>

              </div>

            </div>

          <?php

        }

      ?>

    </div>

  </div>

</div>