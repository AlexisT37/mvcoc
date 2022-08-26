<?php

//require the 3 controllers to handle 1 post at a time
//the homepage and adding a comment
//the homepage is to display all posts without a comment
require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

try {
    //if we have something in get, we look at the action section
    //and if it is action we use the function post
    //which is the controller post


    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                post($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
            //if the action is addComment
            //then in $_POST there is the author and the comment
            //in request there is the action, the id of the post, the author and the content of the comment
            // we then use the addcomment function in controller addcomment
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                addComment($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        //if there is no action, then it means it's just the homepage
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
