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


    /////////////////////////////////////////
    // initialisation du tableau d'erreurs //
    /////////////////////////////////////////

    $errors = [];

    // vérification si les infos ont bien été posté
    if(!empty($_POST['info']) && !empty($_POST['titre'])) {

      extract($_POST);

      // informations postés
      /////////////////////////////////////
      // protection contre la faille xss //
      /////////////////////////////////////
      $titre = xss($titre);

      $info = xss($info);

      // création de la requete SQL
      $query = $pdo->prepare("INSERT INTO `infos` SET mail = ?, info = ?, titre = ?, auteur = ?");
      
      $query->execute([$usermail,$info,$titre,$username]);

      echo "oui";

    }else{

      echo "vide";
   
    }

  }elseif (!isset($_SESSION["auth"])){

    redirect('logout.php');

  }

  ?>
