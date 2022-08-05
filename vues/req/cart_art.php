<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

    <a href="detail.php?detail=<?=$id?>">
        
        <div class="single-new-arrival mb-50 text-center">
           
            <div class="popular-img">
             
              <img src="<?=$img_art.$uniqid.'/'.$img?>" alt="<?=$uniqid?>">
             
              <div class="favorit-items">
             
                <!-- <span class="flaticon-heart"></span> -->
                <!-- <img src="<?=$assets?>img/gallery/favorit-card.png" alt=""> -->
               
              </div>
           
            </div>
           
            <div class="popular-caption">
              
              <h3><a href="detail.php?detail=<?=$id?>"><?=$nom?></a></h3>
              
              <div class="rating mb-10">
              
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              
              </div>
           
              <span id='p'><?=$prix?> F CFA</span>
        
            </div>
        
        </div>
  </a>

</div>