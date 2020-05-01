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

            </li>
            <?php
            }
            ?>
        </ul>
        <button><a href="index.php?action=create">Ecrire nouvelle article</a></button>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>