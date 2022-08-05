<?php

require_once"../../account.php";

?>
<div class="infos animated slow pulse section__content section__content--p30">
  
  <div class="row">

    <button type="button" class="btn btn-info" id="info">Informations</button>
  
  </div>
  
  <div class="container" id="container">

    <div class="box col-ml-4">

      <div class="glass"></div>
    
      <div class="content">

        <h2>Info</h2>
        <h3>Général</h3>
        <p>C'est ici que toutes les informations vous seront transmisent. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button></i>Supprimer</button>
      </div>
    
    </div>

    <?php

      $info = $pdo->query("SELECT * FROM infos ORDER BY id DESC");

      $info->execute([]);

      while ($infos = $info->fetch()) {

        $id = $infos['id'];
        
        $titre = $infos['titre'];

        $texte = $infos['info'];
      
        ?>

          <div class="box col-ml-4">

            <div class="glass"></div>
          
            <div class="content">

              <h2>Info</h2>
              <h3><?=$titre?></h3>
              <p><?=$texte?></p>
               <?php if ($userrole == 'a') { ?><button data-id="<?=$id?>" id="sup<?=$id?>"></i>Supprimer</button><?php } ?>
            </div>
          
          </div>

          <script type="text/javascript">
            
            // Suppression

            $(document).on('click','#sup<?=$id?>', function(){

              var id = $(this).data('id');

              var table = "infos";

              console.log(id);

              if (id == '') {

                Swal.fire(
                  'Erreur!',
                  'Veillez choisir un id.',
                  'error'
                );

                return false;

              };

              Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Supprimé cette info!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui!'
              }).then((result) => {

                if (result.value) {

                  $.ajax({

                    url: 'supp_info.php',

                    method: 'post',

                    data: {

                      id: id,

                    },

                    dataType: 'text',

                    success: function(data){

                      $('.main-content').load('vues/account');

                      if (data == 'Del') {

                        Swal.fire({
                          position: 'top-end',
                          title: 'Supprimer',
                          text: "Supprimer avec success.",
                          type: 'success',
                          showConfirmButton: false,
                          timer: 3000
                        });

                      }

                    }

                  });

                };

              });

            })
            
          </script>

        <?php
      
      }

    ?>
  
  </div>

</div>

<script>

  $(document).ready(function() {

     var infos = $('#info');

     var container = $('#container');

     var container_c = $('#container');

    $('#info').click(function(){

      if(container.visibility != "hidden" ){

        container[0].style.visibility = "hidden";

      }

      if(container_c.visibility == "hidden" ){

        container_c[0].style.visibility = "visible";

      }

    });

  })
  
</script>

<script src="js/main.js"></script>
