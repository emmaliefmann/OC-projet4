<?php ob_start(); ?>
<h2>All articles</h2>
<?php
    while ($data = $posts->fetch())
    {
    ?>
    <div class="single-post">
        <h3>
            <?= htmlspecialchars($data['title']); ?>
        </h3>
        <h4>Publié <em><?= htmlspecialchars($data['creation_date_fr'])?></em> </h4>
        <p><?= $data['content']; ?> </p>
        
        <br/>
        <a href="index.php?action=post&id=<?= $data['id'] ?>">Voir Commentaires</a>
        
    </div>
    <?php 
    }
    $posts->closeCursor();
    ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>