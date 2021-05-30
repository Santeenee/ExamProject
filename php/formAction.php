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
	//setting initial values
	$ORDINE = [];
	$countPiatti = 0;

	while ($row = $result->fetch_assoc()) {

		$piatto = $row['piatto'];

		if ($row['disponibilita'] > 0 && $_POST[$piatto] > 0) {

			echo '<script>console.log("' . $countPiatti . '")</script>';

			//* GET DISHES FROM LAST PAGE
			$ORDINE[$countPiatti] = [
				"tipo" => $_POST['pagina'],
				"quantita" => $_POST[$piatto],
				"nome" => $piatto,
				"unita" => $row['unita'],
				"prezzo" => $row['prezzo']
			];

			echo "<script>console.log(' $_POST[$piatto] => $piatto ')</script>";
			$countPiatti++;
		}/* else {
			echo "<script>console.log('" . ucfirst(preg_replace('/\_/', ' ', $piatto)) . " non è disponibile o non è stato scelto.')</script>";
		}*/
	}

	if (isset($_COOKIE['ORDINEcookie'])) {

		$data = array_merge(json_decode($_COOKIE['ORDINEcookie'], true), $ORDINE);
	} else {
		$data = $ORDINE;
	}

	echo "<br>cookie:<br>";
	//pretty print array $data
	echo "<pre>" . print_r($data, true) . "</pre>";

	setcookie('ORDINEcookie', json_encode($data), time() + 3600, '/');

	switch ($pagina) {
		case 'bevande':

			redirect('primi.php');
			break;

		case 'primi':

			redirect('secondi.php');
			break;

		case 'secondi':

			redirect('dessert.php');
			break;

		case 'dessert' || 'summary':

			redirect('summary.php');
			break;

		default:

			redirect('../index.php');
			break;
	}

	$conn->close();
} else {
	echo '<h1>Something is rotten in <s>the state of denmark</s> my webapp<br><br>There\'s no POST request...</h1>';
}

?>
<!-- <a style="display: block;" href="menu">indietro</a> -->