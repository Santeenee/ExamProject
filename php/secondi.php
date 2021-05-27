<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('partials/favicon.php') ?>
    <!-- ...and meta tags -->

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/navbar.css" />

    <script defer src="../app.js"></script>

    <title>Secondi</title>
</head>

<body>
    <header>
        <h1 class="logo"><a href="#">Secondi</a></h1>
        <input type="checkbox" class="nav-toggle" id="nav-toggle" />
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="bevande.php">Bevande</a></li>
                <li><a href="primi.php">Primi</a></li>
                <li><a href="secondi.php">Secondi</a></li>
                <li><a href="dessert.php">Dessert</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-label">
            <span></span>
        </label>
    </header>

    <main>
        <a href="primi.php" class="betweenPages torna-home">torna ai primi</a>

        <form action="formAction.php" method="post">
            <input type="hidden" name="pagina" value="secondi">

            <?php
            include_once('partials/dbconnection.php');

            $sql = "SELECT DISTINCT replace(nomePiatto,' ', '_') as piatto, tipo, prezzo 
            FROM piatto 
            WHERE tipo = 'secondi'";

            if (!($result = $conn->query($sql))) {
                die("<script>alert('query non riuscita')</script>");
            }

            while ($row = $result->fetch_assoc()) {
                $piatto = $row['piatto'];
                $prezzo = $row['prezzo'];

                //*CARDS
                echo "<!-- " . strtoupper($piatto) . " -->";
                echo '<div class="card secondi">';
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

            </div>

            <div class="flexJustifyCenter">
                <button type="submit" class="betweenPages avanti">avanti</button>
            </div>
        </form>

    </main>

    <?php include_once('partials/footer.php'); ?>

</body>

</html>