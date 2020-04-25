<?php
    function dbConnect()
    {  
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
    function getPosts()
    {
        $db = dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date');

        return $posts;
    }

    function getPost($postId)
    {
        $db = dbConnect();
        $request = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
        //$_GET['post] comes from URL on index page 
        $request->execute(array($postId));
        $post = $request->fetch();

        return $post;
    }

    function getComments($postId)
    {
        $db = dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
        $comments->execute(array($postId));

            return $comments;
    }

    function addComments($postId, $author, $comment)
    {
        $db = dbConnect();
        $newComment = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW() )');
        $affectedLines = $newComment->execute(array($postId, $author, $comment));

        return $affectedLines;
    }