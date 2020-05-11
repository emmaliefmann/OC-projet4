<?php 
    $title = 'Supprimer ce commentaire'; 
    $question = 'Supprimer <strong>definativement</strong> ce commentaire ?';
    $id = $_GET['id'];
    $formAction = 'index.php?action=deleteThisComment&id=';

?>


<?php require('view/backend/checktemplate.php'); ?>