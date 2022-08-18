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
   ?>




   <!DOCTYPE html>
   <html>

   <head>
      <meta charset="utf-8" />
      <title>Le blog de l'AVBN</title>
      <link href="style.css" rel="stylesheet" />
   </head>

   <body>
      <h1>Le super blog de l'AVBN !</h1>
      <p>Derniers billets du blog :</p>

      <?php
      //we loop through the posts array
      foreach ($posts as $post) {
      ?>

         <!-- this is a html part that is displayed for each post -->
         <div class="news">
            <h3>
               <!-- there we have the title and the date of the post -->
               <!-- htmlspecialchars for the  -->
               <?php echo htmlspecialchars($post['title']); ?>
               <em>le <?php echo $post['frenchCreationDate']; ?></em>
            </h3>
            <p>
               <?php
               // we display the content of the post
               //nl2br for the new line
               echo nl2br(htmlspecialchars($post['content']));
               ?>
               <br />
               <em><a href="#">Commentaires</a></em>
            </p>
         </div>
      <?php
      }
      // Fin de la boucle des billets
      $statement->closeCursor();
      ?>
   </body>

   </html>