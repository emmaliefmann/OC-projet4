<?php ob_start(); ?>
    <main>
    <h2>Modifier votre article</h2>
    <div>  
        <form action="index.php?action=admin&page=changePost&id=<?= $post->getId()?>" method="post" class="editor-form" id="edit-form">
            <input type="text" name="title" class="creation-title" value="<?=htmlspecialchars($post->getTitle()); ?>" />
            </h2>
            <textarea name="modifiedPost" id="post">
            <?= $post->getContent(); ?>
            </textarea>
            <div class="buttoncontainer">
                <a class="newbutton" href="index.php?action=admin&page=dashboard">Annuler</a>
                <input class="newbutton" type="submit" value="Enregistrer"/>
            </div>
            
        </form>
    </div>
    <div class="margins">
        <h2>Commentaires</h2>
        <?php 
        foreach ($comments as $comment) 
        {
        ?>
        <div class="comments dashboard-article">
            <div class="overlay"></div>
            <p class="dash-title">
                <strong><?= htmlspecialchars($comment->getAuthor())?></strong>    <?= nl2br(htmlspecialchars($comment->getComment())) ?>
            </p>
            <div class="dashboard-buttons">
                <a href="index.php?action=admin&page=deleteComment&id=<?=$comment->getId()?>" class="newbutton">supprimer</a>            </div>
            </div>
       
        <?php
        }
        ?>
    </div>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>