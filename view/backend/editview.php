<?php ob_start(); ?>
    <main>
    <h2>Modifier votre article</h2>
    <div class="single-post">
            <h2>
            <?php
                $post = $request->fetch();
                ?>
                <?= htmlspecialchars($post['title']) ?>
            </h2>
            <h3>
                Publié : <?= htmlspecialchars($post['creation_date_fr']);?>
            </h3>
            <p>
                <?=nl2br(htmlspecialchars($post['content']));?>
            </p>
        </div>
        <button>MODIFIER</button>
        <button> <a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>"></a> SUPPRIMER</button>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>