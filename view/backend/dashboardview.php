<?php ob_start(); ?>
    <main class="flexbox">
        <!--<div class="full-container">
            <h2>Actions</h2>
            <div class="flexbox">
                <a class="newbutton" href="index.php?action=admin&page=create">Ecrire nouvelle article</a>
                <a class="newbutton" href="index.php?action=admin&page=moderate">voir tout les commentaires</a>
            </div>
        </div>-->
        <section class="container">
            <h2>Vos articles et leurs commentaires</h3>
            
                <?php
                foreach ($posts as $post)
                {
                ?>
                <div class="dashboard-article">
                    <p class="dash-title" ><?= strtoupper($post->getTitle()); ?></p>
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
        <h2>Commentaires signalés</h2>
            <?php
            foreach ($comments as $comment)
            {
                if($comment->getFlagged()==='1') {
                    ?>
                    <div class="dashboard-article">
                        <div class="overlay"></div>
                        <p class="dash-title">
                            <strong><?= htmlspecialchars($comment->getAuthor())?></strong>
                            <?= htmlspecialchars($comment->getComment())?>
                        </p>       
                        <div class="dashboard-buttons">
                            <a href="index.php?action=admin&page=deleteComment&id=<?=$comment->getId()?>" class="newbutton">supprimer</a>
                            <a href="index.php?action=admin&page=unflagComment&id=<?=$comment->getId()?>" class="newbutton">accepter</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
         
        </section>
    </main>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>