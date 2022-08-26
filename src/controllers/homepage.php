<?php
//need the post model to display posts
require_once('src/model/post.php');


//function homepage where we get all the posts
function homepage()
{
    //use the repository class, store it in variable
    $postRepository = new PostRepository();
    //use the getpost functions to activate the view of the posts
    $posts = $postRepository->getPosts();

    //includes the homepage template : views that displays the posts
    require('templates/homepage.php');
}
