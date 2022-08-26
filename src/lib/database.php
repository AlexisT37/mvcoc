<?php
/* class for connect  */
class DatabaseConnection
{
    public ?PDO $database = null;

    //either we already a connection, a PDO object, or we have nothing
    //in which case we reload the db connection
    public function getConnection(): PDO
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=oc4;charset=utf8', 'root', 'root');
        }

        return $this->database;
    }
}


//we can instanciate a new object if we want to get a new connection