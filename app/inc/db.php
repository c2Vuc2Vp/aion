<?php 

	try{

		$pdo = new PDO('mysql:host=localhost;dbname=id72416538_aion', 'id72416538', 'Mh8DeN2Ue64t');

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		/*$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);*/

	}catch(PDOException $e){

		echo "Connexion à la base de données échouée!".$e->getMessage();

		exit;
	}

?>