<?php

  /////////////////////////
  // demarrer la session //
  /////////////////////////

  session_start();

  //////////////////////////////////////////////////////////////
  // inclure le fichier de fonction et de connection à la bdd //
  //////////////////////////////////////////////////////////////

  require_once "../../app/inc/function.php";

  require_once "../../app/inc/connect.php";

  $user = $_SESSION['auth'];

  if($_SESSION['auth']){

    ////////////////////////////////////
    // Récupération des infos clients //
    ////////////////////////////////////

    $requser = $pdo->prepare("SELECT * FROM clients WHERE mail = '$user'");

    $requser->execute([]);

    $userinfo = $requser->fetch();

    $userid = $userinfo['id'];

    $client = $userinfo['username'];

    /////////////////////////////////////////
    // initialisation du tableau d'erreurs //
    /////////////////////////////////////////

    $errors = [];

    // vérification si le fichier à été posté
    if(isset($_FILES["img"]) AND !empty($_FILES["img"])){

      if (isset($_POST) AND !empty($_POST)) {

        extract($_POST);

        if (isset($nom) && isset($username) && isset($stock) && isset($categorie) && isset($sous_categorie) && isset($marque) && isset($content) && isset($prix)) {

          // autres informations postés
          /////////////////////////////////////
          // protection contre la faille xss //
          /////////////////////////////////////
          $nom = xss($nom);
          $country = xss($country);
          $username = xss($username);
          $stock = xss($stock);
          $categorie = xss($categorie);
          $sous_categorie = xss($sous_categorie);
          $marque = xss($marque);
          $content = xss($content);
          $prix = xss($prix);

          // initialisation d'un id unique pour comme nom de dossier des impages up
          $uniqid = uniqid(); 

          /*$req = $pdo->prepare("SELECT * FROM articles WHERE nom = ? AND username = ? AND cat = ?");

          $req->execute([$nom, $client,$categorie]);

          $used = $req->fetch();

          $ar = $used['nom'];*/

          $ar = is_used('articles', 'uniqid', $uniqid);

          if ($ar == false) {
            
            $mes_imgs = array();

            foreach (array_keys($_FILES['img']['name']) as $n) {
              
              foreach (array_keys($_FILES['img']) as $i) {
              
                $mes_imgs[$n][$i] = $_FILES['img'][$i][$n];
                
              }

            }

            //initialisation du compteur nom d'image
            $c = 0;

            //initialisation du tableau des noms des images
            $img = array();

            foreach ($mes_imgs as $mon_img) {
              
              // assignation des informations du fichier
              $name = $mon_img['name'];

              $mime = $mon_img['type'];
                
              $data = $mon_img['tmp_name'];
              /*$data = file_get_contents($_FILES['img']['tmp_name']);*/ # pour inserer dans un blob
              $size = $mon_img['size'];

              $err = $mon_img['error'];

              //renommage du nom des fichiers
              $ren = pathinfo($name);

              $new = $c.'.'.$ren['extension'];

              $img[] = $new;

              //incremetation par 1 du compteur
              $c++;

              // se rassurer que le fichier à été téléchargé sans erreur
              if($err == 0) {

                //configuration de l'environnement du fichier
                $chemin = "clients/img_article/";

                $max = 10000000;

                $ext = array('jpg','jpeg','png');

                $extup = strtolower(substr(strrchr($name,'.'),1));

                // vérification du type de fichier
                if ($mime == 'image/jpeg' OR $mime == 'image/png' and in_array($extup,$ext)) {

                  // vérification de la taille du fichier
                  if ($size <= $max) {

                    //initialisation de la vérification de l'existence du dossier de l'article et de sa création
                    $dossier = $chemin.'/'.$uniqid;

                    if (!file_exists($dossier)) {
                      
                      mkdir($dossier, 0775, true);
                                
                    }

                    $targetFile = $dossier.'/'.$new;
                  
                    $deplacement = move_uploaded_file($data, $targetFile);
                         
                    // vérifier si le fichier est déplacé avec succes
                    if($deplacement) {

                      $errors = "success";
                        
                    }else{

                      $errors = "deplacement";

                    }

                  }else{

                    $errors = "volumineux";

                  }
                  
                }else{

                  $errors = "type"; 
                }

              }else{

                $errors = "erreur";
             
              }

            }

            $img0 = $img[0];

            $img1 = $img[1];

            $img2 = $img[2];
                   
            // création de la requete SQL
            $article = $pdo->prepare("INSERT INTO articles SET nom = ?, uniqid = ?, username = ?, stock = ?, cat = ?, s_cat = ?, marque = ?, descr = ?, prix = ?, img = ?, img1 = ?, img2 = ?, country = ?");
            
            $article->execute([$nom, $uniqid, $username, $stock, $categorie, $sous_categorie, $marque, $content, $prix, $img0, $img1, $img2, $country]);
            
            $errors = "success";

          }else{

            $errors = 'existe';

          }
          
        }else{

          $errors = "vide";
        }

      }else {

        $errors = "non";

      }

    }else {

      $errors = "non";

    }

    echo $errors;
    

  }elseif (!isset($_SESSION["auth"])){

    redirect('logout.php');

  }

  ?>
