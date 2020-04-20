<?php

require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    require('postview.php');
}

else {
    echo 'Erreur : aucun billet trouvé';
}