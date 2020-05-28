<?php ob_start(); ?>
    <main>
        <div class="single-post">
            <h2><?= htmlspecialchars($post->getTitle()) ?></h2>
            <h4>Publié : <?= htmlspecialchars($post->getCreationDate());?></h4>
            <?=$post->getContent()?>
        </div>
        <div class="single-post">
            <h2>Commentaires</h2>
            <form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" id="comment-form" method="post">
                <div class="relative">
                    <label for="author"><i class="far fa-user"></i></label><br/>
                    <input type="text" required id="author" class="form-input" name="author" placeholder="Votre nom"/>
                </div>
                <div class="relative">
                    <label for="comment"><i class="far fa-comment"></i></label><br/>
                    <textarea required name="comment" id="comment" class="form-input" placeholder="Votre Commentaire"></textarea><br/><br/>
                </div>
                <div>
                    <input type="submit" class="newbutton" id="submit-comment" value="COMMENTER"/>
                </div>
            </form>
           
           <?php
           
            foreach ($comments as $comment)
            {
                $flagged = $comment->getFlagged()=== '1';
                $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                $flagColor = $frontend->flagColor($flagged); 
            ?>
            <div class="relative">
                <h4><?= htmlspecialchars($comment->getAuthor())?> </h4>
                <div class="flagdiv">
                    <a href="index.php?action=flagComment&postId=<?=$post->getId()?>&commentId=<?=$comment->getId()?>" title="Signaler ce commentaire">
                        <i class="far fa-flag <?=$flagColor?>"></i>
                    </a>
                </div>
                <p class="comment-text"><?= nl2br(htmlspecialchars($comment->getComment())) ?> </p> 
            </div>
        <?php
        }
        ?>
        </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>