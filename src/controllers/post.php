<?php
//this is the model for a page with one post
//use model post and comment because we need
//to display the post and the associated comments
require_once('src/model/post.php');
require_once('src/model/comment.php');

//function to show one post
function post(string $identifier)
{
    //new PostRepository instance
    $postRepository = new PostRepository();
    //get the post using the post function
    //we use oop, we use the getPost method
    $post = $postRepository->getPost($identifier);
    //we also get the comments
    $comments = getComments($identifier);

    // the template post, which displays the comments
    require('templates/post.php');
}
