<?php
require_once('src/model.php');

function addComment(string $post, array $input)
{
    //null value for the author and comment
    $author = null;
    $comment = null;
    //if author and comment is not empty, we set the value of the variables
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        //if author or comment is empty, we return an error message
        die('Les données du formulaire sont invalides.');
    }
    //call the function createComment to add the comment to the database
    $success = createComment($post, $author, $comment);
    if (!$success) {
        //if the comment is not added, we return an error message
        die('Impossible d\'ajouter le commentaire !');
    } else {
        //if the comment is added, we return a success message
        //and we redirect the user to the post page
        header('Location: index.php?action=post&id=' . $post);
    }
}
