<?php

function redirect($url)
{
	echo '<script>window.location.replace("' . $url . '");</script>';
}

include_once('partials/dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pagina = $_POST['pagina'];
	$sql = "SELECT DISTINCT replace(nomePiatto,' ', '_') as piatto, tipo, unita, disponibilita, prezzo FROM piatto WHERE tipo = '$pagina'";

	if (!($result = $conn->query($sql))) {
		die("<script>alert('query non riuscita')/script>");
	}

	//* data schema
	/*
	$ORDINE = [
		["tipo" => "bevande", "nome"=>"acqua", "quantita"=>"5", "prezzo"=>"2"],
		["tipo" => "bevande", "nome"=>"vino", "quantita"=>"3", "prezzo"=>"5"],
		["tipo" => "primi", "nome"=>"carbonara", "quantita"=>"1", "prezzo"=>"7"]
	];
	*/

	//* COLLECT and ORGANIZE DATA

	$ORDINE = [];
	if (!isset($_COOKIE["ORDINEcookie"])) {

		$countPiatti = 0;
	} else {

		$data = json_decode($_COOKIE['ORDINEcookie'], true);
		$countPiatti = sizeof($data);

		echo "<br>ORDINEcookie:<br><br>";
		print_r($data);
	}

	while ($row = $result->fetch_assoc()) {
		if ($row['disponibilita'] == 1) {
			$piatto = $row['piatto'];
			echo '<script>console.log("' . $countPiatti . '")</script>';

			$ORDINE[$countPiatti] = [
				"tipo" => $_POST['pagina'],
				"nome" => $piatto,
				"quantita" => $_POST[$piatto],
				"prezzo" => $row['prezzo']
			];
			setcookie('ORDINEcookie', json_encode($ORDINE), time() + 3600, '/');
			echo "<script>console.log(' $_POST[$piatto] => $piatto ')</script>";

			$countPiatti++;
		}
	}

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

			//redirect('../index.php');
			break;
	}

	$conn->close();
} else {
	echo '<h1>Something is rotten in <s>the state of denmark</s> my webapp</h1>';
}

?>
<!-- <a style="display: block;" href="menu">indietro</a> -->