<?php

require_once"../../setting.php";

?>
<div class="animated slow pulse section__content section__content--p30">
  
  <div class="container-fluid">
   
    <div class="row">
     
      <div class="col-md-12">
     
        <div class="overview-wrap">
     
          <h2 class="heading-title">Paramètres</h2>
     
        </div>
     
      </div>
    
    </div>

    <div class="container">

      <div class="col-lg-8 offset-md-2">

        <div class="card">
         
          <div class="card-header">
         
            <strong>Profil</strong>
         
          </div>
         
          <div class="card-body card-block">
         
            <form class="form-horizontal">
         
              <div class="row form-group">
         
                <div class="col col-md-12">

                  <label for="nf-country" class=" form-control-label">Pays</label>
         
                  <div class="input-group">

                    <input class="form-control" name="usercountry" id="usercountry" type="text">
                    
                    <!-- <div class="input-group-btn">
         
                      <button id="usercountry_id" class="btn btn-primary">Changer</button>
         
                    </div> -->
         
                  </div>
         
                </div>
         
              </div>
         
              <div class="row form-group">
         
                <div class="col col-md-12">

                  <label for="nf-name" class=" form-control-label">Nom d'utilisateur</label>
         
                  <div class="input-group">
         
                    <input type="text" id="username" name="username" placeholder="<?=$username?>" class="form-control">
         
                    <div class="input-group-btn">
         
                      <button id="username_id" class="btn btn-primary">Changer</button>
         
                    </div>
         
                  </div>
         
                </div>
         
              </div>
         
              <div class="row form-group">
         
                <div class="col col-md-12">

                  <label for="nf-email" class=" form-control-label">Email <small class="form-text text-muted">Changer l'email vous deconnectera</small></label>
         
                  <div class="input-group">
         
                    <input type="email" id="usermail" name="usermail" placeholder="<?=$usermail?>" class="form-control">
         
                    <div class="input-group-btn">
         
                      <button id="usermail_id" class="btn btn-primary">Changer</button>
         
                    </div>
         
                  </div>
         
                </div>
         
              </div>
         
              <div class="row form-group">
         
                <div class="col col-md-12">

                  <label for="nf-n" class=" form-control-label">N°1</label>
         
                  <div class="input-group">
         
                      <input type="text" id="usernum" name="usernum" placeholder="<?=$usernum?>" class="form-control" onkeypress="isInputNumber(event);">
         
                      <div class="input-group-btn">
         
                        <button id="usernum_id" class="btn btn-primary">Changer</button>
         
                      </div>
         
                  </div>
         
                </div>
         
              </div>
         
              <div class="row form-group">
         
                <div class="col col-md-12">

                  <label for ="nf-n2" class=" form-control-label">N°2</label>
         
                  <div class="input-group">
         
                    <input type="text" id="usernum2" name="usernum2" placeholder="<?=$usernum2?>" class="form-control" onkeypress="isInputNumber(event);">
         
                    <div class="input-group-btn">
         
                      <button id="usernum2_id" class="btn btn-primary">Changer</button>
         
                    </div>
         
                  </div>
         
                </div>
         
              </div>

              <div class="row form-group">
                  
                <div class="col col-md-12">

                  <label for="nf-pass" class=" form-control-label">Mot de passe</label>
                 
                  <div class="input-group">
                    
                    <input type="password" id="userpass" name="userpass" class="form-control">
                  
                    <div id="userpass_id" class="input-group-btn">
                  
                      <button class="btn btn-primary">Changer</button>
              
                    </div>
              
                  </div>
                
                </div>
              
              </div>

            </form>
        
          </div>
        
          <div class="card-footer">
          
            <button type="reset" class="btn btn-danger btn-sm">
          
              <i class="fa fa-ban"></i> Reset
          
            </button>
          
          </div>
        
        </div>

      </div>

    </div>

    <script type="text/javascript">

      $(document).ready(function () {

        // Selection du pays d'origine

        $("#usercountry").countrySelect({
          defaultCountry: "<?=$usercode?>",
         /* onlyCountries: ['ci', 'cm', 'sn'],*/
          responsiveDropdown: true,
          preferredCountries: ['cm', 'ci', 'sn']
        });

        $("#usercountry").change(function(e){

          e.preventDefault();

          const country = $("#usercountry").val();

          console.log(country);

          const url = 'upload_par.php';

          $.ajax({

            type: 'POST',

            url: url,

            data: {

              country : country,
            },

            success: function(country_rep){

              if (country_rep == 'oui') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Pays modifié avec success.",
                  type: 'success',
                  showConfirmButton: false,
                  timer: 3000
                
                }).then((result) =>{

                  $("#usercountry").countrySelect("destroy");

                  $('.main-content').load('vues/setting');

                });

              };

              if (country_rep == 'vide') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Vous devez selectionné un pays.",
                  type: 'error',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (country_rep == 'pas ce pays') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Ce pays ne figure pas dans la liste des pays autorisé.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

            }

          });

        });

        // MAJ du nom

        $("#username_id").click(function(e){

          e.preventDefault();

          const username = $("#username").val();

          const url = 'upload_par.php';

          $.ajax({

            type: 'POST',

            url: url,

            data: {

              username : username,
            },

            success: function(username_rep){

              if (username_rep == 'oui') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Nom modifié avec success.",
                  type: 'success',
                  showConfirmButton: false,
                  timer: 3000
                
                }).then((result) =>{

                  $('.main-content').load('vues/setting');

                });

              };

              if (username_rep == 'vide') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Vous avez posté des champs vides.",
                  type: 'error',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (username_rep == 'utilise') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Ce nom est déjà utilisé.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (username_rep == 'caractere') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Ce nom n'est pas valide.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

            }

          });

        });

        // MAJ de l'email

        $("#usermail_id").click(function(e){

          e.preventDefault();

          const email = $("#usermail").val();

          const url = 'upload_par.php';

          $.ajax({

            type: 'POST',

            url: url,

            data: {

              email : email,
            },

            success: function(email_rep){

              if (email_rep == 'oui') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Email modifié avec success. Deconnexion...",
                  type: 'success',
                  showConfirmButton: false,
                  timer: 5000
                
                }).then((result) =>{

                  window.open('logout.php', '_self');

                });

              };

              if (email_rep == 'vide') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Vous avez posté des champs vides.",
                  type: 'error',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (email_rep == 'utilise') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Ce mail est déjà utilisé.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (email_rep == 'email') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Email non valide.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

            }

          });

        });

        // MAJ du numéro 1

        $("#usernum_id").click(function(e){

          e.preventDefault();

          const num = $("#usernum").val();

          const url = 'upload_par.php';

          $.ajax({

            type: 'POST',

            url: url,

            data: {

              num : num,
            },

            success: function(num_rep){

              if (num_rep == 'oui') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Numero 1 modifié avec success.",
                  type: 'success',
                  showConfirmButton: false,
                  timer: 3000
                
                }).then((result) =>{

                  $('.main-content').load('vues/setting');

                });

              };

              if (num_rep == 'vide') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Vous avez posté des champs vides.",
                  type: 'error',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (num_rep == 'utilise') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Numero existe déjà.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

            }

          });

        });

        // MAJ du numéro 2

        $("#usernum2_id").click(function(e){

          e.preventDefault();

          const num2 = $("#usernum2").val();

          const url = 'upload_par.php';

          $.ajax({

            type: 'POST',

            url: url,

            data: {

              num2 : num2,
            },

            success: function(num2_rep){

              console.log(num2_rep);

              if (num2_rep == 'oui') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Numero 2 modifié avec success.",
                  type: 'success',
                  showConfirmButton: false,
                  timer: 3000
                
                }).then((result) =>{

                  $('.main-content').load('vues/setting');

                });

              };

              if (num2_rep == 'vide') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Vous avez posté des champs vides.",
                  type: 'error',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (num2_rep == 'utilise') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Numero existe déjà.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

            }

          });

        });

        // MAJ du MDP

        $("#userpass_id").click(function(e){

          e.preventDefault();

          const pass = $("#userpass").val();

          const url = 'upload_par.php';

          $.ajax({

            type: 'POST',

            url: url,

            data: {

              pass : pass,
            },

            success: function(pass_rep){

              if (pass_rep == 'oui') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Mot de passe modifié avec success.",
                  type: 'success',
                  showConfirmButton: false,
                  timer: 3000
                
                }).then((result) =>{

                  $('.main-content').load('vues/setting');

                });

              };

              if (pass_rep == 'vide') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Vous avez posté des champs vides.",
                  type: 'error',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

              if (pass_rep == 'utilise') {

                Swal.fire({

                  position: 'top-end',
                  title: 'Insertion',
                  text: "Mot de passe existe déjà.",
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 3000
                
                });

              };

            }

          });

        });

      })

    </script>

  </div>

  <div class="row bottom-fixed">
      
    <div class="col-md-12">
      
      <div class="copyright">

        <p>Copyright © <?=date("Y")?> <?=WEBNAME?>. All rights reserved.</p>

      </div>

    </div>

  </div>

</div>
