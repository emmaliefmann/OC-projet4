<?php 

namespace EmmaLiefmann\blog\controller;


require_once('model/dashboardmanager.php');
require_once('model/commentmanager.php');
require_once('model/postmanager.php');
require_once('model/adminmanager.php');

class Backend {
    public function checkLogin()
    {
        if (is_null($_SESSION['active'])) {
            $login = false ;
        }
        else {
            $login = $_SESSION['active'];
        }
        return $login;
    }

    public function create()
    {
        require('view/backend/createview.php');
    }

    public function dashboard() 
    {
        $postManager = new \EmmaLiefmann\blog\model\PostManager();
        $posts = $postManager->getPosts();

        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $comments = $dashboardManager->getFlaggedComments();
        require('view/backend/dashboardview.php');  
    }

    public function loginToAdmin($username, $password)
    {
        $adminManager = new \EmmaLiefmann\blog\model\AdminManager();
        $loginAttempt = $adminManager->login($username);
        $dbResult = $loginAttempt->fetch();
        if ($dbResult) {
            $userInput = $password;
            $dbPassword = $dbResult['password'];
            $check = password_verify($userInput, $dbPassword);
            if ($check) {
                $_SESSION['active'] = true;
                $_SESSION['name'] = $username ;
                header('location: index.php?action=admin&page=dashboard');
            }
            else {
                require('view/backend/adminview.php');
            }
        }
        else {
            require('view/backend/adminview.php');
        }
    }
    public function editPost($id) 
    {
        $postManager = new \EmmaLiefmann\blog\model\PostManager();
        $request = $postManager->getPost($id);
        require('view/backend/editview.php');
    }
    
    public function deleteComment($id) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->deleteComment($id);
        header('location: index.php?action=admin&page=dashboard');
    }
    public function unflagComment($id)
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->unflagComment($id);
        header('location: index.php?action=admin&page=dashboard');
    }

    public function addNewArticle($newPostTitle, $newPostContent) {
       
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $affectedLines = $dashboardManager->addPost($newPostTitle, $newPostContent);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le post.');
        }
        else {
            header('location: index.php?action=admin&page=dashboard');
        }
    }

    public function modifyPost($newTitle, $newContent, $postId) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $affectedLines = $dashboardManager->modifyPost($newTitle, $newContent, $postId);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'modifier le post.');
        }
        else {
            header('location: index.php?action=admin&page=dashboard');
        }
    }

    public function deleteCheck() {
        require('view/backend/deletepostview.php');
    }

    public function deleteCommentCheck() {
        require('view/backend/deletecommentview.php');
    }


    public function deletePost($postId) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        
        $request = $dashboardManager->deletePost($postId);
        $comments = $dashboardManager->deletePostComments($postId);
        header('location: index.php?action=admin&page=dashboard');
    }

    public function deletePostComments($postId)
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $request = $dashboardManager->deletePostComments($postId);
        header('location: index.php?action=admin&page=dashboard');
    }

    public function moderateComments() 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $comments = $dashboardManager->getAllComments();
        
        require('view/backend/allcommentsview.php');
    }

    public function signoutOfAdmin() 
    {
        session_destroy();
        var_dump($_SESSION['active']);
        header('location: index.php?action=listPosts');
    }
}



