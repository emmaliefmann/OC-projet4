<?php 


require_once('controller/frontend.php');
require_once('controller/backend.php');
session_start();


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'listPosts') {
            $frontend = new \EmmaLiefmann\blog\controller\Frontend();
            $posts =  $frontend-> listPosts();
        }

        elseif ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                $post = $frontend->post($_GET['id']);
            }
            
            else {
                throw new Exception('Aucun article trouvé.'); 
            }
        }

        elseif($_GET['action'] === 'chapters') {
            $frontend = new \EmmaLiefmann\blog\controller\Frontend();
            $listPosts = $frontend->listPosts($_GET['action']);
        }

        elseif($_GET['action'] === 'addComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                    $frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
                $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                $frontend->flagComment($_GET['postId'], $_GET['commentId']);
            }
            else {
                echo 'index.php not set';
            }
        }

        // -------------------- BACK OFFICE -------------------------

        elseif($_GET['action'] === 'admin') {
            if (isset($_SESSION['active']) && $_SESSION['active'] === 'yes') {
                header('location: index.php?action=dashboard');
            } 
            require('view/backend/adminview.php');
        }

        elseif($_GET['action'] === 'login') {
            loginToAdmin($_POST['username'], $_POST['password']);
        } 

        elseif($_GET['action'] === 'dashboard') {
           checkLogin($_GET['action']());
        }

        elseif($_GET['action'] === 'editPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                checkLogin($_GET['action']($_GET['id']));
            }
            else {
                throw new Exception('Aucun article trouvé.');
            }
        }

        elseif($_GET['action'] === 'create') {
            checkLogin($_GET['action']());
            }

        elseif($_GET['action'] === 'deleteComment') {
            checkLogin(deleteCommentCheck());
        }

        elseif($_GET['action'] === 'deleteThisComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if($_POST['delete'] === 'true') {
                    checkLogin( deleteComment($_GET['id']));
                }
                else {
                    header('location: index.php?action=dashboard');
                }
            }
            else {
                //throw new Exception('Aucun article trouvé.');
                echo 'not set';
            }

        }

        elseif($_GET['action'] === 'unflagComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                checkLogin($_GET['action']($_GET['id']));
            }
            else {
                throw new Exception ('Commentaire non trouvé.');
            }
        }
        
        elseif($_GET['action'] === 'changePost') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['modifiedPost'])) {
                    checkLogin(modifyPost($_POST['title'], $_POST['modifiedPost'], $_GET['id']));
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
                checkLogin(deleteCheck());
            }
            
            else {
                throw new Exception ('page non trouvé');
            }
        }
       
        elseif($_GET['action'] === 'deleteThisPost') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                //Should this if/else be within the function 
                if($_POST['delete'] === 'true') {
                    checkLogin( deletePost($_GET['id']));
                    checkLogin(deletePostComments($_GET['id']));
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
                checkLogin(addNewArticle($_POST['title'], $_POST['post']));
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis.');
            }
        }
    }
    else {
        $frontend = new \EmmaLiefmann\blog\controller\Frontend();
        $posts =  $frontend-> listPosts();
    }
    
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorview.php');
}
