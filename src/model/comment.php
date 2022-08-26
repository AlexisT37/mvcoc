<?php
//use the database
require_once('src/lib/database.php');


//class for a comment
class Comment
{
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
}


function getComments(string $post): array
{
    $database = new DatabaseConnection();

    //use database connection
    $statement = $database->getConnection()->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
    );
    $statement->execute([$post]);

    $comments = [];
    while (($row = $statement->fetch())) {
        $comment = new Comment();
        $comment->author = $row['author'];
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->comment = $row['comment'];

        $comments[] = $comment;
    }

    return $comments;
}

function createComment(string $post, string $author, string $comment)
{
    $database = new DatabaseConnection();

    $statement = $database->getConnection()->prepare(
        'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
    );
    $affectedLines = $statement->execute([$post, $author, $comment]);

    return ($affectedLines > 0);
}

//function dbconect removed