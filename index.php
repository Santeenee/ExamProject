<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ...and meta tags -->
    <?php include('php/partials/favicon.php') ?>

    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/navbar.css" />

    <script defer src="app.js"></script>

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


        <h2><span>Menu</span></h2>

        <div class="card">
            <a href="php/bevande.php">
                <div class="image">
                    <img src="assets/bevande.jpg">
                </div>
                <div class="containerCounter"><span>Bevande</span></div>
            </a>
        </div>

        <div class="card">
            <a href="php/primi.php">
                <div class="image">
                    <img src="assets/primi.jpg">
                </div>
                <div class="containerCounter"><span>Primi</span></div>
            </a>
        </div>

        <div class="card">
            <a href="php/secondi.php">
                <div class="image">
                    <img src="assets/secondi.jpg">
                </div>
                <div class="containerCounter"><span>Secondi</span></div>
            </a>
        </div>

        <div class="card">
            <a href="php/dessert.php">
                <div class="image">
                    <img src="assets/dessert.jpg">
                </div>
                <div class="containerCounter"><span>Dessert</span></div>
            </a>
        </div>

    </main>

    <?php include('php/partials/footer.php'); ?>

</body>

</html>