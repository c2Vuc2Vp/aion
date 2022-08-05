<?php
	
	include_once('../../app/inc/functions.php');
	
	include_once('../../app/inc/db.php');

	if (isset($_POST) && (!empty($_POST))) {
	
		extract($_POST);

		/////////////////////////////////////
    // protection contre la faille xss //
    /////////////////////////////////////

		$nom = xss($nom);

		$numero = xss($numero);

		$email = xss($email);

		$msg = xss($msg);

		$service = xss($service);

		if ($service == 'shop') {

			if ( (isset($nom) && (!empty($nom))) ) {
				
				if ( (isset($numero) && (!empty($numero))) ) {

					if ( (isset($email) && (!empty($email))) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

						if ( (isset($msg) && (!empty($msg))) ) {
							
							$insert = $pdo->prepare("INSERT INTO commandes SET nom = ?, numero = ?, email = ?, msg = ?, service = ?");

							$insert->execute([$nom,$numero,$email,$msg,$service]);

							echo 'success';

						}else{

							echo "msg";

						}

					}else{

						echo "email";

					}

				}else{
					
					echo "numero";

				}

			}else{

				echo "nom";
				
			}
			
		}

		if ($service == 'btp') {

			if ( (isset($nom) && (!empty($nom))) ) {
				
				if ( (isset($numero) && (!empty($numero))) ) {

					if ( (isset($email) && (!empty($email))) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

						if ( (isset($msg) && (!empty($msg))) ) {
							
							$insert = $pdo->prepare("INSERT INTO commandes SET nom = ?, numero = ?, email = ?, msg = ?, service= ?");

							$insert->execute([$nom,$numero,$email,$msg,$service]);

							echo 'success';

						}else{

							echo "msg";

						}

					}else{

						echo "email";

					}

				}else{
					
					echo "numero";

				}

			}else{

				echo "nom";
				
			}
			
		}

		if ($service == 'ie') {

			if ( (isset($nom) && (!empty($nom))) ) {
				
				if ( (isset($numero) && (!empty($numero))) ) {

					if ( (isset($email) && (!empty($email))) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

						if ( (isset($msg) && (!empty($msg))) ) {
							
							$insert = $pdo->prepare("INSERT INTO commandes SET nom = ?, numero = ?, email = ?, msg = ?, service= ?");

							$insert->execute([$nom,$numero,$email,$msg,$service]);

							echo 'success';

						}else{

							echo "msg";

						}

					}else{

						echo "email";

					}

				}else{
					
					echo "numero";

				}

			}else{

				echo "nom";
				
			}
			
		}
		
	}

?>