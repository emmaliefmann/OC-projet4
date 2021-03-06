<?php 

namespace EmmaLiefmann\blog\controller;


class Frontend 
{
    public function listPosts($parameters=null)
    {
        $postManager = new \EmmaLiefmann\blog\model\PostManager();
        $posts = $postManager->getPosts();
        if ($parameters) {
            require('view/frontend/chapterview.php');
        } else {
            require('view/frontend/indexview.php');
        }
    }
    
    public function flagColor($flagged) 
    {
        if($flagged) {
            $message = 'comment-reported';
        } else {
            $message = 'comment-flag';
        }
        return $message;
    }
    public function wordLimiter($text)
    {
        $limit = 260;
        $chars = '0123456789<>';
        
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
    public function post($id)
    {
        $postManager = new \EmmaLiefmann\blog\model\PostManager();
        $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
        //get in one request via joining tables? 
        $post = $postManager->getPost($id);
        if($post->getId() === null) {
            header('location: index.php?action=404error');
        }
        else {
        $comments = $commentManager->getComments($id);
        require('view/frontend/postview.php');
        }
        
    }

    public function addComment($postId, $author, $comment)
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

    public function flagComment($postId, $commentId)
    {
        $commentManager = new \EmmaLiefmann\blog\model\CommentManager();
        $flaggedComment = $commentManager->flagComment($commentId);
        header('location: index.php?action=post&id='. $postId . '#comments');
    }
}
    


    

    

