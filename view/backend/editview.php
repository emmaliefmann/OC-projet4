<?php ob_start(); ?>
    <main>
    <h2>Modifier votre article</h2>
    <div class="single-post">  
        <?php
            $post = $request->fetch();
            ?>
        <form action="index.php?action=admin&page=changePost&amp;id=<?= $post['id'] ?>" method="post" class="editor-form">
            <input type="text" name="title" value="<?=htmlspecialchars($post['title']); ?>" />
            </h2>
            <textarea name="modifiedPost" id="post">
            <?= $post['content']; ?>
            </textarea>
            <input class="button" type="submit" value="Enregistrer"/>
        </form>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>