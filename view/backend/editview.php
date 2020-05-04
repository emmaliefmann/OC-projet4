<?php ob_start(); ?>
    <main>
    <h2>Modifier votre article</h2>
    <div class="single-post">  
        <?php
            $post = $request->fetch();
            ?>
        <form action="index.php?action=changePost&amp;id=<?= $post['id'] ?>" method="post">
            <input type="text" name="title" value="<?=htmlspecialchars($post['title']); ?>" />
            </h2>
            <textarea name="modifiedPost" id="post">
            <?= $post['content']; ?>
            </textarea>
            <input type="submit" />
        </form>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>