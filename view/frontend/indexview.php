<?php ob_start(); 
?>
    <main class="page-container">
        <aside class="author-info">
            <img src="public/images/jean3.jpg" class="author-photo" alt="Photo de Jean" />
            <div>
                <h4>À Propos de l'auteur</h3>
                <p class="justify">Jean Forteroche a écrit des livres et des poèmes toute sa vie. Sa visite récente à l'Alaska lui a inspiré à écrire ce livre où il va publier une chapitre par semaine dans son site web.</p>
            </div>
        </aside>
        <div class="latest-posts">
          <?php
    
           for ($i =0; $i < 5; $i++)
           {
            ?>
           <div class="blog-post">
               <h3>
                   <?= htmlspecialchars($posts[$i]->getTitle()); ?>
               </h3>
               <h4>Publié <em><?= htmlspecialchars($posts[$i]->getCreationDate())?></em> </h4>
               <?php 
                $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                $summary = $frontend-> wordLimiter($posts[$i]->getContent()); 
                ?> 
                <p><?= $summary;?></p>
                <a class="newbutton" href="index.php?action=post&id=<?= $posts[$i]->getId() ?>">CONTINUER <i class="fas fa-long-arrow-alt-right"></i></a>
           </div>
           <?php 
           }
           ?>
           <div class="blog-post">
                <h3>Lire tous les articles</h3>
                <p>Vous pouvez lire tous les chapitres de "Billet simple pour l'Alaska ici.</p><br/>
                <a class="newbutton" href="index.php?action=chapters">CHAPITRES</a></button>
               
            </div>
        </div>
    </main>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); ?>