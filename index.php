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

        elseif($_GET['action'] === 'login') {
            $backend = new \EmmaLiefmann\blog\controller\Backend();
            $backend->loginToAdmin($_POST['username'], $_POST['password']);
        }

        //NEW URL FORMAT: index.php?action=admin&page=dashboard

        elseif($_GET['action'] === 'admin') {
            $backend = new \EmmaLiefmann\blog\controller\Backend();
            $login =  $backend->checkLogin(); 
            if ($login === false) {
                require('view/backend/adminview.php');
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'create' ) {
                $backend = new \EmmaLiefmann\blog\controller\Backend();
                $backend->create();
            }
        
            elseif (isset($_GET['page']) && $_GET['page'] === 'dashboard' ) {
                $backend = new \EmmaLiefmann\blog\controller\Backend();
                $backend->dashboard();
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'editPost') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $backend = new \EmmaLiefmann\blog\controller\Backend();
                    $backend->editPost($_GET['id']);
                }
                else {
                    throw new Exception('Aucun article trouvé.');
                }
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'deleteComment') {
                
                $backend = new \EmmaLiefmann\blog\controller\Backend();
                $backend->deleteCommentCheck();
            }
        
            elseif (isset($_GET['page']) && $_GET['page'] === 'deleteThisComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if($_POST['delete'] === 'true') {
                        $backend = new \EmmaLiefmann\blog\controller\Backend();
                        $backend->deleteComment($_GET['id']);
                    }
                    else {
                        header('location: index.php?action=admin&page=dashboard');
                    }
                }
                else {
                    //throw new Exception('Aucun article trouvé.');
                    echo 'not set';
                }
            }
        
            elseif (isset($_GET['page']) && $_GET['page'] === 'moderate') {
                $backend = new \EmmaLiefmann\blog\controller\Backend();
                $backend->moderateComments();
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'unflagComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $backend = new \EmmaLiefmann\blog\controller\Backend();
                    $backend->unflagComment($_GET['id']);
                }
                else {
                    throw new Exception ('Commentaire non trouvé.');
                }
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'changePost') {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['title']) && !empty($_POST['modifiedPost'])) {
                        $backend = new \EmmaLiefmann\blog\controller\Backend();
                    $backend->modifyPost($_POST['title'], $_POST['modifiedPost'], $_GET['id']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis.');
                    }
                }
                else {
                    throw new Exception('Article pas trouvé');
                }
                
            }
            elseif (isset($_GET['page']) && $_GET['page'] === 'deletePost') {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $backend = new \EmmaLiefmann\blog\controller\Backend();
                    $backend->deleteCheck();
                }
                else {
                    throw new Exception ('page non trouvé');
                }
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'deleteThisPost') {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    //Should this if/else be within the function 
                    if($_POST['delete'] === 'true') {
                        $backend = new \EmmaLiefmann\blog\controller\Backend();
                        $backend->deletePost($_GET['id']);
                        $backend->deletePostComments($_GET['id']);
                    }
                    else {
                        header('location: index.php?action=admin&page=dashboard');
                    }
                }
                else {
                    echo 'post not found';
                }                  
            }

            elseif (isset($_GET['page']) && $_GET['page'] === 'newArticle') {
                if (!empty($_POST['title']) && !empty($_POST['post'])) {
                    $backend = new \EmmaLiefmann\blog\controller\Backend();
                    $backend->addNewArticle($_POST['title'], $_POST['post']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
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
