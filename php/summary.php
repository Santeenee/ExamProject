<!-- RIEPILOGO ORDINE -->

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('partials/favicon.php'); ?>

  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/navbar.css" />

  <title>Summary</title>
</head>

<body>

  <header>
    <h1 class="logo"><a href="#">Summary</a></h1>
    <input type="checkbox" class="nav-toggle" id="nav-toggle" />
    <nav>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="bevande.php">Bevande</a></li>
        <li><a href="primi.php">Primi</a></li>
        <li><a href="secondi.php">Secondi</a></li>
        <li><a href="dessert.php">Dessert</a></li>
        <li>
          <form action="formAction.php" method="post">
            <input type="hidden" name="pagina" value="summary">
            <button class="current-page" type="submit">Summary</button>
          </form>
        </li>
      </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
      <span></span>
    </label>
  </header>

  <main>
    <div class="card summary-card">

      <?php

      //banner comment

      $temp = [];
      if (isset($_COOKIE['ORDINEcookie']) && $_COOKIE['ORDINEcookie'] != $temp) {

        echo '<h1>Riepilogo ordine</h1>';

        $data = json_decode($_COOKIE['ORDINEcookie'], true);
        //$tipoPiatto = [];
        $totCosto = 0;
        for ($i = 0; $i < sizeof($data); $i++) {
          if ($data[$i]['quantita'] > 0) {
            foreach ($data[$i] as $key => $value) {

              switch ($key) {
                case 'tipo':
                  //$tipoPiatto[] = $value;

                  if ($i == 0) {
                    echo "<h3 class=\"tipo-title\">" . ucfirst($value) . "</h3>";
                  } else if ($i != 0 && $value != $data[($i - 1)]['tipo']) {
                    echo "<h3 class=\"tipo-title\">" . ucfirst($value) . "</h3>"; //"Primi", "Secondi", ecc...
                  }
                  break;

                case 'nome':
                  echo '<span class="nome">' . preg_replace('/\_/', ' ', $value) . '</span>';
                  break;

                case 'quantita':
                  echo "<div class=\"space-between\"><span class=\"quantita\">$value</span>";
                  $quantitaPiatto = $value;
                  break;

                case 'unita':
                  if ($value != '' || $value != null) {
                    echo '<span class="unita-summary">' . $value . '</span>';
                  }
                  break;

                case 'prezzo':
                  $totCosto += $value * $quantitaPiatto;
                  echo '<span class="prezzo-summary">' . $value * $quantitaPiatto . '€</span></div>';
                  break;

                default:
                  echo '<script>alert("code has to be changed.. new key-value pair added to $ORDINE[]")</script>';
                  break;
              }
            }
          }
        }

        echo "<div class=\"space-between div-tot-costo\">
                <h3>Totale</h3>
                <h4 class=\"tot-costo\">" . $totCosto . "€</h4>
              </div>";

        echo '<button type="button" class="betweenPages avanti al-cuoco" style="margin: 0;">Ordina</button>';
      } else {
        echo "<p>non hai ancora scelto niente...</p><br>";
        echo '<a href="../index.php" class="betweenPages torna-home">Ordina qualcosa!</a>';
      }

      ?>

    </div>

  </main>

  <?php include_once('partials/footer.php'); ?>

</body>

</html>