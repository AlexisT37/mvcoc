<?php
//need the post model to display posts
require_once('src/model/post.php');
//we use the database in lib
require_once('src/lib/database.php');

//instead of using the long version of the namespace with instanciation
//we use the use statement
use \Application\Model\Post\PostRepository;

//function homepage where we get all the posts
function homepage()
{
    //use the repository class, store it in variable
    //we need to add the namespace full name so that it knows it belongs in it
    //otherwise it thinks the post model is somewhere else
    //with the use statement, no need for the full postrepository
    // $postRepository = new \Application\Model\Post\PostRepository;
    $postRepository = new PostRepository();
    //the property connection of repository is a new instanciation of the DatabaseConnection class
    $postRepository->connection = new DatabaseConnection();
    //use the getpost functions to activate the view of the posts
    $posts = $postRepository->getPosts();

    //includes the homepage template : views that displays the posts
    require('templates/homepage.php');
}
