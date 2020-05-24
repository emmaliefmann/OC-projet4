<?php ob_start(); ?>
    <main>
    <h2>Modifier votre article</h2>
    <div class="single-post">  
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
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>