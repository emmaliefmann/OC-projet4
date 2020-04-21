<?php ob_start(); ?>
    <main class="page-container">
        <aside class="author-info">
            <img src="public/images/jean2.jpg" class="author-photo" alt="Photo de Jean" />
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
               <a href="post.php?id=<?= $data['id'] ?>">Comments</a>
               </p>
           </div>
           <?php 
           }
           $posts->closeCursor();
           ?>
        </div>
    </main>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>