<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" value="Emma Liefmann" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="public/css/backendstyle.css" rel="stylesheet"> 
    
    <title>Billet Simple pour l'Alaska</title>
</head>
<body>
    <div class="backhome">
        <a href="index.php?action=listPosts"><i class="fas fa-home"></i> Revenir à la page d'acceuil</a>
    </div>
    <div class="admin-form">
        <img src="public/images/jean2.jpg" class="author-photo" alt="Photo de Jean" />
        <form action="index.php?action=login" method="post" class="login">
            <p>
                <div class="relative">
                    <label for="username"><i class="fas fa-user"></i></label>
                    <input type="text" name="username" class="form-input"/><br/>
                </div>
                <div class="relative">
                    <label for="password"><i class="fas fa-key"></i></label>
                    <input type="password" name="password" class="form-input"/><br/><br/>
                </div>
                <div class="buttoncontainer">
                    <input type="submit" value="VALIDER" class="newbutton"/>
                    <a href="index.php?action=listPosts" class="newbutton">ANNULER</a>
                </div>
                
            </p>
        </form>
    </div>