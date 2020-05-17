<?php ob_start(); ?>
<div class="full-container">
    <h2>Moderer les commentaires</h2>
    <ul>
        <?php while ($data = $comments->fetch())
        //comment, author, date, and 
        //create variables for groups of comments using post id 
        {
        ?>
        <li>
        <?=$data['comment'];?>
        </li>
        <?php
        }
        ?>
    </ul>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/backend/template.php');