<footer>
  <!-- Footer Start-->
  <div class="footer-area footer-padding">
      <div class="container-fluid ">
          <div class="row d-flex justify-content-between">
              <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8">
               <div class="single-footer-caption mb-50">
                 <div class="single-footer-caption mb-30">
                    <!-- logo -->
                    <div class="footer-logo mb-35">
                     <a href="index.php"><img src="<?=$assets?>img/logo/logo.png" style="width: 120px;" alt=""></a>
                 </div>
                 <div class="footer-tittle">
                     <div class="footer-pera">
                         <p>L'éfficacité Notre Qualité</p>
                     </div>
                 </div>
                 
          </div>
      </div>
  </div>
  <!-- <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
      <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
              <h4 style="color:black;">Import/Export</h4>
              <ul>
                  <li><a href="#">Vivrié</a></li>
                  <li><a href="#">Vêtement</a></li>
                  <li><a href="#"></a></li>
              </ul>
          </div>
      </div>
  </div> -->
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
      <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
              <h4 style="color:black;">Shop Category</h4>
              <ul>

                <?php 

                  $req = $pdo->query("SELECT * FROM categories ORDER BY list_cat");

                  while ($cat = $req->fetch()) {
                  
                    $cat_nom = $cat['list_cat'];

                    $cat_list = $cat['list_cat'];

                    ?>
                    
                      <li><a href="shop.php?cat=<?=$cat_list?>"><?=$cat_list?></a></li>
                   
                    <?php
                 
                  }
                 
                ?>

              </ul>
          </div>
      </div>
  </div>
  <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
      <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
              <h4 style="color:black;">Services</h4>
              <ul>
                  <li><a href="btp.php">Construction</a></li>
                  <li><a href="ie.php">Import export</a></li>
                  <li><a href="shop.php">Shop</a></li>
              </ul>
          </div>
      </div>
  </div>
  <div id="contacts" class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
      <div class="single-footer-caption mb-50">
          <div class="footer-tittle">
              <h4 style="color:black;">contacts</h4>
              <ul>
                  <li><a target="_blank" href="https://wa.me/+2250749457677">+2250749457677</a></li>
                  <li><a target="_blank" href="tel:+2250544799958">+2250544799958</a></li>
                  <li><a target="_blank" href="mailto:Tomb2620@gmail.com">Tomb2620@gmail.com</a></li>
                  <li><a target="_blank" href="https://www.google.ci/maps/place/Marcory,+Abidjan/@5.2943185,-3.9793452,14z/data=!4m5!3m4!1s0xfc1ee9ef0f06397:0x9923a48ebd9e7d45!8m2!3d5.3027149!4d-3.9827405?hl=fr">Abidjan, Marcory, Terminus SOTRA</a></li>
              </ul>
          </div>
      </div>
  </div>

    <!-- Footer End-->
</footer>