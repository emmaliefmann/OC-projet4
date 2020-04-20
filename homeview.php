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
    <main class="page-container">
        <aside class="author-info">
            <img src="images/jean2.jpg" class="author-photo" alt="Photo de Jean" />
            <div>
                <h3>À Propos de l'auteur</h3>
                <p>Description courte de l'auteur</p>
            </div>
        </aside>
        <div class="posts-section">
        <h2>Les derniers chapitres</h2>
        <div class="latest-posts">
          <?php
           //as long as there is data, keep fetching it
           while ($data = $posts->fetch())
           {
            ?>
           <div class="blog-post">
               <h3>
                   <?= htmlspecialchars($data['title']); ?>
               </h3>
               <h4>Publié <?= htmlspecialchars($data['creation_date_fr'])?> </h4>
               <p>
                   <?= nl2br(htmlspecialchars($data['content']));?>
               
               <br/>
               <a href="comments.php?post=<?php echo $data['id']; ?>">Comments</a>
               </p>
           </div>
           <?php 
           }
           $posts->closeCursor();
           ?>
        </div>
    </main>
    <footer>
        <p>Mentions Legales</p>

    </footer>
    <script src="app.js"></script>
</body>
</html>