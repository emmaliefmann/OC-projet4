<?php 

require('model.php');

function listPosts()
{
    $posts = getPosts();
    //in tuto, file named listpostsview.php
    require('indexview.php');
}

function post()
{
    $post = getPost($_GET['id']);
    //the comments line wasn't in previous file, might be why it didn't work?
    $comments = getComments($_GET['id']);
    
    require('postview.php');
}