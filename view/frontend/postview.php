<?php ob_start(); ?>
    <main>
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
                <?=$post['content'];?>
            </p>
        </div>
        <div class="comments-container">
            <h2>Commentaires</h2>
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br/>
                    <input type="text" id="author" class="form-input" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br/>
                    <textarea name="comment" id="comment" class="form-input"></textarea><br/><br/>
                </div>
                <div>
                    <input type="submit" class="button" />
                </div>
            </form>
           
           <?php
            while ($comment = $comments->fetch())
            //create variable for flagged comments 
            {
                
            ?>
            <div class="comment" id="comments">
                <h4><?= htmlspecialchars($comment['author'])?> </h4>
                <div>
                    <a href="index.php?action=flagComment&postId=<?=$post['id']?>&commentId=<?=$comment['id']?>" title="Signaler ce commentaire">
                        <i class="far fa-flag <?php if($comment['flagged'] === '1') {
                    echo'comment-reported';
                } else {
                    echo 'comment-flag';
                }
                ?>"></i>
                    </a>
                </div>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> </p>
                    
            </div>
        <?php
        }
        ?>
        </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>