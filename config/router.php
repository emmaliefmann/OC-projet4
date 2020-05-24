<?php 

namespace EmmaLiefmann\blog\config;

class Router
{
    public function run() 
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] === 'listPosts') {
                    $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                    $posts =  $frontend-> listPosts();
                }
            
        
                elseif ($_GET['action'] === 'post') {
                    $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $post = $frontend->post($_GET['id']);
                    }
                    
                    else {
                        $posts =  $frontend-> listPosts('chapters');
                    }
                }
        
                elseif($_GET['action'] === 'chapters') {
                    $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                    $listPosts = $frontend->listPosts($_GET['action']);
                }
        
                elseif($_GET['action'] === 'addComment') {
                    $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                    if(isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        
                        else {
                            header('location: index.php?action=post&id=' . $postId .'#comments');
                        }
                    }
        
                    else {
                        $posts =  $frontend-> listPosts();
                    }
                }
        
                elseif($_GET['action'] === 'flagComment') {
                    $frontend = new \EmmaLiefmann\blog\controller\Frontend();
                    if(isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                        $frontend->flagComment($_GET['postId'], $_GET['commentId']);
                    }
                    else {
                        header('location: index.php?action=post&id=' . $postId .'#comments');
                    }
                }
        
                // -------------------- BACK OFFICE -------------------------
        
                elseif($_GET['action'] === 'login') {
                    $backend = new \EmmaLiefmann\blog\controller\Backend();
                    $backend->loginToAdmin($_POST['username'], $_POST['password']);
                }
        
        
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
                        $backend = new \EmmaLiefmann\blog\controller\Backend();
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $backend->editPost($_GET['id']);
                        }
                        else {
                            $backend->dashboard();
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
                            header('location: http://localhost/projet4/index.php?action=admin&page=moderate');
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
                            header('location: http://localhost/projet4/index.php?action=admin&page=moderate');
                        }
                    }
        
                    elseif (isset($_GET['page']) && $_GET['page'] === 'changePost') {
                        $backend = new \EmmaLiefmann\blog\controller\Backend();
                        if(isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['title']) && !empty($_POST['modifiedPost'])) {
                            $backend->modifyPost($_POST['title'], $_POST['modifiedPost'], $_GET['id']);
                            }
                            else {
                                $backend->editPost($_GET['id']);
                            }
                        }
                        else {
                            header('location: index.php?action=admin&page=dashboard');
                        }
                        
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'deletePost') {
                        if(isset($_GET['id']) && $_GET['id'] > 0) {
                            $backend = new \EmmaLiefmann\blog\controller\Backend();
                            $backend->deleteCheck();
                        }
                        else {
                            header('location: index.php?action=admin&page=dashboard');
                        }
                    }
        
                    elseif (isset($_GET['page']) && $_GET['page'] === 'deleteThisPost') {
                        if(isset($_GET['id']) && $_GET['id'] > 0) {
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
                            header('location: index.php?action=admin&page=dashboard');
                        }                  
                    }
        
                    elseif (isset($_GET['page']) && $_GET['page'] === 'newArticle') {
                        if (!empty($_POST['title']) && !empty($_POST['post'])) {
                            $backend = new \EmmaLiefmann\blog\controller\Backend();
                            $backend->addNewArticle($_POST['title'], $_POST['post']);
                        }
                        else {
                            $backend->create();
                        }
                    }
        
                    elseif (isset($_GET['page']) && $_GET['page'] === 'signout') {
                        $backend = new \EmmaLiefmann\blog\controller\Backend();
                        $backend->signoutOfAdmin();
                    }
        
                    //for 404 error 
                    else {
                        //show error page 
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
         
    }

}