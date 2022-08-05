<?php

  /////////////////////////
  // demarrer la session //
  /////////////////////////

  session_start();

  //////////////////////////////////////////////////////////////
  // inclure le fichier de fonction et de connection à la bdd //
  //////////////////////////////////////////////////////////////

  require_once('../../app/inc/connect.php');

  require_once('../../app/inc/function.php');

  $user = $_SESSION['auth'];

  if ($_SESSION['auth']) {

    //////////////////////////////
    // recupération du username //
    //////////////////////////////

    $requser = $pdo->prepare("SELECT * FROM clients WHERE mail = ?");

    $requser->execute([$user]);

    $userinfo = $requser->fetch();

    $username = $userinfo['username'];

    $query = '';

    $output = [];

    $query .= "SELECT * FROM articles WHERE username = '$username' ";

    if(isset($_POST["search"]["value"]) AND !empty($_POST["search"]["value"])){

      $query .= 'AND nom LIKE "%'.$_POST["search"]["value"].'%" ';
      $query .= 'OR ( username = "'.$username.'" AND marque LIKE "%'.$_POST["search"]["value"].'%") ';
      $query .= 'OR ( username = "'.$username.'" AND cat LIKE "%'.$_POST["search"]["value"].'%") ';

      /*echo 'query : '.json_encode($query);*/
   
    }
  
    if(isset($_POST["order"]) AND !empty($_POST["order"])){

      /*echo "post_order : ".json_encode($_POST['order']);*/

      /*echo 'order column : '.$_POST['order']['0']['column'].' order dir : '.$_POST['order']['0']['dir'];*/

      $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
      /*echo 'query : '.json_encode($query);*/
    
    }else{
    
     $query .= 'ORDER BY created_at DESC ';
    
    }
    
    if($_POST["length"] != -1){

     $query .= 'LIMIT ' . $_POST['start'] . ',' . $_POST['length'];
    
    }

    $statement = $pdo->prepare($query);
    $statement->execute([]);
    $result = $statement->fetchAll();
    $data = array();
    $filtered_rows = $statement->rowCount();
    
    foreach($result as $row){

     $sub_array = array();
     $sub_array[] = $row["nom"];
     $sub_array[] = $row['cat'];
     $sub_array[] = $row["marque"];
     $sub_array[] = $row['prix'];
     $sub_array[] = $row["stock"];
     $sub_array[] = $row["country"];
     $sub_array[] = $row["livre"];
     $sub_array[] = '<div class="table-data-feature">

                                <button id="btn-shop" data-id_list="'.$row['uniqid'].'" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Éditer">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </button>
                                <button id="btn-del" data-id_list="'.$row['uniqid'].'" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>';
     $data[] = $sub_array;
    }

    $output = array(
     "draw"    => intval($_POST["draw"]),
     "recordsTotal"  =>  $filtered_rows,
     "recordsFiltered" => all_records('articles','username',$username),
     "data"    => $data,
    );

    /*echo json_encode($query);*/

    echo json_encode($output);

  }elseif (!isset($_SESSION["auth"])){

    redirect('../../logout.php');

  }

?>
