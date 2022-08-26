<?php
//this is the model for a page with one post
//use model post and comment because we need
//to display the post and the associated comments
require_once('src/model/post.php');
require_once('src/model/comment.php');
//we use the database class
require_once('src/lib/database.php');

//we use the namespace declared in post model
use Application\Model\Post\PostRepository;

//function to show one post
function post(string $identifier)
{
    //like in homepage, insteade of just having the post with a connection, we make a new class
    $connection = new DatabaseConnection();

    //new PostRepository instance
    //thanks to the namespace, we have the good class again
    $postRepository = new PostRepository();
    $postRepository->connection = $connection;

    //get the post using the post function
    //we use oop, we use the getPost method
    $post = $postRepository->getPost($identifier);
    //we also get the comments
    // $comments = getComments($identifier);

    //new way of getting the comments
    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $comments = $commentRepository->getComments($identifier);


    // the template post, which displays the comments
    require('templates/post.php');
}
