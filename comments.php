<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" value="Emma Liefmann" >
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
        $post = $db->prepare('SELECT id, title, content, creation_date FROM posts WHERE id = ?');
        //$_GET['post] comes from URL on index page 
        $post->execute(array($_GET['post']));
        $data = $post->fetch();
        ?>
        <div class="single-post">
            <h2>
                <?php echo htmlspecialchars($data['title']) ?>
            </h2>
            <p>
                <?php echo nl2br(htmlspecialchars($data['content']));?>
            </p>
        </div>
    </main>
    <footer>
        <p>Mentions Legales</p>

    </footer>
    <script src="app.js"></script>
</body>
</html>