<?php 

//namespace here? 

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

    $request = $postManager->getPost($_GET['id']);
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

function flagComment($postId, $commentId)
{
    $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
    $flaggedComment = $commentManager->flagComment($commentId);
    var_dump($commentId);
    header('location: index.php?action=post&id='. $postId);
}