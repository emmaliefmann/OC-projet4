<?php 
    $title = 'Supprimer votre article'; 
    $question = 'Supprimer <strong>definativement</strong> votre article ?';
    $id = $_GET['id'];
    $formAction = 'index.php?action=deleteThisPost&id=';

?>


<?php require('view/backend/checktemplate.php'); ?>