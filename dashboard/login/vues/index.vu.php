<?php

  $assets = '../../assets/';

  $vendor = '../../vendor/';

  $css = 'css/';

  $js = 'js/';

?>
<!DOCTYPE html>

<html lang="fr" class="scroll">

  <head>

    <!-- metadonnées -->
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial scale-1">

    <meta name="description" content="<?=WEBDESCR?>">

    <meta name="author" content="<?=AUTHOR?>">

    <!-- Title Page-->
    <title><?=WEBNAME?>_compte</title>

    <!-- Fontfaces CSS-->
    <!--===============================================================================================-->
    <link rel="icon" href="<?=$assets?>img/elements/logo/favicon.ico">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=$vendor?>sweetalert/sweetalert2.css">
    <!--===============================================================================================-->
    <link href="<?=$css?>font-face.css" rel="stylesheet" media="all">
    <!--===============================================================================================-->
    <!-- MDB4 CSS -->
    <link rel="stylesheet" href="<?=$vendor?>mdb4/css/mdb.css" media="all">
    <!--===============================================================================================-->
    <link href="<?=$vendor?>font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!--===============================================================================================-->
    <link href="v<?=$vendor?>font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <!--===============================================================================================-->
    <link href="<?=$vendor?>mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!--===============================================================================================-->

    <!-- Bootstrap CSS-->
    <link href="<?=$vendor?>bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=$vendor?>animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=$vendor?>bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=$vendor?>wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=$vendor?>css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=$vendor?>slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=$vendor?>select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=$vendor?>perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Table CSS -->
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=$vendor?>DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=$vendor?>DataTables-1.10.20/css/responsive.dataTables.min.css">
   
    <!-- Select-country CSS -->
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=$vendor?>country/css/countrySelect.css">

    <!-- Main CSS-->
    <link href="<?=$css?>theme.css" rel="stylesheet" media="all">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=$assets?>css/style.css">
    <!--===============================================================================================-->
    <!-- dropzone CSS -->
    <link rel="stylesheet" href="<?=$vendor?>dropzone5/dist/dropzone.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?=$css?>infos_card.css">

   

  </head>

  <body class="animated slow fadeIn delay-5s">
    
    <div class="page-wrapper">
     
      <!-- HEADER MOBILE-->
     
      <header class="header-mobile d-block d-lg-none">
   
        <div class="header-mobile__bar">
      
          <div class="container-fluid">
      
            <div class="header-mobile-inner">
      
              <a class="logo" href="">
      
                <img src="<?=$assets?>img/elements/logo/logo_mob.png" alt="Yumeres">
      
              </a>
      
              <button class="hamburger hamburger--slider" type="button">
      
                <span class="hamburger-box">
      
                  <span class="hamburger-inner"></span>
      
                </span>
      
              </button>
      
            </div>
      
          </div>
      
        </div>

        <nav class="navbar-mobile">
      
          <div class="container-fluid">
    
            <ul class="navbar-mobile__list list-unstyled">
              
              <li class="active has-sub">
            
                <button class="link btn btn-outline-warning" id="account" type="button"><i class="fas fa-home"></i>&nbsp; Dashboard</button>
            
              </li>
             
              <li>
            
                <button class="link btn btn-outline-success" id="add" type="button"><i class="fas fa-plus"></i>&nbsp; Ajout</button>
          
              </li>
          
              <li class="has-sub">
            
                <button class="link btn btn-outline-secondary" id="list" type="button"><i class="fas fa-list"></i>&nbsp; liste</button>
              
              </li>
                  
              <li>
                
                <button class="link btn btn-outline-danger" id="setting" type="button"><i class="fas fa-cogs"></i>&nbsp; Paramètre</button>
              
              </li>
              
            </ul>
         
          </div>
       
        </nav>
      
      </header>
    
      <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->
    
      <aside class="animated delay-5s rubberBand slow menu-sidebar d-none d-lg-block">
       
        <div class="logo">
       
          <a href="#"><img src="<?=$assets?>img/elements/logo/logo.png" alt="Yumeres"></a>
       
        </div>
       
        <?php

          require_once "sidebar.php";

        ?>
    
      </aside>
     
      <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
      <div class="page-container">
    
        <!-- HEADER DESKTOP-->
    
        <header class="header-desktop">
    
          <div class="section__content section__content--p30">
    
            <div class="container-fluid">
    
              <div class="header-wrap">
    
                <div class="ml-auto">
    
                  <div class="account-wrap">
    
                    <div class="account-item clearfix js-item-menu">
    
                      <div class="image">
    
                        <img class="rounded-circle" src="<?=$assets?>img/elements/logo/logo_ob.jpg" alt="<?=$username?>" />
    
                      </div>
    
                      <div class="content">
    
                        <a class="js-acc-btn" href="#"><?=$username?></a>
    
                      </div>
    
                      <div class="account-dropdown js-dropdown">
    
                        <div class="info clearfix">
    
                          <div class="image">
    
                            <a href="#"><img class="rounded-circle" src="<?=$assets?>img/elements/logo/logo_ob.jpg" alt="<?=$username?>"/></a>
    
                          </div>
    
                          <div class="content">
    
                            <h5 class="name">
    
                              <a href="#"><?=$username?></a>
    
                            </h5>
    
                            <span class="email"><?=$usermail?></span>
    
                          </div>
    
                        </div>
    
                        <div class="account-dropdown__footer">
    
                          <a href="logout.php"><i class="zmdi zmdi-power"></i>Logout</a>
    
                        </div>
    
                      </div>
    
                    </div>
    
                  </div>
    
                </div>
    
              </div>
    
            </div>
    
          </div>
    
        </header>
    
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
    
        <div class="main-content">

        </div>
    
        <!-- END MAIN CONTENT-->
    
      </div>
    
      <!-- END PAGE CONTAINER-->

    </div>

    <!--===============================================================================================-->
    <!-- Jquery JS-->
    <script src="<?=$vendor?>jQuery-3.3.1/jquery-3.3.1.js"></script>

    <!-- Table JS -->
    <script src="<?=$vendor?>DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?=$vendor?>DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?=$vendor?>DataTables-1.10.20/js/dataTables.responsive.min.js"></script>
    <!--===============================================================================================-->
    <!-- <script src="<?=$vendor?>DataTables-1.10.20/js/dataTables.select.min.js"></script> -->
    <!--===============================================================================================-->
    <!-- sweetalert -->
    <script src="<?=$vendor?>sweetalert/sweetalert2.js"></script>
    <!--===============================================================================================-->
    <!-- CKeditor4 -->
    <script src="<?=$vendor?>ckeditor_4/ckeditor/ckeditor.js"></script>
    <!--===============================================================================================-->
    <!-- dropzoneJS -->
    <script src="<?=$vendor?>dropzone5/dist/dropzone.js"></script>

    <!-- Bootstrap JS-->
    <script src="<?=$vendor?>bootstrap-4.1/popper.min.js"></script>
    <script src="<?=$vendor?>bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=$vendor?>slick/slick.min.js">
    </script>
    <script src="<?=$vendor?>wow/wow.min.js"></script>
    <script src="<?=$vendor?>animsition/animsition.min.js"></script>
    <script src="<?=$vendor?>bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=$vendor?>counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=$vendor?>counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=$vendor?>circle-progress/circle-progress.min.js"></script>
    <script src="<?=$vendor?>perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=$vendor?>country/js/countrySelect.js"></script>
    <script src="<?=$vendor?>mdb4/js/mdb.js"></script>
    <script src="<?=$vendor?>chartjs/Chart.bundle.min.js"></script>
    <script src="<?=$vendor?>select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?=$assets?>js/mon_js.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
        
      // fonction de restriction de caractère au nombre

      function isInputNumber(evt){

        var ch = String.fromCharCode(evt.which);

        if(!(/[0-9]/.test(ch))){

          evt.preventDefault();

        }

      };

    </script>
    
    <script src="js/main.js"></script>

  </body>

</html>
<!-- end document-->
