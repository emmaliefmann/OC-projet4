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
           while ($data = $posts->fetch())
           {
            ?>
           <div class="blog-post">
               <h3>
                   <?= htmlspecialchars($data['title']); ?>
               </h3>
               <h4>Publié <em><?= htmlspecialchars($data['creation_date_fr'])?></em> </h4>
               <?php 
                $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                $summary = $frontend-> wordLimiter($data['content']); 
                
                //Just get five, then see all link for loop? ?> 
            
                <p><?= $summary;?></p>
               
               <br/>
               <a href="index.php?action=post&id=<?= $data['id'] ?>">Lire ce chapitre</a>
               
           </div>
           <?php 
           }
           $posts->closeCursor();
           ?>
        </div>
    </main>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); ?>