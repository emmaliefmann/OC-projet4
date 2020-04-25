<?php 

require('model/frontend.php');

function listPosts()
{
    $posts = getPosts();
    require('view/frontend/indexview.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/frontend/postview.php');
}

function addComment($postId, $author, $comment)
{
    $affectedLines = addComments($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire.');
    }
    else {
        header('location: index.php?action=post&id=' . $postId);
    }
}