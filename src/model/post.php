<?php

class Post
{
    public string $title;
    public string $frenchCreationDate;
    public string $content;
    public string $identifier;
}

class PostRepository
{
    //the functions are inside the repository class
    //it has a property database
    //either it's a pdo or it's null
    public ?PDO $database = null;

    //this function spits a post
    public function getPost(string $identifier): Post
    {
        $this->dbConnect();
        $statement = $this->database->prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];

        return $post;
    }

    //function to get all the posts
    public function getPosts(): array
    {
        $this->dbConnect();
        $statement = $this->database->query(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            //every post is an instance of the post class,
            //and every carac of the post is an attribute of the class
            $post = new Post();
            $post->title = $row['title'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];

            $posts[] = $post;
        }
        //we put every Post instance in an array of Posts
        return $posts;
    }

    public function dbConnect()
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=oc4;charset=utf8', 'root', 'root');
        }
    }
}
