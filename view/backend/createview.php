<?php ob_start(); ?>
   
   <script>
   tinymce.init({
      selector: 'textarea#default'
   });
   </script>

   <h1>Ecrire article</h1>
   <form action="index.php?action=newArticle" method="post">
      <input type="text" name="title" id="title" />
      <label for="title">Titre</label>
      <textarea id="post" name="post">test</textarea>

      <input type="submit" />
   </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>