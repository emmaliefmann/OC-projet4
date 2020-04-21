<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" value="Emma Liefmann" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet"> 
    <title>Billet Simple pour l'Alaska</title>
</head>
<body>
    <header> 
        <nav>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="nav-links">
                <li><a href="#">A propos</a></li>
                <li><a href="#">Chapitres</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>  
		</nav>
    </header>
    <section class="title">
        <h1>Billet Simple pour l'Alaska</h1>
    </section>
        <?= $content ?>
    <footer>
        <p>Mentions Legales</p>

    </footer>
    <script src="public/app.js"></script>
</body>
</html>