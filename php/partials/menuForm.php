<form action="formAction.php" method="post">
  <?php
  echo '<input type="hidden" name="pagina" value="' . $page . '">';
  ?>

  <?php
  include_once('partials/dbconnection.php');

  $sql = "SELECT DISTINCT replace(nomePiatto,' ', '_') as piatto, tipo, unita, disponibilita, prezzo 
          FROM piatto 
          WHERE tipo = '$page'";

  if (!($result = $conn->query($sql))) {
    die("<script>alert('query non riuscita')</script>");
  }

  $tempcounter = 0;
  while ($row = $result->fetch_assoc()) {

    if ($row['disponibilita']) {
      $piatto = $row['piatto'];
      $prezzo = $row['prezzo'];

      //*CARDS
      echo "<!-- " . strtoupper($piatto) . " -->";
      echo '<div class="card ' . $page . '">';

      //echo '<div class="image"><img src="../assets/' . $piatto . '.jpg"></div>';
      echo '<div class="containerCounter">
              <a class="counter" name="' . $piatto . '">0</a>';
      if (!($row['unita'] == '' || $row['unita'] == null)) {
        echo '<span class="unita">' . $row["unita"] . '</span>';
      }
      echo   '<span>' . preg_replace('/\_/', ' ', ucfirst($piatto)) . '</span>
            </div>
            <div class="flexJustifyCenter">
              <p class="prezzo">0</p>
              <span class="prezzoInit">' . $prezzo . '</span>
            </div>
            <div class="dish-group">
              <div class="sub"><span></span></div>
              <div class="add"><span></span></div>
            </div>
          </div>';
      $tempcounter++;
    }
  }
  if ($tempcounter == 0) {
    echo '<div class="card ' . $page . '">
            <p>Non ci sono piatti disponibili in questa sezione</p>
          </div>';
  }

  ?>

  <div class="flexJustifyCenter">
    <button type="submit" class="betweenPages avanti">avanti</button>
  </div>
</form>