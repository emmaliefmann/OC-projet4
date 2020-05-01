<?php ob_start(); ?>
   <?= "testing testing" ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>