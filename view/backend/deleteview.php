<?php ob_start(); ?>
    <main>
    <h2>Supprimer votre article</h2>
   
    <form action="index.php?action=delete&id=<?=$_GET['id']?>" method="post">
        <p>Supprimer <strong>definativement</strong> votre article ?</p>
        <input type="radio" name="delete" value="true" id="oui" />
        <label for="oui">Oui</label>
        <input type="radio" name="delete" value="false" id="non" checked="checked" />
        <label for="non">Non</label><br/><br/>
        <input type="submit" value="supprimer">
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>