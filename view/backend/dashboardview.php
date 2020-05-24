<?php ob_start(); ?>
    <main class="flexbox">
        <div class="full-container">
            <h2>Actions</h2>
            <div>
                <a class="newbutton" href="index.php?action=admin&page=create">Ecrire nouvelle article</a>
                <a class="newbutton" href="Voir tout commentaires">voir tout les commentaires</a>
            </div>
        </div>
        <section class="container">
            <h2>Vos articles</h3>
            
                <?php
                foreach ($posts as $post)
                {
                ?>
                <div class="dashboard-article">
                    <p class="dash-title" ><?= htmlspecialchars($post->getTitle()); ?></p>
                    <div class="overlay"></div>
                    <div class="dashboard-buttons">
                        <a class="newbutton" href="index.php?action=admin&page=editPost&id=<?= $post->getId() ?>">Modifier</a></button>
                        <a class="newbutton" href="index.php?action=admin&page=deletePost&id=<?= $post->getId() ?>">Supprimer</a></button>
                    </div>
                </div>
                <?php
                }
                ?>
            
        </section>
        <section class="container">
        <h2>Commentaires signalés</i></h2>
        <ul>
            <?php
            foreach ($comments as $comment)
            {
            ?>
            <div class="dashboard-article">
                <li>
                    <strong><?= htmlspecialchars($comment->getAuthor())?></strong>
                    <?= htmlspecialchars($comment->getComment())?>
                </li>
                <div>
                    <button><a href="index.php?action=admin&page=deleteComment&id=<?=$comment->getId()?>">supprimer</a></button>
                    <button><a href="index.php?action=admin&page=unflagComment&id=<?=$comment->getId()?>">accepter</a></button>
                </div>
            </div>
            <?php
            }
            ?>
         
        </section>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>