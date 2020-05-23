<?php ob_start(); ?>
<div class="full-container">
    <h2>Moderer les commentaires</h2>
    <ul>
        <?php foreach ($comments as $comment)
        {
        ?>
            <h3><?=$comment->getPostId();?></h3>
            <div class="dashboard-article">
                <li>
                    <?=$comment->getComment();?>
                </li>
                <button><a href="index.php?action=admin&page=deleteComment&id=<?=$comment->getComment()?>">supprimer</a></button>
            </div>
        
        <?php
        }
        ?>
    </ul>
    </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/backend/template.php');