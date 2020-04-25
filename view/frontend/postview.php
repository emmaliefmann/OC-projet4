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
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br/>
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br/>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
           
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