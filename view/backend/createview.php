<?php ob_start(); ?>
   
 
   <h1>Ecrire article</h1>
   <form action="index.php?action=newArticle" method="post" class="editor-form">
      <label for="title">Titre</label>
      <input type="text" name="title" id="title" /> <br/><br/>
      
      <textarea id="post" name="post">test</textarea>

      <input class="button" type="submit" value="Enregistrer"/>
   </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>