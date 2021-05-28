<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('partials/favicon.php') ?>
    <!-- ...and meta tags -->

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/navbar.css" />

    <script defer src="../app.js"></script>

    <title>Bevande</title>
</head>

<body>
    <header>
        <h1 class="logo"><a href="#">Bevande</a></h1>
        <input type="checkbox" class="nav-toggle" id="nav-toggle" />
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="bevande.php" class="current-page">Bevande</a></li>
                <li><a href="primi.php">Primi</a></li>
                <li><a href="secondi.php">Secondi</a></li>
                <li><a href="dessert.php">Dessert</a></li>
                <li>
                    <form action="formAction.php" method="post">
                        <input type="hidden" name="pagina" value="summary">
                        <button type="submit">Summary</button>
                    </form>
                </li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-label">
            <span></span>
        </label>
    </header>

    <main>
        <a href="../index.php" class="betweenPages torna-home">torna alla home</a>

        <?php

        $page = 'bevande';
        include_once('partials/menuForm.php');

        ?>

    </main>

    <?php include_once('partials/footer.php'); ?>

</body>

</html>