<?php 

require_once('model/postmanager.php');
require_once('model/commentmanager.php');

function listPosts()
{
    
    $postManager = new \EmmaLiefmann\blog\model\PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/indexview.php');
}

function post()
{
    $postManager = new \EmmaLiefmann\blog\model\PostManager();
    $commentManager = new \EmmaLiefmann\blog\model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/postview.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
    $affectedLines = $commentManager->addComments($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire.');
    }
    else {
        header('location: index.php?action=post&id=' . $postId);
    }
}