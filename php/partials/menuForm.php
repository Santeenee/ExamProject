<form action="formAction.php" method="post">
  <input type="hidden" name="pagina" value="<?php $page ?>">

  <?php
  include_once('partials/dbconnection.php');

  $sql = "SELECT DISTINCT replace(nomePiatto,' ', '_') as piatto, tipo, prezzo 
            FROM piatto 
            WHERE tipo = '$page'";

  if (!($result = $conn->query($sql))) {
    die("<script>alert('query non riuscita')</script>");
  }

  while ($row = $result->fetch_assoc()) {
    $piatto = $row['piatto'];
    $prezzo = $row['prezzo'];

    //*CARDS
    echo "<!-- " . strtoupper($piatto) . " -->";
    echo '<div class="card ' . $page . '">';
    //echo '<div class="image"><img src="../assets/' . $piatto . '.jpg"></div>';
    echo '<div class="containerCounter">
                        <a class="counter" name="' . $piatto . '">0</a>
                        <span>' . preg_replace('/\_/', ' ', ucfirst($piatto)) . '</span>
                      </div>';
    echo '<div class="flexJustifyCenter">
                        <p class="prezzo">0</p>
                        <p class="prezzoInit">' . $prezzo . '</p>
                      </div>';
    echo '<div class="dish-group">
                        <div class="sub"><span></span></div>
                        <div class="add"><span></span></div>
                      </div>';
    echo '</div>';
  }

  ?>

  <div class="flexJustifyCenter">
    <button type="submit" class="betweenPages avanti">avanti</button>
  </div>
</form>