<?php 
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            
            else {
                throw new Exception('Aucun article trouvé.');
                
            }
        }
        elseif($_GET['action'] === 'addComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                //If neither field is empty, execute function in controller
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                //if one is empty, tell user to fill out all areas
                else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            }

            else {
                //post ID isn't right
                throw new Exception('Aucun article trouvé.');
            }
        }

        elseif($_GET['action'] === 'admin') {
            //if session active, access admin page, otherwise loginpage 
            require('view/adminview.php');
        }

        //elseif($_GET['action'] === 'login') {
            //if (isset($_POST['username']) {
                //run function to query database using username as parameter 
                //get password as well? To compare 
                //in controller/backend.php, but connection in adminmanager
                //loginToAdmin($_POST['username']);
            //}
    }

    else {
        listPosts();
    }
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorview.php');
}