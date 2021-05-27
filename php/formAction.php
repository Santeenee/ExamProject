<?php

function redirect($url)
{
    echo '<script>window.location.replace("' . $url . '");</script>';
}

include_once('partials/dbconnection.php');
include_once('partials/favicon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pagina = $_POST['pagina'];

    $sql = "SELECT DISTINCT replace(nomePiatto,' ', '_') as piatto, tipo, prezzo 
            FROM piatto
            WHERE tipo = '$pagina'";

    if (!($result = $conn->query($sql))) {
        die("<script>alert('query non riuscita')</script>");
    }

    //* data schema
    /*
    $ORDINE = [
        ["tipo" => "bevande", "nome"=>"acqua",     "qta"=>"5", "prezzo"=>"2"],
        ["tipo" => "bevande", "nome"=>"vino",      "qta"=>"3", "prezzo"=>"5"],
        ["tipo" => "primi",   "nome"=>"carbonara", "qta"=>"1", "prezzo"=>"7"]
    ];
    
    */

    //* COLLECTING DATA...
    if (!isset($ORDINE)) {
        $ORDINE = [];
    }

    $i = 0;
    while ($row = $result->fetch_assoc()) {

        $piatto = $row['piatto'];

        $ORDINE[$i] =  [
            "tipo" => $_POST['pagina'],
            "nome" => $piatto,
            "quantita" => $_POST[$piatto],
            "prezzo" => $row['prezzo']
        ];

        echo "<script>console.log('" . $_POST[$piatto] . " => " . $piatto . "')</script>";
        $i++;
    }
    $i = 0;

    //print_r($ORDINE);

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

        case 'dessert':


            //* la pagina order.php poi si occupa di mostrare il summary di cosa si ha scelto (ed eventualmente modificarlo???)
            //* premuto un button si invia l'order al database nella tabella ordine
            //* il cuoco, tramite ajax *ಠ_ಠ* si vede aggiornare la lista degli ordini in real-time 

            //* scorro l'array ORDINE e rimetto gli spazi dove ci sono gli underscore
            for ($i = 0; $i < sizeof($ORDINE); $i++) {
                foreach ($ORDINE[$i] as $key => $value) {
                    if ($key == 'nome') {
                        $value = preg_replace('/\_/', ' ', $value);
                    }
                }
            }

            //*replace underscores with whitespaces
            $piatto = preg_replace('/\_+/', ' ', $piatto);
            echo "<p>senza underscore: $piatto </p>";

            //redirect('summary.php');
            break;

        default:

            redirect('../index.php');
            break;
    }

    $conn->close();
} else {
    echo "<br>Something is rotten in <s>in the state of denmark</s> my webapp<br>";
}

?>
<!-- <a style="display: block;" href="menu">indietro</a> -->