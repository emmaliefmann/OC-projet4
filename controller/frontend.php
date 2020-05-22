<?php 

namespace EmmaLiefmann\blog\controller;

require_once('model/postmanager.php');
require_once('model/post.php');
require_once('model/commentmanager.php');

class Frontend 
{
    function listPosts($parameters=null)
    {
        $postManager = new \EmmaLiefmann\blog\model\PostManager();
        
        if ($parameters) {
            $postObjects = $postManager->getPosts();
            require('view/frontend/chapterview.php');
        } else {
            $posts = $postManager->getHomePosts();
            require('view/frontend/indexview.php');
        }
    }
    

    function wordLimiter( $text, $limit = 260, $chars = '0123456789><' ) 
    {
        if( strlen($text) > $limit ) {
            $words = str_word_count( $text, 2, $chars );
            $words = array_reverse( $words, TRUE );
            foreach( $words as $length => $word ) 
            {
                if( $length + strlen( $word ) >= $limit ) {
                    array_shift( $words );
                } else {
                    break;
                }
            }
            $words = array_reverse($words);
            $text = implode( " ", $words) . '&hellip;';
        }
        return $text;
    }
    function post($id)
    {
        $postManager = new \EmmaLiefmann\blog\model\PostManager();
        $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
        //get in one request via joining tables? 
        $post = $postManager->getPost($id);
        //check $request has a value, if not send to page 404 redirection header 
        //otherwise execute as normal 
        $comments = $commentManager->getComments($id);
        require('view/frontend/postview.php');
    }

    function addComment($postId, $author, $comment)
    {
        $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
        $affectedLines = $commentManager->addComments($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire.');
        }
        else {
            header('location: index.php?action=post&id=' . $postId .'#comments');
        }
    }

    function flagComment($postId, $commentId)
    {
        $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
        $flaggedComment = $commentManager->flagComment($commentId);
        header('location: index.php?action=post&id='. $postId . '#comments');
    }
}
    


    

    

