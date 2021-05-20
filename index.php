<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ...and meta tags -->
    <?php include('php/partials/favicon.php') ?>

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/navbar.css" />

    <title>Menu</title>
</head>

<body>
    <header>
        <h1 class="logo"><a href="#">BellaScaloppa</a></h1>
        <input type="checkbox" class="nav-toggle" id="nav-toggle" />
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="php/bevande.php">Bevande</a></li>
                <li><a href="php/primi.php">Primi</a></li>
                <li><a href="php/secondi.php">Secondi</a></li>
                <li><a href="php/dessert.php">Dessert</a></li>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-label">
            <span></span>
        </label>
    </header>

    <main>
        <article>

            <div class="centered">

                <h2><span>Menu</span></h2>

                <div class="container">
                    <a href="php/bevande.php">
                        <div class="image">
                            <img src="assets/bevande.jpg">
                        </div>
                        <div class="dish-group"><span>Bevande</span></div>
                    </a>
                </div>

                <div class="container">
                    <a href="php/primi.php">
                        <div class="image">
                            <img src="assets/primi.jpg">
                        </div>
                        <div class="dish-group">Primi</div>
                    </a>
                </div>

                <div class="container">
                    <a href="php/secondi.php">
                        <div class="image">
                            <img src="assets/secondi.jpg">
                        </div>
                        <div class="dish-group">Secondi</div>
                    </a>
                </div>

                <div class="container">
                    <a href="php/dessert.php">
                        <div class="image">
                            <img src="assets/dessert.jpg">
                        </div>
                        <div class="dish-group">Dessert</div>
                    </a>
                </div>
            </div>

        </article>
    </main>

    <?php include('php/partials/footer.php'); ?>

</body>

</html>