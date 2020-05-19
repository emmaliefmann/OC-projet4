<?php ob_start(); ?>
   
 
   <h1>Ecrire article</h1>
   <form action="index.php?action=admin&page=newArticle" method="post" class="editor-form">
      <label for="title">Titre</label>
      <input type="text" name="title" id="title" /> <br/><br/>
      
      <textarea id="post" name="post"></textarea>
   <div>
      <input class="button" type="submit" value="Enregistrer"/>
      <button><a href="index.php?action=admin&page=dashboard">Annuler</a></button>
   </div> 
   </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>