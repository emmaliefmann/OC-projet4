<?php 

//namespace here

require_once('model/dashboardmanager.php');
require_once('model/adminmanager.php');
function checkLogin($function) 

{
    if (isset($_SESSION['active']) &&$_SESSION['active'] === 'yes') {
        $function;
    }
    else {
        header('location: index.php?action=admin');
    }
}

function loginToAdmin($username, $password)
{
    $adminManager = new \EmmaLiefmann\blog\model\AdminManager();
    $loginAttempt = $adminManager->login($username);
    $dbResult = $loginAttempt->fetch();
    if ($dbResult) {
        $userInput = $password;
        $dbPassword = $dbResult['password'];
        $check = password_verify($userInput, $dbPassword);
        if ($check) {
            $_SESSION['active'] = 'yes';
            $_SESION['name'] = $username ;
            header('location: index.php?action=dashboard');
        }
        else {
            echo password_hash('password', PASSWORD_DEFAULT);
        }
    }
    
    else {
        echo 'incorrect login';
    }
}

    function create()
    {
        require('view/backend/createview.php');
    }

    function dashboard() 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->getPosts();
        
        $comments = $dashboardManager->getFlaggedComments();
        require('view/backend/dashboardview.php');
        
    }

    //call frontend functions to avoid repitition? 
    
    function deleteComment($id) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->deleteComment($id);
        header('location: index.php?action=dashboard');
    }
    function unflagComment($id)
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->unflagComment($id);
        header('location: index.php?action=dashboard');
    }

    function editPost($id) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $request = $dashboardManager->getPost($_GET['id']);
        require('view/backend/editview.php');
    }

    function addNewArticle($newPostTitle, $newPostContent) {
       
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $affectedLines = $dashboardManager->addPost($newPostTitle, $newPostContent);
        
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le post.');
        }
        else {
            header('location: index.php?action=dashboard');
        }
    }

    function modifyPost($newTitle, $newContent, $postId) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $affectedLines = $dashboardManager->modifyPost($newTitle, $newContent, $postId);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'modifier le post.');
        }
        else {
            header('location: index.php?action=dashboard');
        }
    }

    function deleteCheck() {
        require('view/backend/deletepostview.php');
    }

    function deleteCommentCheck() {
        require('view/backend/deletecommentview.php');
    }


    function deletePost($postId) 
    {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        
        $request = $dashboardManager->deletePost($postId);
        header('location: index.php?action=dashboard');
    }
