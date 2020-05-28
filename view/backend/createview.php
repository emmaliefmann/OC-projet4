<?php ob_start(); ?>
   
 
   <h2>Ecrire article</h2>
   <form action="index.php?action=admin&page=newArticle" method="post" class="editor-form">
      <input type="text" name="title" required id="title" placeholder="Titre" class="creation-title"/> <br/><br/>
      <textarea id="post" required name="post"></textarea>
   <div class="buttoncontainer">
      <input class="newbutton" type="submit" value="Enregistrer"/>
      <a href="index.php?action=admin&page=dashboard" class="newbutton">Annuler</a>
   </div> 
   </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>