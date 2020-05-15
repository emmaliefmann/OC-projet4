<?php 
    $title = 'Supprimer votre article'; 
    $question = 'Supprimer <strong>definativement</strong> votre article ?';
    $id = $_GET['id'];
    $formAction = 'index.php?action=admin&page=deleteThisPost&id=';

?>


<?php require('view/backend/checktemplate.php'); ?>