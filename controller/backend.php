<?php 

//namespace here

require_once('model/dashboardmanager.php');


    function loginToAdmin($username)
    {
        $adminManager = new \EmmaLiefmann\blog\model\AdminManager();
        //how do I get the username entered in the form here? like this via index? 
        $loginAttempt = $adminManager->login($username);

        //if no result, error => wrong login
        //if there is a result, compare the passwords 
        //if a match, open dashboard
    }
    //call frontend functions to avoid repitition? 
    function recentPosts() {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->getPosts();
        
        $comments = $dashboardManager->getFlaggedComments();
        require('view/backend/dashboardview.php');
    }

    function deleteComment($id) {
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $posts = $dashboardManager->deleteComment($id);
        header('location: index.php?action=dashboard');
    }

    function editPost($id) {
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

    function modifyPost($newTitle, $newContent, $postId) {
       
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        $affectedLines = $dashboardManager->modifyPost($newTitle, $newContent, $postId);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'modifier le post.');
        }
        else {
            header('location: index.php?action=dashboard');
        }
    }

    function deletePost($postId) {
        
        $dashboardManager = new \EmmaLiefmann\blog\model\DashboardManager();
        
        $request = $dashboardManager->deletePost($postId);
        header('location: index.php?action=dashboard');
    }

    //$adminManager = new AdminManager 
        //$
        //get user info via username, hashed password

        //compare hashed password with password in db

        //if the same, show dashboard, and $_session (look at lesson OC e.g. $_session_name = ) 
        //?? index.php start session, come back to later
        //if not back to login page