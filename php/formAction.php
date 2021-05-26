<?php

include_once('partials/dbconnection.php');
include_once('partials/favicon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT DISTINCT nomePiatto FROM piatto ORDER BY nomePiatto DESC";

    if (!($result = $conn->query($sql))) {
        die("<script>alert('query non riuscita')</script>");
    }

    while ($row = $result->fetch_assoc()) {

        $piatto = $row['nomePiatto'];

        //CONSOLE LOGGING THE VALUES
        echo "<script>console.log('" . $piatto . " n:" . $_POST[$piatto] . "')</script>";
    }
    /*
    switch ($_POST["pagina"]) {
        case 'bevande':


            break;
        case 'primi':
            # code...
            break;
        case 'secondi':
            # code...
            break;
        case 'dessert':
            # code...
            break;

        default:
            # code...
            break;
    }*/

    $conn->close();
}

?>
<!-- <a style="display: block;" href="bevande.php">indietro</a> -->