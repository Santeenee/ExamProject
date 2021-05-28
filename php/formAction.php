<?php

function redirect($url)
{
	echo '<script>window.location.replace("' . $url . '");</script>';
}

include_once('partials/dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pagina = $_POST['pagina'];

	$sql = "SELECT DISTINCT replace(nomePiatto,' ', '_') as piatto, tipo, prezzo
					FROM piatto
					WHERE tipo = '$pagina'";

	if (!($result = $conn->query($sql))) {
		die("<script>
					alert('query non riuscita')
				</script>");
	}

	//* data schema
	/*
	$ORDINE = [
		["tipo" => "bevande", "nome"=>"acqua", "quantita"=>"5", "prezzo"=>"2"],
		["tipo" => "bevande", "nome"=>"vino", "quantita"=>"3", "prezzo"=>"5"],
		["tipo" => "primi", "nome"=>"carbonara", "quantita"=>"1", "prezzo"=>"7"]
	];
	*/


	if (!isset($_COOKIE["ORDINEcookie"])) {
		$ORDINE = [];
		$countPiatti = 0;
	} else {
		echo $data . "<br><br>";
		print_r($data);
		$data = json_decode($_COOKIE['ORDINEcookie'], true);
	}

	//* COLLECTING DATA...
	while ($row = $result->fetch_assoc()) {
		$piatto = $row['piatto'];

		echo "<script>console.log('$countPiatti')</script>";

		$ORDINE[$countPiatti] = [
			"tipo" => $_POST['pagina'],
			"nome" => $piatto,
			"quantita" => $_POST[$piatto],
			"prezzo" => $row['prezzo']
		];

		echo "<script>
						console.log(' $_POST[$piatto]  =>  $piatto ')
					</script>";

		$countPiatti++;
	}
	setcookie('ORDINEcookie', json_encode($ORDINE), time() + 3600, '../');
	//$data = json_decode($_COOKIE['ORDINEcookie'], true);

	//print_r($data);

	switch ($pagina) {
		case 'bevande':

			//redirect('primi.php');
			break;

		case 'primi':

			//redirect('secondi.php');
			break;

		case 'secondi':

			//redirect('dessert.php');
			break;

		case 'dessert':

			include('partials/summary.php');
			break;

		case 'summary':

			include('partials/summary.php');
			break;

		default:

			redirect('../index.php');
			break;
	}

	$conn->close();
} else {
	echo '<h1>Something is rotten in <s>the state of denmark</s> my webapp</h1>';
}

?>
<!-- <a style="display: block;" href="menu">indietro</a> -->