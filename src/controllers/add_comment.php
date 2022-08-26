<?php
//controller to add a comment

//to use the model for the comment which contains the comment class
require_once('src/model/comment.php');


//function to add a comment
//takes the post that we comment, and the input which is the 
//content of the comment
function addComment(string $post, array $input)
{
    //author is null furst, so is comment
    $author = null;
    $comment = null;
    //if the input is not empty
    //then we assign the value to the input in the screen
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        //invalid data if empty
        throw new Exception('Les données du formulaire sont invalides.');
    }

    //function is stored in a variable, we have the post from the outwacd functon
    // and the author and comment
    $success = createComment($post, $author, $comment);
    //if success is false then there is an error
    if (!$success) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        //take the user to index with the post
        header('Location: index.php?action=post&id=' . $post);
    }
}
