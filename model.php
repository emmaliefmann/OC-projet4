<?php
    function getPosts()
    {
        try 
        {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }

        catch(Exception $e)
        {
            die('Error :' .$e->getMessage());
        }
        //request data from the posts table
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date');

        return $posts;

    }