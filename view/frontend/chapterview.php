<?php ob_start(); ?>
<h2>All articles</h2>
<?php
    foreach ($postObjects as $post) {
        ?>
        <div class="single-post">
        <h3>
            <?= htmlspecialchars($post->getTitle()); ?>
        </h3>
        <h4>Publié <em><?= htmlspecialchars($post->getCreationDate())?></em> </h4>
        <p><?= $post->getContent(); ?> </p>
        
        <br/>
        <a class="newbutton" href="index.php?action=post&id=<?= $post->getId(); ?>">Voir Commentaires</a>
        
    </div>
    <?php
    }
   ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>