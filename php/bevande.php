<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ...and meta tags -->
    <?php include('partials/favicon.php') ?>

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/navbar.css" />

    <title>Bevande</title>
</head>

<body>
    <header>
        <h1 class="logo"><a href="#">Menu</a></h1>
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
        <article>
            <div class="centered">
                <a href="../index.php" class="torna-home"><span></span>torna alla home</a>

                <div class="container">
                    <a href="#">
                        <div class="image">
                            <img src="../assets/vino.jpg">
                        </div>
                        <div class="dish-group"><span>Vino</span>
                            <div>
                                <button id="add"></button>
                                <button id="sub"></button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="container">
                    <a href="">
                        <div class="image">
                            <img src="../assets/acqua.jpg">
                        </div>
                        <div class="dish-group"><span>Acqua</span></div>
                    </a>
                </div>

                <div class="container">
                    <a href="">
                        <div class="image">
                            <img src="../assets/birra.jpg">
                        </div>
                        <div class="dish-group"><span>Birra</span></div>
                    </a>
                </div>

                <div class="container">
                    <a href="">
                        <div class="image">
                            <img src="../assets/limoncello.jpg">
                        </div>
                        <div class="dish-group"><span>Limoncello</span></div>
                    </a>
                </div>
            </div>
        </article>
    </main>

    <?php include('partials/footer.php'); ?>

</body>

</html>