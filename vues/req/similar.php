<div class="row justify-content-center">
  <div class="col-xl-7 col-lg-8 col-md-10">
    <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
      <h1>similaires</h1>
    </div>
  </div>
</div>

<div class="popular-items pt-50">
 
  <div class="container-fluid">
   
    <div class="row justify-content-center">

      <?php 

        $req = $pdo->prepare("SELECT * FROM articles WHERE s_cat = ? AND uniqid != ? ORDER BY id DESC LIMIT 4");

        $req->execute([$sous_categorie, $uniqid]);


        while ($cat = $req->fetch()) {
        
          $cat_nom = $cat['nom'];

          $cat_img = $cat['img'];

          $cat_id = $cat['id'];
          
          $cat_uniqid = $cat['uniqid'];
          
          $cat_img = $cat['img'];

          ?>
           
            <div class="col-lg-3 col-md-3 col-sm-3">
         
              <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
         
                <div class="popular-img">
                 
                  <img src="<?=$img_art.$cat_uniqid.'/'.$cat_img?>" alt="<?=$cat_uniqid?>">
                 
                  <div class="img-cap">
                 
                    <span><?=$cat_nom?></span>
                 
                  </div>
                 
                  <div class="favorit-items">
                 
                    <a href="detail.php?detail=<?=$cat_id?>" class="btn">Acheter</a>
                 
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