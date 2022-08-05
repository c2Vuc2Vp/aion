<?php

/*  throw new Exception("Impossible de charger l'inclusion de la base de données!");  
*/
  try{
  
    include_once('app/inc/functions.php');

    require_once('app/inc/db.php');
  
  }catch(Exception $e){

    echo "Erreur : ".$e->getMessage();

    exit;

  }

  redirect('vues/pages/');


?>