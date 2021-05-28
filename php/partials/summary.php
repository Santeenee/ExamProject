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
        <li><a href="summaryOrder.php">Summary</a></li>
      </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
      <span></span>
    </label>
  </header>

  <main>
    <div class="card">

      <?php
      if (isset($ORDINE)) {
        echo '<h1>Riepilogo ordine</h1>';
        for ($i = 0; $i < sizeof($ORDINE); $i++) {
          foreach ($ORDINE[$i] as $key => $value) {
            if ($key == 'prezzo') {
              echo "<h4>$key -> $value</h4>";
            } else {
              echo '<span>' . $key . ' -> ' . $value . '</span><br>';
            }
          }
          echo "<br>";
          echo '<button type="button" class="betweenPages avanti al-cuoco">invia al cuoco</button>';

          //print_r($ORDINE);
        }
      } else {
        echo "<p>Niente da vedere qui...</p><br>";
        echo '<a href="../index.php" class="betweenPages torna-home al-cuoco">Ordina qualcosa!</a>';
      }

      ?>

    </div>

  </main>

  <?php include_once('partials/footer.php'); ?>

</body>

</html>