<?php ob_start(); ?>
    <main>
        <div class="single-post">
            <h2>
            
                <?= htmlspecialchars($post->getTitle()) ?>
            </h2>
            <h3>
                Publié : <?= htmlspecialchars($post->getCreationDate());?>
            </h3>
            <p>
                <?=$post->getContent()?>
            </p>
        </div>
        <div class="comments-container">
            <h2>Commentaires</h2>
            <form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" id="comment-form" method="post">
                <div>
                    <label for="author">Auteur</label><br/>
                    <input type="text" id="author" class="form-input" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br/>
                    <textarea name="comment" id="comment" class="form-input"></textarea><br/><br/>
                </div>
                <div>
                    <input type="submit" class="newbutton" id="submit-comment" value="Laisser commentaire"/>
                </div>
            </form>
           
           <?php
            foreach ($comments as $comment)
            //create variable for flagged comments 
            {
                
            ?>
            <div class="comment" id="comments">
                <h4><?= htmlspecialchars($comment->getAuthor())?> </h4>
                <div>
                    <a href="index.php?action=flagComment&postId=<?=$post->getId()?>&commentId=<?=$comment->getId()?>" title="Signaler ce commentaire">
                        <i class="far fa-flag <?php if($comment->getFlagged() === '1') {
                    echo'comment-reported';
                } else {
                    echo 'comment-flag';
                }
                ?>"></i>
                    </a>
                </div>
                <p><?= nl2br(htmlspecialchars($comment->getComment())) ?> </p>
                    
            </div>
        <?php
        }
        ?>
        </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>