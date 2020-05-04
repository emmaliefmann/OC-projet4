<?php 
require_once('controller/frontend.php');
require_once('controller/backend.php');


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

        elseif($_GET['action'] === 'flagComment') {
            if(isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                flagComment($_GET['postId'], $_GET['commentId']);
                echo 'is set';
            }
            else {
                echo 'index.php not set';
            }
        }

        // -------------------- BACK OFFICE -------------------------


        elseif($_GET['action'] === 'admin') {
            //if session active, access admin page, otherwise loginpage 
            require('view/adminview.php');
        }

        elseif($_GET['action'] === 'dashboard') {
            recentPosts();
        }

        elseif($_GET['action'] === 'edit') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editPost($_GET['id']);
            }
            else {

                throw new Exception('Aucun article trouvé.');
            }
        }

        elseif($_GET['action'] === 'create') {
            require('view/backend/createview.php');
            }

        elseif($_GET['action'] === 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id']);
            }
            else {
                //throw new Exception('Aucun article trouvé.');
                echo 'not set';
            }

        }

        elseif($_GET['action'] === 'unflagComment') {
            
        }
        
        elseif($_GET['action'] === 'changePost') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['modifiedPost'])) {
                    modifyPost($_POST['title'], $_POST['modifiedPost'], $_GET['id']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            }
            else {
                throw new Exception('Article pas trouvé');
            }
        }
        elseif($_GET['action'] === 'deletePost') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                require('view/backend/deleteview.php');
            }
            else {
                throw new Exception ('page non trouvé');
            }
        }
       
        elseif($_GET['action'] === 'delete') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                //Should this if/else be within the function 
                if($_POST['delete'] === 'true') {
                    deletePost($_GET['id']);
                }
                else {
                    header('location: index.php?action=dashboard');
                }
            }
            else {
                echo 'post not found';
            }                
            
        }
    
    
        elseif($_GET['action'] === 'newArticle') {
            //get $title and content
            if (!empty($_POST['title']) && !empty($_POST['post'])) {
                addNewArticle($_POST['title'], $_POST['post']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }
        }
    }
    else {
        listPosts();
    }
    
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorview.php');
}

//elseif($_GET['action'] === 'login') {
            //if (isset($_POST['username']) {
                //run function to query database using username as parameter 
                //get password as well? To compare 
                //in controller/backend.php, but connection in adminmanager
                //loginToAdmin($_POST['username']);
            //}