<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" value="Emma Liefmann" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
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
                <li><a href="#">Contact</a></li>
            </ul>  
		</nav>
    </header>
    <section class="title">
        <h1>Billet Simple pour l'Alaska</h1>
    </section>
    <main>
        <div class="single-post">
            <h2>
                <?= htmlspecialchars($post['title']) ?>
            </h2>
            <h3>
                Publié : <?= htmlspecialchars($post['creation_date_fr']);?>
            </h3>
            <p>
                <?=nl2br(htmlspecialchars($post['content']));?>
            </p>
        </div>
        <div class="comments-container">
            <h2>Commentaires</h2>
           <?php
            while ($comment = $comments->fetch())
            {
            ?>
            <div>
                <h4><?= htmlspecialchars($comment['author'])?> </h4>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> </p>
            </div>
        <?php
        }
        ?>
        </div>
    </main>
    <footer>
        <p>Mentions Legales</p>

    </footer>
    <script src="app.js"></script>
</body>
</html>