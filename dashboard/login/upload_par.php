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

    $requser->execute(array());

    $userinfo = $requser->fetch();

    $userid = $userinfo['id'];

    $username = $userinfo['username'];

    $usermail = $userinfo['mail'];

    $usernum = $userinfo['tel_1'];

    $usernum2 = $userinfo['tel_2'];

    $userpass = $userinfo['password'];

    $userpays = $userinfo['country'];

    /////////////////////////////////////////
    // initialisation du tableau d'erreurs //
    /////////////////////////////////////////

    $errors = [];

    if(isset($_POST['country']) && !empty($_POST['country'])) {

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $country = xss($_POST['country']);

      if (is_used('pays','country',$country)) {

        // création de la requete sql pour récupérer le code country
        $req_code = $pdo->prepare("SELECT code FROM pays WHERE country = ?");

        $req_code->execute([$country]);

        $codefetch = $req_code->fetch();

        $code = $codefetch['code'];

        // création de la requete SQL pour le paramètre pour la table clients
        $query = $pdo->prepare("UPDATE `clients` SET code = ?, country = ? WHERE id = ?");
        
        $query->execute([$code,$country,$userid]);

        // création de la requete SQL pour le paramètre pour la table paiements
        $query = $pdo->prepare("UPDATE `paiements` SET country = ? WHERE username = ?");
        
        $query->execute([$country,$username]);

        echo "oui";

      }elseif (!is_used('pays','country',$country)){

        echo 'pas ce pays';

      }

    }elseif(isset($_POST['country']) && empty($_POST['country'])){

      echo "vide";
   
    }

    // vérification si les données ont bien été posté
    if(isset($_POST['username']) && !empty($_POST['username'])) {

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $userName = xss($_POST['username']);

      if (!is_used('clients','username',$userName)) {

        if(preg_match("/^[a-z0-9A-Z_éæè*]+$/", $userName)){

          // création de la requete SQL clients
          $query = $pdo->prepare("UPDATE `clients` SET username = ? WHERE id = ?");
          
          $query->execute([$userName,$userid]);

          // création de la requete SQL pour la table articles
          $query = $pdo->prepare("UPDATE `articles` SET username = ? WHERE username = ?");
          
          $query->execute([$userName,$username]);

          // création de la requete SQL pour la table paiements
          $query = $pdo->prepare("UPDATE `paiements` SET username = ? WHERE username = ?");
          
          $query->execute([$userName,$username]);

          // création de la requete SQL pour la table infos
          $query = $pdo->prepare("UPDATE `infos` SET auteur = ? WHERE auteur = ?");
          
          $query->execute([$userName,$username]);

          echo "oui";

        }elseif(!preg_match("/^[a-z0-9A-Z_éæè*]+$/", $userName)){

          echo 'caractere';

        }
      
      }elseif(is_used('clients','username',$userName)){

        echo "utilise";
        
      }

    }elseif(isset($_POST['username']) && empty($_POST['username'])){

      echo "vide";
   
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $userMail = xss($_POST['email']);

      if (!is_used('clients','mail',$userMail)) {

        if (filter_var($userMail, FILTER_VALIDATE_EMAIL)) {

          // création de la requete SQL pour la table clients
          $query = $pdo->prepare("UPDATE `clients` SET mail = ? WHERE id = ?");
          
          $query->execute([$userMail,$userid]);

          // création de la requete SQL pour la table infos
          $query = $pdo->prepare("UPDATE `infos` SET mail = ? WHERE auteur = ?");
          
          $query->execute([$userMail,$username]);

          // création de la requete SQL pour la table paiements
          $query = $pdo->prepare("UPDATE `paiements` SET mail = ? WHERE username = ?");
          
          $query->execute([$userMail,$username]);

          echo "oui";
          
        }elseif (!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
          
          echo 'email';

        }

      }elseif(is_used('clients','mail',$userMail)){

        echo "utilise";
        
      }

    }elseif(isset($_POST['email']) && empty($_POST['email'])){

      echo "vide";
   
    }

    if(isset($_POST['num']) && !empty($_POST['num'])) {

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $userNum = xss($_POST['num']);

      if (!is_used('clients','tel_1',$userNum)) {

        // création de la requete SQL pour la tables clients
        $query = $pdo->prepare("UPDATE `clients` SET tel_1 = ? WHERE id = ?");
        
        $query->execute([$userNum,$userid]);

        // création de la requete SQL pour la table paiements
        $query = $pdo->prepare("UPDATE `paiements` SET tel_1 = ? WHERE username = ?");
        
        $query->execute([$userNum,$username]);

        echo "oui";

      }elseif (is_used('clients','tel_1',$userNum)){

        echo 'utilise';

      }

    }elseif(isset($_POST['num']) && empty($_POST['num'])){

      echo "vide";
   
    }

    if(isset($_POST['num2']) && !empty($_POST['num2'])) {

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $userNum2 = xss($_POST['num2']);

      if (!is_used('clients','tel_2',$userNum2)) {

        // création de la requete SQL pour la table clients
        $query = $pdo->prepare("UPDATE `clients` SET tel_2 = ? WHERE id = ?");
        
        $query->execute([$userNum2,$userid]);

        // création de la requete SQL pour la table paiements
        $query = $pdo->prepare("UPDATE `paiements` SET tel_2 = ? WHERE username = ?");
        
        $query->execute([$userNum,$username]);

        echo "oui";
      
      }elseif (is_used('clients','tel_1',$userNum2)){

        echo 'utilise';

      }

    }elseif(isset($_POST['num2']) && empty($_POST['num2'])){

      echo "vide";
   
    }

    if(isset($_POST['pass']) && !empty($_POST['pass'])) {

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $userPass = xss($_POST['pass']);

      if (!password_verify($userPass, $userpass)) {

        // création de la requete SQL
        $query = $pdo->prepare("UPDATE `clients` SET password = ? WHERE id = ?");
         
        ////////////////////
        // hashage du mdp //
        ////////////////////

        $password = password_hash($userPass, PASSWORD_BCRYPT);

        $query->execute([$password,$userid]);

        echo "oui";
      
      }elseif (password_verify($userPass, $userpass)){

        echo 'utilise';

      }

    }elseif(isset($_POST['pass']) && empty($_POST['pass'])){

      echo "vide";
   
    }

  }elseif (!isset($_SESSION["auth"])){

    redirect('logout.php');

  }

  ?>
