<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" value="Emma Liefmann" >
    <script src="https://cdn.tiny.cloud/1/mbjc1sklutn7ismdr9tn1qri2o08nqwlqb0jb80o3yrados5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    
    <link href="public/css/backendstyle.css" rel="stylesheet"> 
    <title>Billet Simple pour l'Alaska</title>
    <script src="https://cdn.tiny.cloud/1/mbjc1sklutn7ismdr9tn1qri2o08nqwlqb0jb80o3yrados5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
   tinymce.init({
      selector: 'textarea#post',
      content_css : '/public/css/style.css'
   });
   </script>
</head>
<body>
    <header>
        <a href="index.php" class="logo"><i class="fas fa-home x2"></i></a> 
        <nav>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="nav-links">
                <li><a href="index.php?action=admin&page=create">Creer post</a></li>
                <li><a href="index.php?action=admin&page=dashboard">Dashboard</a></li>
            </ul>  
		</nav>
    </header>
    <section class="title">
        <h1>Bienvenu Jean !</h1>
    </section>
    <h2><?= $title ?></h2>
    <div class="centered-div">
        <form action="<?= $formAction . $id ?>" method="post">
            <p><?= $question ?></p><br/><br/>
            <input type="radio" name="delete" value="true" id="oui" />
            <label for="oui">Oui</label>
            <input type="radio" name="delete" value="false" id="non" checked="checked" />
            <label for="non">Non</label><br/><br/>
            <input type="submit" class="newbutton" value="Supprimer">
            <a href="index.php?action=admin&page=dashboard" class="newbutton">Annuler</a>
        </form>
    </div> 
    <footer>
        <p>Mentions Legales</p>

    </footer>
    <script src="public/app.js"></script>
</body>
</html>