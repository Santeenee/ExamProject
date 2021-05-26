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

        //printing dish numbers
        echo "<script>console.log('" . $piatto . " n:" . $_POST[$piatto] . "')</script>";

        //*store data
        if (!isset($arrData)) {
            $arrData = [];
        }
        $arrData[] = $piatto; //push
    }




    //*redirect
    function redirect($url)
    {
        echo '<script>window.location.replace("' . $url . '");</script>';
    }

    switch ($_POST["pagina"]) {
        case 'bevande':
            redirect('primi.php');
            break;

        case 'primi':
            redirect('secondi.php');
            break;

        case 'secondi':
            redirect('dessert.php');
            break;

        case 'dessert':
            redirect('order.php');
            break;

        default:

            redirect('../index.php');
            break;
    }

    $conn->close();
}

?>
<!-- <a style="display: block;" href="bevande.php">indietro</a> -->