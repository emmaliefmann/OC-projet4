<?php ob_start(); ?>
    <main class="flexbox">
        <div class="full-container">
           
        <h2>Actions</h2>
        <div>
            <button><a href="index.php?action=create">Ecrire nouvelle article</a></button>
           <button><a href="">voir tout les commentaires</a></button> 
           <button><a href="">Voir tous les articles</a></button>
        </div>
           
        </div>
        <section class="container">
            <h2>Vos articles</h3>
            <ul>
                <?php
                while ($data = $posts->fetch())
                {
                ?>
                <div class="dashboard-article">
                    <li><?= htmlspecialchars($data['title']); ?></li>
                    <div>
                        <button><a href="index.php?action=editPost&id=<?= $data['id'] ?>">Modifier</a></button>
                        <button><a href="index.php?action=deletePost&id=<?= $data['id'] ?>">Supprimer</a></button>
                    </div>
                </div>
                <?php
                }
                ?>
            </ul>
        </section>
        <section class="container">
        <h2>Commentaires signalés <i class="far fa-flag"></i></h2>
        <ul>
            <?php
            while($comment = $comments->fetch())
            {
            ?>
            <div class="dashboard-article">
                <li>
                    <strong><?= htmlspecialchars($comment['author'])?> - </strong>
                    <?= htmlspecialchars($comment['comment'])?>
                </li>
                <div>
                    <button><a href="index.php?action=deleteComment&id=<?=$comment['id']?>">supprimer</a></button>
                    <button><a href="index.php?action=unflagComment&id=<?=$comment['id']?>">accepter</a></button>
                </div>
            </div>
            <?php
            }
            ?>
         </ul>
         
        </section>
        <button><a href="index.php?action=create">Ecrire nouvelle article</a></button>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>