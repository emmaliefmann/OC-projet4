<?php ob_start(); ?>
<div class="full-container">
    <h2>Moderer les commentaires</h2>
    <ul>
        <?php while ($comment = $comments->fetch())
        {
        ?>
            <h3><?=$comment['post_id'];?></h3>
            <div class="dashboard-article">
                <li>
                    <?=$comment['comment'];?>
                </li>
                <button><a href="index.php?action=admin&page=deleteComment&id=<?=$comment['id']?>">supprimer</a></button>
            </div>
        
        <?php
        }
        ?>
    </ul>
    </div>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/backend/template.php');