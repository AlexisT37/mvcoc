   <?php
   // We connect to the database.
   try {
      $database = new PDO('mysql:host=localhost;dbname=oc4;charset=utf8', 'root', 'root');
   } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
   }

   // We retrieve the last 5 posts in the database using the pdo query.
   $statement = $database->query("SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5");

   //we create an empty array
   $posts = [];
   //we loop through the results
   //while we haven't reached the end of the results
   while ($row = $statement->fetch()) {
      //we assing each row to the array
      $post = [
         'title' => $row['titre'],
         'content' => $row['contenu'],
         'frenchCreationDate' => $row['date_creation_fr'],
      ];
      //we push the array to the posts array
      $posts[] = $post;
   }

   //the require statement is used to include another file
   // it actually takes all the variables from this files and sends them to required file
   //the difference between require and include is that require stops the script if the file is not found

   require('templates/homepage.php');
   ?>



