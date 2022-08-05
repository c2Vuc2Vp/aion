<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">

  <a href="detail.php?detail=<?=$id?>">
    
      <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
       
        <div class="popular-img">
    
          <img src="<?=$img_art.$uniqid.'/'.$img?>" alt="<?=$uniqid?>">
         
          <div class="favorit-items">
         
            <!-- <span class="flaticon-heart"></span> --><!-- 
            <img src="<?=$assets?>img/gallery/favorit-card.png" alt=""> -->
         
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
       
          <span><?=$prix?> F CFA</span>
    
        </div>
            
      </div>
      
  </a>

</div>