<?php ob_start(); ?>
    <main>
        <h3>Vos articles</h3>
        <ul>
            <?php
            while ($data = $posts->fetch())
            {
            ?>
            <li>
            <?= htmlspecialchars($data['title']); ?>
            <button><a href="index.php?action=edit&id=<?= $data['id'] ?>">Edit</a></button>
            <button><a href="index.php?action=deletePost&id=<?= $data['id'] ?>">Suprimmer</a></button>
            </li>
            <?php
            }
            ?>
        </ul>
        <h3>Commentaires signalés</h3>
        <ul>
        <?php
        while($comment = $comments->fetch())
        {
        ?>
        <li>
        <strong><?= htmlspecialchars($comment['author'])?> - </strong>
        <?= htmlspecialchars($comment['comment'])?>
        <button><a href="index.php?action=deleteComment&id=<?=$comment['id']?>">delete</a></button>
        <button><a href="index.php?action=unflagComment&id=<?=$comment['id']?>">accept</a></button>
        </li>
        <?php
        }
        ?>
        </ul>
        <button><a href="index.php?action=create">Ecrire nouvelle article</a></button>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>