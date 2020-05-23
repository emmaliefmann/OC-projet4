<?php ob_start(); ?>
    <main class="page-container">
        <aside class="author-info">
            <img src="public/images/jean3.jpg" class="author-photo" alt="Photo de Jean" />
            <div>
                <h4>À Propos de l'auteur</h3>
                <p>Description courte de l'auteur</p>
            </div>
        </aside>
        <div class="posts-section">
        
        <div class="latest-posts">
          <?php
          //while index is less than 2
           foreach ($posts as $post)
           {
            ?>
           <div class="blog-post">
               <h3>
                   <?= htmlspecialchars($post->getTitle()); ?>
               </h3>
               <h4>Publié <em><?= htmlspecialchars($post->getCreationDate())?></em> </h4>
               <?php 
                $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                $summary = $frontend-> wordLimiter($post->getContent()); 
                
                //Just get five, then see all link for loop? ?> 
            
                <p><?= $summary;?></p>
               
               <br/>
               <a class="newbutton" href="index.php?action=post&id=<?= $post->getId() ?>">CONTINUER <i class="fas fa-long-arrow-alt-right"></i></a>
               
               
           </div>
           <?php 
           }
           ?>
           <div class="blog-post">
                <h3>Lire tous les articles</h3>
                <a class="newbutton" href="index.php?action=chapters">CHAPITRES</a></button>
               
            </div>
        </div>
    </main>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); ?>