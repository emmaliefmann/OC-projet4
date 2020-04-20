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
        <?php

        //connect to database
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }

        catch(Exception $e)
        {
            die('Erreur :' .$e->getMessage());
        }
        //get the singular post with prepare
        $post = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
        //$_GET['post] comes from URL on index page 
        $post->execute(array($_GET['post']));
        $data = $post->fetch();
        ?>
        <div class="single-post">
            <h2>
                <?= htmlspecialchars($data['title']) ?>
            </h2>
            <h3>
                Publié : <?= htmlspecialchars($data['creation_date_fr']);?>
            </h3>
            <p>
                <?=nl2br(htmlspecialchars($data['content']));?>
            </p>
        </div>
        <div class="comments-container">
            <h2>Commentaires</h2>
            <?php
            $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
            $comments->execute(array($_GET['post']));

            while ($data = $comments->fetch())
            {
            ?>
            <div>
                <h4><?= htmlspecialchars($data['author']);?> publié : <?php echo htmlspecialchars($data['comment_date_fr']);?> </h4>
                <p><?= nl2br(htmlspecialchars($data['comment'])); ?> </p>
            </div>
        <?php
        }
        $comments->closeCursor();
        ?>
        </div>
    </main>
    <footer>
        <p>Mentions Legales</p>

    </footer>
    <script src="app.js"></script>
</body>
</html>