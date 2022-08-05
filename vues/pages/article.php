<?php

  $app = "../../app/";

  $assets = "../../assets/";

  $vendor = "../../vendor/";

  $views = "../../views/";

  $img_art = $assets.'img/articles/';


  /////////////////////////
  // demarrer la session //
  /////////////////////////

  session_start();

  //////////////////////////////////////////////////////////////
  // inclure le fichier de fonction et de connection à la bdd //
  //////////////////////////////////////////////////////////////

  require_once($app.'inc/db.php');

  require_once($app.'inc/functions.php');

  if (!isset($_POST) OR (!isset($_POST) && isset($_POST['page']))) {
    
    $art = $pdo->query("SELECT count(*) as nb FROM articles");

    $arti = $art->fetch();

    $Narticle = $arti['nb'];

    $nbre_articles_par_page = 24;

    $nbre_pages_max_gauche_et_droite = 2;

    $last_page = ceil($Narticle / $nbre_articles_par_page);

    if(isset($_POST['page']) && is_numeric($_POST['page'])){
    
      $page_num = $_POST['page'];
    
    } else {
    
      $page_num = 1;
    
    }

    if($page_num < 1){
    
      $page_num = 1;
    
    } else if($page_num > $last_page) {
    
      $page_num = $last_page;
    
    }

    $limit = 'LIMIT '.($page_num - 1) * $nbre_articles_par_page. ',' . $nbre_articles_par_page;

    $sql = "SELECT * FROM articles ORDER BY id DESC $limit";

    $pagination = '';

    if($last_page != 1){
    
      if($page_num > 1){
    
        $previous = $page_num - 1;
        
        $pagination .= '<li class="page-item"><a class="page-link" id="page" data-page="'.$previous.'" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

        for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
    
          if($i > 0){
           
            $pagination .= '<li class="page-item"><a class="page-link" id="page" data-page="'.$i.'" href="#">'.$i.'</a></li>';
    
          }
    
        }
    
      }

      $pagination .= '<li class="page-item active"><a class="page-link" id="page" data-page href="#">'.$page_num.'<span class="sr-only">(current)</span></a></li>';

      for($i = $page_num+1; $i <= $last_page; $i++){     
    
        $pagination .= '<li class="page-item"><a class="page-link" id="page" data-page="'.$i.'" href="#">'.$i.'</a></li>';

        if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
    
          break;
    
        }
    
      }

      if($page_num != $last_page){
    
        $next = $page_num + 1;
    
        $pagination .= '<li class="page-item"><a class="page-link" aria-label="Next" id="page" data-page="'.$next.'" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
    
      }
    
    }
    
    ?>

      <!-- breadcrumb Start-->

      <!-- <div class="row">
     
        <div class="col-lg-12">
     
          <nav aria-label="breadcrumb">
     
            <ol class="breadcrumb justify-content-center">
     
              <li class="breadcrumb-item">
                <a id="catalogue" href="#" id="bdcbhm">
                  <svg fill="none" height="14.5" stroke="#333" stroke-width="2" viewBox="0 0 24 24"
                       width="14"
                       xmlns="http://www.w3.org/2000/svg">
                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg>
                </a>
              </li>

              <?php
          
                if (!isset($_POST['cat'])) {
                  
                  ?>
                    <li aria-current="page" class="breadcrumb-item active">
                    
                      <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                    
                    </li>

                  <?php

                }else{

                  if (is_used('categories', 'list_cat', $_POST['cat'])) {

                    ?>

                      
                      <li aria-current="page" class="breadcrumb-item active">
                      
                        <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                      
                      </li>

                      <li aria-current="page" class="breadcrumb-item active">

                        <a id="categorie" href="#" data-cat="<?=$_POST['cat']?>" id="bdcbhm"><?=$_POST['cat']?></a>

                      </li>

                    <?php

                  }else{

                    ?>

                      <li aria-current="page" class="breadcrumb-item active">

                        <a id="catalogue" href="#" id="bdcbhm">Shop</a>

                      </li>

                      <li aria-current="page" class="breadcrumb-item active">

                        <a href="#" id="bdcbhm">Inconnu</a>

                      </li>

                    <?php

                  }

                }

              ?>
     
            </ol>
     
          </nav>
     
        </div>
     
      </div> -->

      <!-- breadcrumb End-->

      <!-- Debut : Appel des cartes article -->

        <?php

          $articles = $pdo->query($sql);

          while ($Art = $articles->fetch()) {

            $nom = $Art['nom'];

            $prix = $Art['prix'];

            $img = $Art['img'];

            $img1 = $Art['img1'];

            $img2 = $Art['img2'];

            $id = $Art['id'];

            $uniqid = $Art['uniqid'];

            $pays = $Art['country'];

            require('../req/cart_art.php');

          }

        ?>

      <!-- Fin : Appel des cartes article -->

      <!-- Debut : pagination -->

      <div class="row">

        <div class="col-12">

          <nav aria-label="Page navigation">

            <ul id="pagination" class="pagination justify-content-end mt-50">
                
              <?=$pagination?>
                
            </ul>

          </nav>

        </div>

      </div>

      <!-- Fin : pagintaion -->

    <?php

  }elseif (isset($_POST['prix']) OR (isset($_POST['prix']) && isset($_POST['page_prix']))) {

    extract($_POST);

    if ($prix != '' ) {
     
      $art = $pdo->query("SELECT count(*) as nb FROM articles WHERE prix = '$prix'");

      $arti = $art->fetch();

      $Narticle = $arti['nb'];

      $nbre_articles_par_page = 24;

      $nbre_pages_max_gauche_et_droite = 2;

      $last_page = ceil($Narticle / $nbre_articles_par_page);

      if(isset($_POST['page_prix']) && is_numeric($_POST['page_prix'])){
      
        $page_num = $_POST['page_prix'];
      
      } else {
      
        $page_num = 1;
      
      }

      if($page_num < 1){
      
        $page_num = 1;
      
      } else if($page_num > $last_page) {
      
        $page_num = $last_page;
      
      }

      $limit = 'LIMIT '.($page_num - 1) * $nbre_articles_par_page. ',' . $nbre_articles_par_page;

      //Cette requête sera utilisée plus tard
      $sql = "SELECT * FROM articles WHERE prix = '$prix' ORDER BY id DESC $limit";

      $pagination = '';

      if($last_page != 1){
      
        if($page_num > 1){
      
          $previous = $page_num - 1;
          
          $pagination .= '<li class="page-item"><a class="page-link" id="page_prix" data-page="'.$previous.'" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

          for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
      
            if($i > 0){
             
              $pagination .= '<li class="page-item"><a class="page-link" id="page_prix" data-page="'.$i.'" href="#">'.$i.'</a></li>';
      
            }
      
          }
      
        }

        $pagination .= '<li class="page-item active"><a class="page-link" id="page_prix" data-page href="#">'.$page_num.'<span class="sr-only">(current)</span></a></li>';

        for($i = $page_num+1; $i <= $last_page; $i++){     
      
          $pagination .= '<li class="page-item"><a class="page-link" id="page_prix" data-page="'.$i.'" href="#">'.$i.'</a></li>';

          if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
      
            break;
      
          }
      
        }

        if($page_num != $last_page){
      
          $next = $page_num + 1;
      
          $pagination .= '<li class="page-item"><a class="page-link" aria-label="Next" id="page" data-page="'.$next.'" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
      
        }
      
      }

      ?>

        <div class="container-fluid" id="articles">

          <!-- breadcrumb Start-->

          <!-- <div class="row">
         
            <div class="col-lg-12">
         
              <nav aria-label="breadcrumb">
         
                <ol class="breadcrumb justify-content-center">
         
                  <li class="breadcrumb-item">
                    <a id="catalogue" href="#" id="bdcbhm">
                      <svg fill="none" height="14.5" stroke="#333" stroke-width="2" viewBox="0 0 24 24"
                           width="14"
                           xmlns="http://www.w3.org/2000/svg">
                          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                          <polyline points="9 22 9 12 15 12 15 22"></polyline>
                      </svg>
                    </a>
                  </li>

                  <?php
              
                    if (!isset($_POST['cat'])) {
                      
                      ?>
                        <li aria-current="page" class="breadcrumb-item active">
                        
                          <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                        
                        </li>

                      <?php

                    }else{

                      if (is_used('categories', 'list_cat', $_POST['cat'])) {

                        ?>

                          
                          <li aria-current="page" class="breadcrumb-item active">
                          
                            <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                          
                          </li>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a id="categorie" href="#" data-cat="<?=$_POST['cat']?>" id="bdcbhm"><?=$_POST['cat']?></a>

                          </li>

                        <?php

                      }else{

                        ?>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a id="catalogue" href="#" id="bdcbhm">Shop</a>

                          </li>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a href="#" id="bdcbhm">Inconnu</a>

                          </li>

                        <?php

                      }

                    }

                  ?>
         
                </ol>
         
              </nav>
         
            </div>
         
          </div> -->

          <!-- breadcrumb End-->

          <!-- Debut : Appel des cartes article -->

          <div class="row">

            <?php

              if (is_used('articles', 'prix', $prix)) {
               
                $articles = $pdo->query($sql);

                while ($Art = $articles->fetch()) {

                  $nom = $Art['nom'];

                  $prix = $Art['prix'];

                  $img = $Art['img'];

                  $img1 = $Art['img1'];

                  $img2 = $Art['img2'];
     
                  $id = $Art['id'];

                  $uniqid = $Art['uniqid'];

                  $pays = $Art['country'];

                  require('../req/cart_art.php');
              
                }

              }

            ?>
            
          </div>

          <!-- Fin : Appel des cartes article -->

          <!-- Debut : pagination -->

          <div class="row">

            <div class="col-12">

              <nav aria-label="Page navigation">

                <ul id="pagination" class="pagination justify-content-end mt-50">
                    
                  <?=$pagination?>
                    
                </ul>

              </nav>

            </div>

          </div>

          <!-- Fin : pagintaion -->

        </div>

      <?php

    }
   
  }elseif (isset($_POST['categorie']) OR (isset($_POST['categorie']) && isset($_POST['page_cat']))) {

    extract($_POST);

    if ($categorie != '' ) {
     
      $art = $pdo->query("SELECT count(*) as nb FROM articles WHERE cat = '$categorie'");

      $arti = $art->fetch();

      $Narticle = $arti['nb'];

      $nbre_articles_par_page = 24;

      $nbre_pages_max_gauche_et_droite = 2;

      $last_page = ceil($Narticle / $nbre_articles_par_page);

      if(isset($_POST['page_cat']) && is_numeric($_POST['page_cat'])){
      
        $page_num = $_POST['page_cat'];
      
      } else {
      
        $page_num = 1;
      
      }

      if($page_num < 1){
      
        $page_num = 1;
      
      } else if($page_num > $last_page) {
      
        $page_num = $last_page;
      
      }

      $limit = 'LIMIT '.($page_num - 1) * $nbre_articles_par_page. ',' . $nbre_articles_par_page;

      //Cette requête sera utilisée plus tard
      $sql = "SELECT * FROM articles WHERE cat = '$categorie' ORDER BY id DESC $limit";

      $pagination = '';

      if($last_page != 1){
      
        if($page_num > 1){
      
          $previous = $page_num - 1;
          
          $pagination .= '<li class="page-item"><a class="page-link" id="page_cat" data-page="'.$previous.'" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

          for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
      
            if($i > 0){
             
              $pagination .= '<li class="page-item"><a class="page-link" id="page_cat" data-page="'.$i.'" href="#">'.$i.'</a></li>';
      
            }
      
          }
      
        }

        $pagination .= '<li class="page-item active"><a class="page-link" id="page_cat" data-page href="#">'.$page_num.'<span class="sr-only">(current)</span></a></li>';

        for($i = $page_num+1; $i <= $last_page; $i++){     
      
          $pagination .= '<li class="page-item"><a class="page-link" id="page_cat" data-page="'.$i.'" href="#">'.$i.'</a></li>';

          if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
      
            break;
      
          }
      
        }

        if($page_num != $last_page){
      
          $next = $page_num + 1;
      
          $pagination .= '<li class="page-item"><a class="page-link" aria-label="Next" id="page_cat" data-page="'.$next.'" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
      
        }
      
      }

      ?>

        <div class="container-fluid" id="articles">

          <!-- breadcrumb Start-->

          <!-- <div class="row">
         
            <div class="col-lg-12">
         
              <nav aria-label="breadcrumb">
         
                <ol class="breadcrumb justify-content-center">
         
                  <li class="breadcrumb-item">
                    <a id="catalogue" href="#" id="bdcbhm">
                      <svg fill="none" height="14.5" stroke="#333" stroke-width="2" viewBox="0 0 24 24"
                           width="14"
                           xmlns="http://www.w3.org/2000/svg">
                          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                          <polyline points="9 22 9 12 15 12 15 22"></polyline>
                      </svg>
                    </a>
                  </li>

                  <?php
              
                    if (!isset($_POST['cat'])) {
                      
                      ?>
                        <li aria-current="page" class="breadcrumb-item active">
                        
                          <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                        
                        </li>

                      <?php

                    }else{

                      if (is_used('categories', 'list_cat', $_POST['cat'])) {

                        ?>

                          
                          <li aria-current="page" class="breadcrumb-item active">
                          
                            <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                          
                          </li>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a id="categorie" href="#" data-cat="<?=$_POST['cat']?>" id="bdcbhm"><?=$_POST['cat']?></a>

                          </li>

                        <?php

                      }else{

                        ?>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a id="catalogue" href="#" id="bdcbhm">Shop</a>

                          </li>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a href="#" id="bdcbhm">Inconnu</a>

                          </li>

                        <?php

                      }

                    }

                  ?>
         
                </ol>
         
              </nav>
         
            </div>
         
          </div> -->

          <!-- breadcrumb End-->

          <!-- Debut : Appel des cartes article -->

          <div class="row">

            <?php

              if (is_used('articles', 'cat', $categorie)) {
               
                $articles = $pdo->query($sql);

                while ($Art = $articles->fetch()) {

                  $nom = $Art['nom'];

                  $prix = $Art['prix'];

                  $img = $Art['img'];

                  $img1 = $Art['img1'];

                  $img2 = $Art['img2'];
     
                  $id = $Art['id'];

                  $uniqid = $Art['uniqid'];

                  $pays = $Art['country'];

                  require('../req/cart_art.php');

                }


              }

            ?>
            
          </div>

          <!-- Fin : Appel des cartes article -->

          <!-- Debut : pagination -->

          <div class="row">

            <div class="col-12">

              <nav aria-label="Page navigation">

                <ul id="pagination" class="pagination justify-content-end mt-50">
                    
                  <?=$pagination?>
                    
                </ul>

              </nav>

            </div>

          </div>

          <!-- Fin : pagintaion -->

        </div>

      <?php

    }
   
  }elseif (isset($_POST['sc']) OR (isset($_POST['sc']) && isset($_POST['page_sc']))) {

    extract($_POST);

    if ($sc != '' ) {
     
      $art = $pdo->query("SELECT count(*) as nb FROM articles WHERE s_cat = '$sc'");

      $arti = $art->fetch();

      $Narticle = $arti['nb'];

      $nbre_articles_par_page = 24;

      $nbre_pages_max_gauche_et_droite = 2;

      $last_page = ceil($Narticle / $nbre_articles_par_page);

      if(isset($_POST['page_sc']) && is_numeric($_POST['page_sc'])){
      
        $page_num = $_POST['page_sc'];
      
      } else {
      
        $page_num = 1;
      
      }

      if($page_num < 1){
      
        $page_num = 1;
      
      } else if($page_num > $last_page) {
      
        $page_num = $last_page;
      
      }

      $limit = 'LIMIT '.($page_num - 1) * $nbre_articles_par_page. ',' . $nbre_articles_par_page;

      //Cette requête sera utilisée plus tard
      $sql = "SELECT * FROM articles WHERE s_cat = '$sc' ORDER BY id DESC $limit";

      $pagination = '';

      if($last_page != 1){
      
        if($page_num > 1){
      
          $previous = $page_num - 1;
          
          $pagination .= '<li class="page-item"><a class="page-link" id="page_sc" data-page="'.$previous.'" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

          for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
      
            if($i > 0){
             
              $pagination .= '<li class="page-item"><a class="page-link" id="page_sc" data-page="'.$i.'" href="#">'.$i.'</a></li>';
      
            }
      
          }
      
        }

        $pagination .= '<li class="page-item active"><a class="page-link" id="page_sc" data-page href="#">'.$page_num.'<span class="sr-only">(current)</span></a></li>';

        for($i = $page_num+1; $i <= $last_page; $i++){     
      
          $pagination .= '<li class="page-item"><a class="page-link" id="page_sc" data-page="'.$i.'" href="#">'.$i.'</a></li>';

          if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
      
            break;
      
          }
      
        }

        if($page_num != $last_page){
      
          $next = $page_num + 1;
      
          $pagination .= '<li class="page-item"><a class="page-link" aria-label="Next" id="page_sc" data-page="'.$next.'" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
      
        }
      
      }

      ?>

        <div class="container-fluid" id="articles">

          <!-- breadcrumb Start-->

          <!-- <div class="row">
         
            <div class="col-lg-12">
         
              <nav aria-label="breadcrumb">
         
                <ol class="breadcrumb justify-content-center">
         
                  <li class="breadcrumb-item">
                    <a id="catalogue" href="#" id="bdcbhm">
                      <svg fill="none" height="14.5" stroke="#333" stroke-width="2" viewBox="0 0 24 24"
                           width="14"
                           xmlns="http://www.w3.org/2000/svg">
                          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                          <polyline points="9 22 9 12 15 12 15 22"></polyline>
                      </svg>
                    </a>
                  </li>

                  <?php
              
                    if (!isset($_POST['cat'])) {
                      
                      ?>
                        <li aria-current="page" class="breadcrumb-item active">
                        
                          <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                        
                        </li>

                      <?php

                    }else{

                      if (is_used('categories', 'list_cat', $_POST['cat'])) {

                        ?>

                          
                          <li aria-current="page" class="breadcrumb-item active">
                          
                            <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                          
                          </li>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a id="categorie" href="#" data-cat="<?=$_POST['cat']?>" id="bdcbhm"><?=$_POST['cat']?></a>

                          </li>

                        <?php

                      }else{

                        ?>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a id="catalogue" href="#" id="bdcbhm">Shop</a>

                          </li>

                          <li aria-current="page" class="breadcrumb-item active">

                            <a href="#" id="bdcbhm">Inconnu</a>

                          </li>

                        <?php

                      }

                    }

                  ?>
         
                </ol>
         
              </nav>
         
            </div>
         
          </div> -->

          <!-- breadcrumb End-->

          <!-- Debut : Appel des cartes article -->

          <div class="row">

            <?php

              if (is_used('articles', 's_cat', $sc)) {
               
                $articles = $pdo->query($sql);

                while ($Art = $articles->fetch()) {

                  $nom = $Art['nom'];

                  $prix = $Art['prix'];

                  $img = $Art['img'];

                  $img1 = $Art['img1'];
 
                  $img2 = $Art['img2'];    
                  
                  $id = $Art['id'];

                  $uniqid = $Art['uniqid'];

                  $pays = $Art['country'];
                 
                  require('../req/cart_art.php');

                }


              }

            ?>
            
          </div>

          <!-- Fin : Appel des cartes article -->

          <!-- Debut : pagination -->

          <div class="row">

            <div class="col-12">

              <nav aria-label="Page navigation">

                <ul id="pagination" class="pagination justify-content-end mt-50">
                    
                  <?=$pagination?>
                    
                </ul>

              </nav>

            </div>

          </div>

          <!-- Fin : pagintaion -->

        </div>

      <?php

    }
   
  }elseif ((isset($_POST) && empty($_POST)) OR (isset($_POST) && empty($_POST) OR isset($_POST['page']))) {

    $art = $pdo->query("SELECT count(*) as nb FROM articles");

    $arti = $art->fetch();

    $Narticle = $arti['nb'];

    $nbre_articles_par_page = 24;

    $nbre_pages_max_gauche_et_droite = 2;

    $last_page = ceil($Narticle / $nbre_articles_par_page);

    if(isset($_POST['page']) && is_numeric($_POST['page'])){
    
      $page_num = $_POST['page'];
    
    } else {
    
      $page_num = 1;
    
    }

    if($page_num < 1){
    
      $page_num = 1;
    
    } else if($page_num > $last_page) {
    
      $page_num = $last_page;
    
    }

    $limit = 'LIMIT '.($page_num - 1) * $nbre_articles_par_page. ',' . $nbre_articles_par_page;

    //Cette requête sera utilisée plus tard
    $sql = "SELECT * FROM articles ORDER BY id DESC $limit";

    $pagination = '';

    if($last_page != 1){
    
      if($page_num > 1){
    
        $previous = $page_num - 1;
        
        $pagination .= '<li class="page-item"><a class="page-link" id="page" data-page="'.$previous.'" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

        for($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++){
    
          if($i > 0){
           
            $pagination .= '<li class="page-item"><a class="page-link" id="page" data-page="'.$i.'" href="#">'.$i.'</a></li>';
    
          }
    
        }
    
      }

      $pagination .= '<li class="page-item active"><a class="page-link" id="page" data-page href="#">'.$page_num.'<span class="sr-only">(current)</span></a></li>';

      for($i = $page_num+1; $i <= $last_page; $i++){     
    
        $pagination .= '<li class="page-item"><a class="page-link" id="page" data-page="'.$i.'" href="#">'.$i.'</a></li>';

        if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
    
          break;
    
        }
    
      }

      if($page_num != $last_page){
    
        $next = $page_num + 1;
    
        $pagination .= '<li class="page-item"><a class="page-link" aria-label="Next" id="page" data-page="'.$next.'" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
    
      }
    
    }

    ?>

      <div class="container-fluid" id="articles">

        <!-- breadcrumb Start-->

        <!-- <div class="row">
       
          <div class="col-lg-12">
       
            <nav aria-label="breadcrumb">
       
              <ol class="breadcrumb justify-content-center">
       
                <li class="breadcrumb-item">
                  <a id="catalogue" href="#" id="bdcbhm">
                    <svg fill="none" height="14.5" stroke="#333" stroke-width="2" viewBox="0 0 24 24"
                         width="14"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                  </a>
                </li>

                <?php
            
                  if (!isset($_POST['cat'])) {
                    
                    ?>
                      <li aria-current="page" class="breadcrumb-item active">
                      
                        <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                      
                      </li>

                    <?php

                  }else{

                    if (is_used('categories', 'list_cat', $_POST['cat'])) {

                      ?>

                        
                        <li aria-current="page" class="breadcrumb-item active">
                        
                          <a id="catalogue" href="#" id="bdcbhm">Shop</a>
                        
                        </li>

                        <li aria-current="page" class="breadcrumb-item active">

                          <a id="categorie" href="#" data-cat="<?=$_POST['cat']?>" id="bdcbhm"><?=$_POST['cat']?></a>

                        </li>

                      <?php

                    }else{

                      ?>

                        <li aria-current="page" class="breadcrumb-item active">

                          <a id="catalogue" href="#" id="bdcbhm">Shop</a>

                        </li>

                        <li aria-current="page" class="breadcrumb-item active">

                          <a href="#" id="bdcbhm">Inconnu</a>

                        </li>

                      <?php

                    }

                  }

                ?>
       
              </ol>
       
            </nav>
       
          </div>
       
        </div> -->

        <!-- breadcrumb End-->

        <!-- Debut : Appel des cartes article -->

        <div class="row">

          <?php

            $articles = $pdo->query($sql);

            while ($Art = $articles->fetch()) {

              $nom = $Art['nom'];

              $prix = $Art['prix'];

              $img = $Art['img'];

              $img1 = $Art['img1'];

              $img2 = $Art['img2'];

              $id = $Art['id'];

              $uniqid = $Art['uniqid'];

              $pays = $Art['country'];

              require('../req/cart_art.php');

            }

          ?>
          
        </div>

        <!-- Fin : Appel des cartes article -->

        <!-- Debut : pagination -->

        <div class="row">

          <div class="col-12">

            <nav aria-label="Page navigation">

              <ul id="pagination" class="pagination justify-content-end mt-50">
                  
                <?=$pagination?>
                  
              </ul>

            </nav>

          </div>

        </div>

        <!-- Fin : pagintaion -->

      </div>

    <?php
    
  }

  ?>

  <script type="text/javascript">

    $('a#catalogue').click(function(){

      var th = $(this);

      var url = 'article.php';
      
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

    $('a#page').click(function(){

      var th = $(this);

      var url = 'article.php';

      var page = th.data("page");

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          page : page,

        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    $('a#categorie').click(function(){

      var th = $(this);

      var url = 'article.php';

      var cat = th.data('cat');

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

    $('a#page_cat').click(function(){

      var th = $(this);

      var cat = document.getElementById("categorie").dataset.cat;

      var url = 'article.php';

      var page = th.data("page");

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          page_cat : page,

          categorie : cat,
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    $('a#sc').click(function(){

      var th = $(this);

      var url = 'article.php';

      var Scat = th.data('sc');

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

    $('a#page_sc').click(function(){

      var th = $(this);

      var cat = document.getElementById("sc").dataset.sc;

      var url = 'article.php';

      var page = th.data("page");

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          page_sc : page,

          sc : cat,
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    $('a#page_prix').click(function(){

      var th = $(this);

      var prix = document.getElementById("prix").dataset.prix;

      var url = 'article.php';

      var page = th.data("page");

      $.ajax({

        url: url,
        
        type: 'POST',
        
        data: {
        
          page_prix : page,

          prix : prix,
        
        },
        
        cache: false,
        
        success: function(html) {
          
          $('#articles').html(" "+html).show();
        
        } 

      });

    });

    /*Fonction pour avoir les délais des animations*/

    function liste_delai(){
    
      var delai = "delay-1s|delay-2s|delay-3s|delay-4s|delay-5s";

      return delai;
    
    }

    /*Fonction  pour avoir les animations*/

    function liste_anime(){
    
      /*var anime = "bounce|flash|pulse|rubberBand|shake|headShake|swing|tada|wobble|jello|bounceIn|bounceInDown|bounceInLeft|bounceInRight|bounceInUp|bounceOut|bounceOutDown|bounceOutUp|bounceOUtRight|bounceOUtLeft|fadeIn|fadeInDown|fadeInDownBig|fadeInLeft|fadeInLeftBig|fadeInRight|fadeInRightBig|fadeInUp|fadeInUpBig|fadeOUt|fadeOUtDown|fadeOUtDownBig|fadeOutLeft|fadeOutLeftBig|fadeOutRight|fadeOutRightBig|fadeOUtUp|fadeOUtUpBig|flip|flipInX|flipInY|flipOutX|flipOutY|lightSpeedIn|lightSpeedOut|rotateIn|rotateInDownLeft|rotateInDownRight|rotateInUpLeft|rotateInUpRight|rotateOut|rotateOutDownLeft|rotateOutDownRight|rotateOutUpLeft|rotateOutUpRight|hinge|jackInTheBox|rollIn|rollOUt|zoomIn|zoomInDown|zoomInLeft|zoomInRight|zoomInUp|zoomOut|zoomOutDown|zoomOutLeft|zoomOutRight|zoomOutUp|slideInDown|slideInLeft|slideInRight|slideInUp|slideOutDown|slideOutLeft|slideOutRight|slideOutUp";*/
     
      var anime = "bounce|flash|pulse|rubberBand|shake|headShake|swing|tada|wobble|jello|bounceIn|bounceInDown|bounceInLeft|bounceInRight|bounceInUp|fadeIn|fadeInDown|fadeInDownBig|fadeInLeft|fadeInLeftBig|fadeInRight|fadeInRightBig|fadeInUp|fadeInUpBig|flip|flipInX|flipInY|lightSpeedIn|rotateIn|rotateInDownLeft|rotateInDownRight|rotateInUpLeft|rotateInUpRight|jackInTheBox|rollIn|zoomIn|zoomInDown|zoomInLeft|zoomInRight|zoomInUp|slideInDown|slideInLeft|slideInRight|slideInUp";
     
      return anime;
    }

    //Variable pour avoir les animations de manière séparée
    var sep_anime = liste_anime().split('|');
    //Variable pour avoir les delais des animations de manière séparée
    var sep_delai = liste_delai().split('|');
    
    var nb_anime = sep_anime.length;
    var nb_delai = sep_delai.length;

    var arts = $('.art');

    for(var i = 0; i < arts.length; i++){
      
      var rand_anime = Math.floor(Math.random()*nb_anime);
      var rand_delai = Math.floor(Math.random()*nb_delai);

      var add_rand = sep_delai[rand_delai] + " " + sep_anime[rand_anime];
      arts.eq(i).addClass(add_rand);
      /*console.log(arts[i]);*/
      
    }

    setTimeout(function() {

      for(var i = 0; i < arts.length; i++){

        arts.removeClass('animated');
        /*console.log(arts[i]);*/

      }

    }, 15000);

   </script>

  <?php

  

  