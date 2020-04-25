<?php ob_start(); ?>
    <main>
        <div class="single-post">
            <h2>
                <?= htmlspecialchars($post['title']) ?>
            </h2>
            <h3>
                Publié : <?= htmlspecialchars($post['creation_date_fr']);?>
            </h3>
            <p>
                <?=nl2br(htmlspecialchars($post['content']));?>
            </p>
        </div>
        <div class="comments-container">
            <h2>Commentaires</h2>
            <div>
                <h4>Example comment</h4>
                <p>Comment goes here but php query not working...</p>
            </div>
            <div>
                <h4>Example comment</h4>
                <p>Comment goes here but php query not working...</p>
            </div>
           
           <?php
            while ($comment = $comments->fetch())
            {
            ?>
            <div>
                <h4><?= htmlspecialchars($comment['author'])?> </h4>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> </p>
            </div>
        <?php
        }
        ?>
        </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>